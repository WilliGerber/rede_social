<?php
    namespace DEV\controllers;
    use DEV\Publish;

    if(!isset($_SESSION)) {
        session_start();
    }
    
    class PublishController {
        private $publish;
        function __construct() {
            $this->publish = new Publish;            
        }

        public function publish($request, $response, $args){
            $text = $request->getParsedBodyParam('message');

            if($text != ""){
                $fields = array(
                    'text' => $text,
                    "id_user" => (int)$_SESSION['user_logedIn']['id']
                );
            } else {
                $fields = array(
                    "id_user" => (int)$_SESSION['user_logedIn']['id']
                );
            }


            // $this->publish->insertPublish($fields);

            // $id_publish = $this->publish->getLastPublish((int)$_SESSION['user_logedIn']['id'])[0]['id'];

            if($request->getUploadedFiles()){
                $images = $request->getUploadedFiles()['imagem'];
            } else {
                $images = false;
            }
            echo "<pre>";
            var_dump($images);
            exit();
            
        }
    }

?>