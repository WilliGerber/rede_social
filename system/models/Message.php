<?php
    namespace DEV;

    use DEV\Model;

    class Message extends Model{
        private $table = "messages";
        protected $fields = [
            "id",
            "id_sender",
            "id_receiver",
            "message",
            "send_date"
        ];

        function insertMessage($fields){
            $this->insert($this->table, $fields);
        }

        function deleteMessage($column, $value){
            $this->delete($this->table, $column, $value);
        }

        function selectMessage($fields, $where):array {
            return $this->select($this->table, $fields, $where);
        }

        function getUsersMessages($id)
        {

            $sql = "SELECT id, id_sender, id_receiver, message FROM messages WHERE (id_sender = :id_sender AND id_receiver != :id_sender)  OR (id_receiver = :id_sender AND id_sender != :id_sender) ORDER BY send_date DESC";
            
            $params = array(':id_sender' => $id);
            $result = $this->querySelect($sql, $params);

            $id_show = array();
            $messages = array();

            if (count($result) <= 0) {
                return false;
            }
            if((int)$result[0]['id_sender'] !== $id) {
                array_push($id_show, $id);
            }

            array_push($id_show, $id);

            for ($i=0; $i < count($result) ; $i++) {
                $id_user = ($result[$i]['id_sender'] == $id) ? $result[$i]['id_receiver'] : $result[$i]['id_sender'];
                if (array_search($id_user, $id_show) == false) {
                    $add = true;
                    // var_dump($add);

                    for ($t=0; $t < count($messages) ; $t++) { 
                        
                        if ($messages[$t]["id_sender"] == $id && $messages[$t]['id_receiver'] == $id_user) {
                            $add = false;
                        }
                        if ($messages[$t]["id_receiver"] == $id && $messages[$t]['id_sender'] == $id_user) {
                            $add = false;
                        }
                    }
                    array_push($id_show, $id_user);
                    if ($add) {
                        array_push($messages, $result[$i]);
                    }
                    
                }
            }
        
            unset($id_show[0]);

            for ($m=0; $m < count($messages) ; $m++) { 
                
                $idUser = ((int)$messages[$m]['id_sender'] == $id) ? $messages[$m]['id_receiver'] : $messages[$m]['id_sender'];

                $sql = "SELECT id, user_name, user_avatar FROM users WHERE id = :idUser";
                $params = array(':idUser' => (int)$idUser);
                $user = $this->querySelect($sql, $params)[0];
                $messages[$m]['message'] = substr($messages[$m]['message'], 0, 20)."...";
                $messages[$m]['user_name'] = $user['user_name'];

                $messages[$m]['user_avatar'] = ($user['user_avatar'] == '' || !is_file($user['user_avatar'])) ? URL_BASE."resources/images/person-512.webp" : URL_BASE.$user['user_avatar'];
            }
                return $messages;
        }
        public function getMessages($returnedIds) {
            $sql = 'SELECT * FROM messages WHERE (id_receiver = :ids1 AND id_sender = :ids2) OR (id_sender = :ids1 AND id_receiver = :ids2) ORDER BY id ASC';         
            $params = array(
                ':ids1' => (int)$returnedIds[0],
                ':ids2' => (int)$returnedIds[1],
            );
            $messages = $this->querySelect($sql, $params);

            return $messages;
        }
    }
?>