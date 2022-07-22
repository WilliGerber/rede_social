<?php
    namespace DEV\controllers;
    use DEV\User;

    class UserController {
        private $user;
        function __construct() {
            $this->user = new User;
        }
        public function cadastrar($request, $response, $args) {
            $name = $request->getParsedBodyParam('name');
            $email = $request->getParsedBodyParam('email');
            $phone = $request->getParsedBodyParam('phone');
            $password = $request->getParsedBodyParam('password');

            $campos = array(
                'id',
                'user_email',
            );

            $where = array(
                'user_email' => $email,
            );

            $resultado = $this->user->selectUser($campos, $where);

            $resultado = $this->usuario->selectUser($campos, $where);

            if($resultado) {
                echo "Já existe uma conta cadastrada com esse e-mail, por favor, utilizar outro e-mail";
            } else {
                echo "Ok";
            }

            var_dump($resultado);
            exit();

            $campos = array(
                'user_name' => $name,
                'user_email' => $email,
                'user_phone' => $phone,
                'user_password' => $password,
            );

            $this->user->insertUser($campos);
            
            // var_dump($campos);
            exit(); 
        }
    }
?>  