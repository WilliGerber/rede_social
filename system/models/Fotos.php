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

        function selectFotosRand($limit=6){
            $sql = "";
            
            $params = array(':id_sender' => $id);
            $result = $this->querySelect($sql, $params);

        }
    }
?>