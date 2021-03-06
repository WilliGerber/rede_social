<?php
    namespace DEV;

    use DEV\Model;

    class User extends Model {
        private $table = "users";
        protected $fields = [
            "id",
            "profile_url",
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
        
        function updateUser($values, $where) {
            $this->update($this->table, $values, $where);
        }

        function deleteUser($coluna, $valor) {
            $this->delete($this->table, $coluna, $valor);
        }

        function selectUser($campos, $where):array { 
            // echo "<pre>";
            // var_dump($campos, $where);
            // exit();
            $userSelection = $this->select($this->table, $campos, $where);
            return $userSelection;
        }

        function getUser($campos) {
            if ($campos['user_avatar'] == '' || !is_file($campos['user_avatar'])) {
                $campos['user_avatar'] = URL_BASE."resources/images/person-512.webp";
                
            } else {
                $campos['user_avatar'] = URL_BASE.$campos['user_avatar'];
            }        

            return $campos;
        }

        function profileUrlGenerator($primeiroNome, $id) {

            $search = ['@<script[^>]*?>.*?</script>@si', '@<style[^>]*?>.*?</style>@siU', '@<[\/\!]*?[^<>]*?>@si', '@<![\s\S]*?--[ \t\n\r]*>@'];
    
            $string = preg_replace($search, '', $primeiroNome);
    
            $table = ['Š'=>'S','š'=>'s','Đ'=>'Dj','đ'=>'dj','Ž'=>'Z','ž'=>'z','Č'=>'C','č'=>'c','Ć'=>'C','ć'=>'c','À'=>'A','Á'=>'A','Â'=>'A','Ã'=>'A','Ä'=>'A','Å'=>'A','Æ'=>'A','Ç'=>'C','È'=>'E','É'=>'E','Ê'=>'E','Ë'=>'E','Ì'=>'I','Í'=>'I','Î'=>'I','Ï'=>'I','Ñ'=>'N','Ò'=>'O','Ó'=>'O','Ô'=>'O','Õ'=>'O','Ö'=>'O','Ø'=>'O','Ù'=>'U','Ú'=>'U','Û'=>'U','Ü'=>'U','Ý'=>'Y','Þ'=>'B','ß'=>'Ss','à'=>'a','á'=>'a','â'=>'a','ã'=>'a','ä'=>'a','å'=>'a','æ'=>'a','ç'=>'c','è'=>'e','é'=>'e','ê'=>'e','ë'=>'e','ì'=>'i','í'=>'i','î'=>'i','ï'=>'i','ð'=>'o','ñ'=>'n','ò'=>'o','ó'=>'o','ô'=>'o','õ'=>'o','ö'=>'o','ø'=>'o','ù'=>'u','ú'=>'u','û'=>'u','ý'=>'y','ý'=>'y','þ'=>'b','ÿ'=>'y','Ŕ'=>'R','ŕ'=>'r'
            ];
    
            $string = strtr($string, $table);
            $string = mb_strtolower($string);
            $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
            $string = str_replace(" ", "_", $string);
            return $string.$id;
        }
    }

    
?>