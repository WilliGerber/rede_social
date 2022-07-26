<?php
    namespace DEV\controllers;
    use DEV\User;

    if(!isset($_SESSION)) {
        session_start();
    }
    
    class UserController {
        private $user;
        function __construct() {
            $this->user = new User;
        }

        public function user_login($request, $response, $args) {
            $email = $request->getParsedBodyParam('email');
            $password = $request->getParsedBodyParam('password');

            $campos = array(
                'id',
                'user_email',
            );

            $where = array(
                'user_email' => $email,
            );

            $resultado = $this->user->selectUser($campos, $where);

            if($resultado) {

                $return = $this->login($email, $password);

                if($return) {
                    $response_return['status'] = '1';
                    $response_return['page_redirect'] = URL_BASE.'feed';
                    return $response->withJson($response_return);
                } else {
                    $response_return['status'] = '0';
                    $response_return['msg'] = 'E-mail ou senha inválidos';
                    return $response->withJson($response_return);
                }

            } else {
                $response_return['status'] = '0';
                $response_return['msg'] = 'E-mail ou senha inválidos';
                return $response->withJson($response_return);
            }
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

            if($resultado) {
                $response_return['status'] = '0';
                $response_return['msg'] = 'Já existe uma conta cadastrada com esse e-mail, por favor, utilizar outro e-mail';
                return $response->withJson($response_return);
                
            } else {
                
                $campos = array(
                'user_name' => $name,
                'user_email' => $email,
                'user_phone' => $phone,
                'user_password' => password_hash($password, PASSWORD_DEFAULT, ['cost'=>12])
                );

                $this->user->insertUser($campos);

                $return = $this->login($email, $password);

                if($return) {
                    $response_return['status'] = '1';
                    $response_return['page_redirect'] = URL_BASE.'feed';
                    return $response->withJson($response_return);
                } else {
                    $response_return['status'] = '0';
                    $response_return['msg'] = 'Erro ao fazer login após o seu cadastro na rede social';
                    $response_return['form_reset'] = true;
                    return $response->withJson($response_return);
                }
            }
        }

        function login($email="", $password="") {
            if($email !== '' && $password !== '') {
                $campos = array(
                    "id",
                    "user_name",
                    "user_lastName",
                    "user_email",
                    "user_phone",
                    "user_password",
                    "user_avatar",
                    "user_description",
                    "date_update"
                );
    
                $where = array(
                    'user_email' => $email,
                );
    
                $resultado = $this->user->selectUser($campos, $where);

                if (password_verify($password, $resultado[0]['user_password'])) {
                    $this->user->setData($resultado[0]);

                    $_SESSION['user_logedIn'] = $this->user->getValues();

                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        public static function verifyLogin() {
            if(!isset($_SESSION['user_logedIn']) || $_SESSION['user_logedIn'] == NULL) {
                header("Location: ".URL_BASE);
                exit();
            }
        }

        public function logout() {
            if (isset($_SESSION['user_logedIn'])) {
                $_SESSION['user_logedIn'] = NULL;
                unset($_SESSION['user_logedIn']);
            }
    
            header("Location: ".URL_BASE);
            exit();
        }
    }
?>  