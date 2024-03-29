<?php
    namespace DEV;

    use DEV\Model;

    class Fotos extends Model {
        private $table = "fotos";
        protected $fields = [
            "id",
            "foto_path",
            "date_cadastro",
            "id_user",
            "id_publish"
        ];

        function insertFotos($fields) {
            $this->insert($this->table, $fields);
        }
        
        function updateFotos($values, $where) {
            $this->update($this->table, $values, $where);
        }

        function deleteFotos($column, $value) {
            $this->delete($this->table, $column, $value);
        }

        function selectFotos($fields, $where):array { 
            $fotosSelection = $this->select($this->table, $fields, $where);
            return $fotosSelection;
        }

        function selectFotosRand($id_user, $limit=6){
            $sql = "SELECT * FROM ".$this->table." WHERE id_user = :id_user ORDER BY RAND() LIMIT " .$limit;
            
            $params = array(':id_user' => $id_user);
            $result = $this->querySelect($sql, $params);
            
            return $result;
        }
    }
?>