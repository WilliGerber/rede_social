<?php
namespace DEV\controllers;

use Rain\Tpl;
use DEV\Controllers\UserController;
use DEV\User;
use DEV\Message;
use DEV\Publish;
use DEV\Fotos;

if(!isset($_SESSION)) {
    session_start();
}

class HomeController
{
    private $tpl;

    private $default = array(
        'footer' => true,
        'header_login' => false,
        'links' => true,
        'page_mensagens' => false,
        'listMessage' => array(),
        'modelFotos' => array(),
    );

    private $user_logedIn = array();

    function __construct() {
        $config = array(
            'base_url' => __DIR_PRINCIPAL__,
            'tpl_dir' => $_SERVER['DOCUMENT_ROOT'].__DIR_PRINCIPAL__."/system/views/",
            'cache_dir' => $_SERVER['DOCUMENT_ROOT'].__DIR_PRINCIPAL__.'/chache/',
            'tpl_ext' => 'php',
        );

        Tpl::configure($config);

        $this->default['modelUser'] = new User;

        $this->tpl = new Tpl;

        $camposUser = array(
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


        if(isset($_SESSION['user_logedIn']) && $_SESSION['user_logedIn'] != null) {
        // Apenas com usuario logado:
            // Construindo usuario
            $this->user_logedIn = ($this->default['modelUser']->selectUser($camposUser, array("id" => $_SESSION['user_logedIn']['id']) ))[0];

            // Verificando imagem do usuário
            if ($this->user_logedIn['user_avatar'] == null || !is_file($this->user_logedIn['user_avatar'])) {
                $this->user_logedIn['user_avatar'] = "resources/images/person-512.webp";
            } else {
                $this->user_logedIn['user_avatar'] = $this->user_logedIn['user_avatar'];
            }            

            // Construindo lista de mensagens
            $listMessage = new Message;
            $this->default['listMessage'] = $listMessage->getUsersMessages((int)$_SESSION['user_logedIn']['id']);
        }

        $this->default['modelFotos'] = new Fotos;
        
    }

    function __destruct() {
        if ($this->default['footer'] === true) {
            $this->setTpl('footer');
        }
        $this->setTpl('fimHtml');
    }

    public function setTpl($template, $data=array(), $returnHtml = false) {
        $this->setdata($data);
        return $this->tpl->draw($template, $returnHtml);
    }

    public function setData($data=array()) {
        foreach ($data as $key => $value) {
            $this->tpl->assign($key, $value);
        }
    }

    public function login() {
        if(isset($_SESSION['user_logedIn']) && $_SESSION['user_logedIn'] != NULL) {
            header("Location: ".URL_BASE."feed");
            exit();
        }

        $info = array(
            'title_pagina' => 'Página de Login',
            'header_login' => true,
            'url_base' => URL_BASE,
        );
        $this->setTpl('header', $info);
        $this->setTpl('login');
    }

    public function feed() {
        UserController::verifyLogin();

        $list_fotos = $this->default['modelFotos']->selectFotosRand((int)$_SESSION['user_logedIn']['id']);

        $list_following = $this->default['modelUser']->selectFollowingRand((int)$_SESSION['user_logedIn']['id']);


        $this->default['footer'] = false;
        $info = array(
            'title_pagina' => 'Seu Feed',
            'header_login' => $this->default['header_login'],
            'url_base' => URL_BASE,
            'links' => $this->default['links'],
            'page_mensagens' => $this->default['page_mensagens'],
            'user' => $this->user_logedIn,
            'user_logedIn' => $this->user_logedIn,
            'countMessages' => $this->default['listMessage']? count($this->default['listMessage']): $this->default['listMessage'] = null,
            'list_fotos' => $list_fotos,
            'list_following' => $list_following,
            'search' => "",
        );

        $this->setTpl('header', $info);
        $this->setTpl('feed/inicioCentral', array('classPrincipal' => 'feed'));
        $this->setTpl('feed/lateralEsquerda');
        $this->setTpl('feed/feed');
        $this->setTpl('feed/lateralDireita');
        $this->setTpl('feed/finalCentral');
    }

    public function feed_usuario($request, $response, $args) {
        UserController::verifyLogin();

        $this->default['footer'] = false;

        $profile_url = $args['usuario'];

        // selecionando informacoes do usuario dono do feed
        if ($this->user_logedIn['profile_url'] == $profile_url) {
            $profileOwner = $this->user_logedIn;
        } else {
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
                "date_update",
            );
           
            $where = array(
                'profile_url' => $profile_url
            );

            $profileOwner = $this->default['modelUser']->selectUser($campos, $where)[0];
            
        }

        // Validação foto usuário
        if ($profileOwner['user_avatar'] == '' || !is_file($profileOwner['user_avatar'])) {
            $profileOwner['user_avatar'] = /*URL_BASE.*/"resources/images/person-512.webp";
        } else {
            $profileOwner['user_avatar'] = /*URL_BASE.*/$profileOwner['user_avatar'];
        }

        // Validação se user_logedIn está seguindo profile
        if($profileOwner['id'] != $this->user_logedIn['id']){
            $profileOwner['friendship'] = $this->default['modelUser']->getFriendship($profileOwner['id'], $this->user_logedIn['id']);
        }

        // Criando listagem de fotos
        $list_fotos = $this->default['modelFotos']->selectFotosRand((int)$profileOwner['id']);

        // Selecionando seguidores aleatoriamente para listar na lateral
        $list_following = $this->default['modelUser']->selectFollowingRand((int)$profileOwner['id']);

        $info = array(
            'title_pagina' => 'Feed de '.$profileOwner['user_name'],
            'header_login' => $this->default['header_login'],
            'url_base' => URL_BASE,
            'links' => false,
            'page_mensagens' => $this->default['page_mensagens'],
            'user' => $profileOwner,
            'user_logedIn' => $this->user_logedIn,
            'countMessages' => $this->default['listMessage']? count($this->default['listMessage']): $this->default['listMessage'] = null,
            'list_fotos' => $list_fotos,
            'search' => "",
            'list_following' => $list_following,
        );
        // var_dump($list_following);
        // exit();
        $this->setTpl('header', $info);
        $this->setTpl('feed/inicioCentral', array('classPrincipal' => 'feed'));
        $this->setTpl('feed/lateralEsquerda');
        $this->setTpl('feed/feed_usuario');
        $this->setTpl('feed/lateralDireita');
        $this->setTpl('feed/finalCentral');
    }    

