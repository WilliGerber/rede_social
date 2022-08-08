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

            if($name == '' || $email == '' || $phone == '' || $password == ''){
                $response_return['status'] = '0';
                $response_return['msg'] = 'Preencha todos os campos';
                return $response->withJson($response_return);
            } else {

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

                    // gerar url do perfil
                    $profileUrl = $this->user->profileUrlGenerator($name, $_SESSION['user_logedIn']['id']);

                    // Update database profileUrl
                    $values = array(
                        'profile_url' => $profileUrl
                    );
                    $where = array(
                        'id' => (int)$_SESSION['user_logedIn']['id']    
                    );

                    $this->user->updateUser($values, $where);

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
        }

        function login($email="", $password="") {
            if($email !== '' && $password !== '') {
                $campos = array(
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

        public function about_me($request, $response, $args) {
            $bio = $request->getParsedBodyParam('about_me');


            // atualizando form about_me
            if($bio != "" && $bio != null) {
                $values = array(
                    'user_description' => $bio
                );
                $where = array(
                    'id' => (int)$_SESSION['user_logedIn']['id']    
                );

                $this->user->updateUser($values, $where);

                $response_return['status'] = '1';
                $response_return['msg'] = 'Atualizado com sucesso!';
                return $response->withJson($response_return);
            } else {
                $response_return['status'] = '0';
                $response_return['msg'] = 'Digite sua biografia com até 160 caracteres';
                return $response->withJson($response_return);
            }
        }

        public function configuracao($request, $response, $args) {
            $user['name'] = $request->getParsedBodyParam('name');
            $user['lastName'] = $request->getParsedBodyParam('lastName');
            $user['email'] = $request->getParsedBodyParam('email');
            $user['phone'] = $request->getParsedBodyParam('phone');
            $user['password'] = $request->getParsedBodyParam('password');
            $user['checkPassword'] = $request->getParsedBodyParam('checkPassword');

            
            // Requisição para atualização da imagem
            if($request->getUploadedFiles()){
                $image = $request->getUploadedFiles()['image'];
            } else {
                $image = false;
            }

            // Confirmação se senhas são iguais
            if($user['password'] !== $user['checkPassword']) {
                $response_return['status'] = 0;
                $response_return['msg'] = 'Para alterar sua senha as senhas precisam coincidir';
                return $response->withJson($response_return);
            }

            // Atualizar URL Usuário
            $user['profile_url'] = $this->user->profileUrlGenerator($user['name'], $_SESSION['user_logedIn']['id']);

            // Update
            $values = array(
                'user_name' => $user['name'],
                'user_lastName' => $user['lastName'],
                'user_email' => $user['email'],
                'user_phone' => $user['phone'],
                'profile_url' => $user['profile_url'],
            );

            // Atualização senha
            if($user['password'] != "") {
                $values['user_password'] = password_hash($user['password'], PASSWORD_DEFAULT, ['cost'=>12]);
                // $values['password'] = $user['password'];
            }

            // Upload de imagem
            if($image) {
                if($image->getError() === UPLOAD_ERR_OK) {
                    
                    $extension = pathinfo($image->getClientFilename(), PATHINFO_EXTENSION);

                    $name = md5(uniqid(rand(), true)).pathinfo($image->getClientFilename(), PATHINFO_FILENAME).".".$extension;
                    $user['user_avatar'] = "uploads/".$name;
                    $image->moveTo($user["user_avatar"]);
                    $values["user_avatar"] = $user["user_avatar"];
                }
            }

            $where = array(
                'id' => (int)$_SESSION['user_logedIn']['id'],   
            );

            $this->user->updateUser($values, $where);
            
            if($user['password'] !== "") {
                $this->login($user['email'], $user['password']);
            } else {
                $result = $this->user->selectUser($values, $where);
                $this->user->setData($result);
                $_SESSION['user_logedIn'] = $this->user->getValues();
            }

            $response_return['status'] = 1;

            $response_return['page_redirect'] = URL_BASE."configuracao"; 
            return $response->withJson($response_return);
        }
        
        public function setFriendship($request, $response, $args) {
            $id_user = $request->getParsedBodyParam('id_user');
            $id_user_logedIn = $request->getParsedBodyParam('id_user_logedIn');
            
            $text_html = $this->user->setFriendship($id_user, $id_user_logedIn);

            $response_return['status'] = 1;
            $response_return['text_html'] = $text_html; 
            return $response->withJson($response_return);
        }
    }
?>  