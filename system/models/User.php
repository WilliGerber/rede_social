<?php
    namespace DEV;

    use DEV\Model;

    class User extends Model {
        private $table = "users";
        protected $fields = [
            "id",
            "user_name",
            "user_lastName",
            "user_email",
            "user_phone",
            "user_password",
            "user_avatar",
            "user_description",
            "date_update"
        ];

        function insertUser($campos) {
            // var_dump('insertUser');
            $this->insert($this->table, $campos);
        }
        
        function updateUser($valores, $where) {
            $this->update($this->table, $valores, $where);
        }

        function deleteUser($coluna, $valor) {
            $this->delete($this->table, $coluna, $valor);
        }

        function selectUser($campos, $where):array {
            return $this->select($this->table, $campos, $where);
        }
    }
?>