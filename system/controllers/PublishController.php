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
        private function publish($request, $response, $args){

        };
    }

?>