    public function configuracao() {
        UserController::verifyLogin();

        $info = array(
            'title_pagina' => 'Configurações',
            'header_login' => $this->default['header_login'],
            'url_base' => URL_BASE,
            'links' => $this->default['links'],
            'page_mensagens' => $this->default['page_mensagens'],
            'user' => $this->user_logedIn,
            'user_logedIn' => $this->user_logedIn,
            'countMessages' => $this->default['listMessage']? count($this->default['listMessage']): $this->default['listMessage'] = null,
            'search' => "",
        );

        $this->setTpl('header', $info);
        $this->setTpl('feed/inicioCentral', array('classPrincipal' => 'configuracoes'));
        $this->setTpl('feed/lateralEsquerda');
        $this->setTpl('configuracao');
        $this->setTpl('feed/finalCentral');
    }

    public function search(){
        UserController::verifyLogin();

        $this->default['footer'] = false;
        $list_fotos = $this->default['modelFotos']->selectFotosRand((int)$_SESSION['user_logedIn']['id']);

        // Selecionando seguidores aleatoriamente para listar na lateral
        $list_following = $this->default['modelUser']->selectFollowingRand((int)$_SESSION['user_logedIn']['id']);

        $search = $_GET['q'];

        $result_search = $this->default['modelUser']->getSearch($search);

        $info = array(
            'title_pagina' => 'Pesquisa',
            'header_login' => $this->default['header_login'],
            'url_base' => URL_BASE,
            'links' => $this->default['links'],
            'page_mensagens' => $this->default['page_mensagens'],
            'user' => $this->user_logedIn,
            'user_logedIn' => $this->user_logedIn,
            'countMessages' => $this->default['listMessage']? count($this->default['listMessage']): $this->default['listMessage'] = null,
            'list_fotos' => $list_fotos,
            'list_following' => $list_following,
            'result_search' => $result_search,
            'search' => $search,
        );

        $this->setTpl('header', $info);
        $this->setTpl('feed/inicioCentral', array('classPrincipal' => 'search'));
        $this->setTpl('feed/lateralEsquerda');
        $this->setTpl('search');
        $this->setTpl('feed/lateralDireita');
        $this->setTpl('feed/finalCentral');
    }
    
    public function mensagens(){
        UserController::verifyLogin();

        $list_fotos = $this->default['modelFotos']->selectFotosRand((int)$_SESSION['user_logedIn']['id']);
        
        $info = array(
            'title_pagina' => 'Minhas mensagens',
            'header_login' => $this->default['header_login'],
            'url_base' => URL_BASE,
            'links' => $this->default['links'],
            'page_mensagens' => true,
            'user' => $this->user_logedIn,
            'user_logedIn' => $this->user_logedIn,
            'list_messages' => $this->default['listMessage'],
            'countMessages' => $this->default['listMessage']? count($this->default['listMessage']): $this->default['listMessage'] = null,
            'list_fotos' => $list_fotos,
            'search' => "",
        );

        $this->setTpl('header', $info);
        $this->setTpl('feed/inicioCentral', array('classPrincipal' => 'mensagens'));
        $this->setTpl('feed/lateralEsquerda');
        $this->setTpl('mensagens');
        $this->setTpl('feed/finalCentral');
    }
    
    public function fotos(){
        UserController::verifyLogin();


        $fields = array (
            "id",
            "foto_path"
        );

        $where = array (
            "id_user" => (int)$_SESSION['user_logedIn']['id']
        );

        $result_fotos = $this->default['modelFotos']->selectFotos($fields, $where);

        $info = array(
            'title_pagina' => 'Minhas Fotos',
            'header_login' => $this->default['header_login'],
            'url_base' => URL_BASE,
            'links' => $this->default['links'],
            'page_mensagens' => $this->default['page_mensagens'],
            'user' => $this->user_logedIn,
            'user_logedIn' => $this->user_logedIn,
            'countMessages' => $this->default['listMessage']? count($this->default['listMessage']): $this->default['listMessage'] = null,
            'fotos' => $result_fotos,
            'search' => ""
        );

        $this->setTpl('header', $info);
        $this->setTpl('feed/inicioCentral', array('classPrincipal' => 'minhas_fotos'));
        $this->setTpl('feed/lateralEsquerda');
        $this->setTpl('fotos');
        $this->setTpl('feed/finalCentral');
    }
}