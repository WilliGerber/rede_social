<?php
    namespace DEV\controllers;

    use DEV\Publish;
    use DEV\Fotos;

    if(!isset($_SESSION)) {
        session_start();
    }
    
    class PublishController {
        private $publish;
        private $fotos;

        function __construct() {
            $this->publish = new Publish;            
            $this->fotos = new Fotos;            
        }

        public function publish($request, $response, $args){
            $text = $request->getParsedBodyParam('message');

            if($request->getUploadedFiles()){
                $images = $request->getUploadedFiles()['imagem'];
            } else {
                $images = false;
            }

            if($text == "" && $images == false){
                $response_return['status'] = 0;
                return $response->withJson($response_return);
            } else {
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
    
    
                $this->publish->insertPublish($fields);
    
                $id_publish = $this->publish->getLastPublish((int)$_SESSION['user_logedIn']['id'])[0]['id'];
    
                if ($images) {
                    foreach ($images as $image) {
                        if($image->getError() === UPLOAD_ERR_OK) {
                        
                            $extension = pathinfo($image->getClientFilename(), PATHINFO_EXTENSION);
        
                            $name = md5(uniqid(rand(), true)).pathinfo($image->getClientFilename(), PATHINFO_FILENAME).".".$extension;
                            $publish['foto_path'] = "uploads/publishes/".$name;
                            $image->moveTo($publish["foto_path"]);
    
                            $publish['id_user'] = (int)$_SESSION['user_logedIn']['id'];
                            $publish['id_publish'] = $id_publish;
    
                            $this->fotos->insertFotos($publish);
                        }
                    }
                }
    
                $response_return['status'] = 1;
                $response_return['page_redirect'] = URL_BASE.'feed';
                return $response->withJson($response_return);         
            }
        

        }
    }

?>