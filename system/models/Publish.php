<?php
    namespace DEV;

    use DEV\Model;

    class Publish extends Model {
        private $table = "posts";
        protected $fields = [
            "id",
            "text",
            "date_cadastro",
            "id_user"
        ];

        function insertPublish($fields) {
            $this->insert($this->table, $fields);
        }
        
        function updatePublish($values, $where) {
            $this->update($this->table, $values, $where);
        }

        function deletePublish($column, $value) {
            $this->delete($this->table, $column, $value);
        }

        function selectPublish($fields, $where):array { 
            $publishSelection = $this->select($this->table, $fields, $where);
            return $publishSelection;
        }

        function getLastPublish($id){
            $sql = "SELECT id FROM ".$this->table." WHERE id_user = :id_user ORDER BY id DESC LIMIT 1";
            
            $params = array(':id_user' => $id);
            return $this->querySelect($sql, $params);
        }

        function getFeedPublishes($id, $limit = 10, $offset = 0, $feed=true){
            
            if($feed == 'true'){
                // retornar ids dos amigos  
                $fields = array('id_following');
                $where = array(
                    'id_follower' => $id,
                );

                $response = $this->select('friends', $fields, $where);
                
                $ids[] = $id;
                foreach($response as $following){
                    $ids[] = (int)$following['id_following'];
                }
            } else {
                //retornar id do usuario
                $ids = [$id];
            }

            $offset = $offset - $limit;
            $sql = "SELECT p.*, u.user_name, u.user_lastName, u.user_avatar, u.profile_url FROM ".$this->table." p INNER JOIN users u ON p.id_user = u.id WHERE id_user IN (".implode(",", $ids).") ORDER BY date_cadastro DESC LIMIT ".$offset.", ".$limit;
            $publishes = $this->querySelect($sql);


            for($i=0; $i < count($publishes); $i++) {
                if ($publishes[$i]['user_avatar'] == '' || !is_file($publishes[$i]['user_avatar'])) {
                    $publishes[$i]['user_avatar'] = "resources/images/person-512.webp";
                    
                } else {
                    $publishes[$i]['user_avatar'] =  $publishes[$i]['user_avatar'];
                }

                $sql = "SELECT foto_path FROM fotos WHERE id_publish = :id_publish ORDER BY id ASC";
                $params = array(':id_publish' => (int)$publishes[$i]['id']);
                $fotos = $this->querySelect($sql, $params);

                if (count($fotos) > 0){
                    $publishes[$i]['fotos'] = $fotos;
                    // echo "<pre>";
                    // var_dump($fotos);
                    // exit();
                } else {
                    $publishes[$i]['fotos'] = false;
                }

                
            }

            return $publishes;
        }
    }
?>