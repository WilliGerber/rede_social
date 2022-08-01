<?php
    namespace DEV\controllers;

    use DEV\Message;
    use DEV\User;

    if(!isset($_SESSION)) {
        session_start();
    }

    class MessageController {
        private $message;
        function __construct(){
            $this->message = new Message;
        }

        public function new_message($request, $response, $args) {
            $id_receive = $request->getParsedBodyParam('id_user_receive');
            $messageText = $request->getParsedBodyParam('msg');
            $responseNM = $request->getParsedBodyParam('response_none');

            if(isset($responseNM) && $responseNM == '1') {
                $responseNM = false;
            }else {
                $responseNM = true;
            }

            if($messageText != "" && $messageText != null) {

                $newMessage = $this->message;

                $fields = array(
                    'id_sender' => (int)$_SESSION['user_logedIn']['id'],
                    'id_receiver' => (int)$id_receive,
                    'message' => $messageText,
                    'send_date' => date('Y-m-d H:i:s')
                );

                $newMessage->insertMessage($fields);

                if($responseNM) {
                    $response_return['msg'] = 'Mensagem enviada com sucesso!';
                    $response_return['alert_hidden'] = true;
                }

                $response_return['status'] = 1;
                $response_return['reset_form'] = true;

                return $response->withJson($response_return);

            } else {
                $response_return['status'] = '0';
                $response_return['msg'] = 'Digite uma mensagem';
                $response_return['alert_hidden'] = true;
                return $response->withJson($response_return);
            }
        }

        public function getMessages($request, $response, $args) {
            $ids = explode(':', $request->getParsedBodyParam('ids'));

            if((int)$_SESSION['user_logedIn']['id'] === (int)$ids[0]) {
                $response_return['id_logedIn'] = (int)$ids[0];
                $response_return['id_otherUser'] = (int)$ids[1];
            } else {
                $response_return['id_logedIn'] = (int)$ids[1];
                $response_return['id_otherUser'] = (int)$ids[0];
            }

            $user = new User;

            $fields = array(
                'id',
                'user_name',
                'user_email',
                'user_avatar',
                'profile_url'
            );

            $where = array(
                'id' => (int)$response_return['id_otherUser']
            );

            $user = $user->selectUser($fields, $where)[0];

            if ($user['user_avatar'] == '' || !is_file($user['user_avatar'])) {
                $user['user_avatar'] = URL_BASE."resources/images/person-512.webp";
                
            } else {
                $user['user_avatar'] = URL_BASE.$user['user_avatar'];
            }    

            $response_return['user_name'] = $user['user_name'];
            $response_return['user_avatar'] = $user['user_avatar'];
            $response_return['profile_url'] = URL_BASE.'feed/'.$user['profile_url'];
            $response_return['messages'] = $this->message->getMessages($ids);

            return $response->withJson($response_return);
        }
    }
?>