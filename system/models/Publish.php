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
    }
?>