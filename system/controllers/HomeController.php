<?php
namespace DEV\controllers;

use Rain\Tpl;
use DEV\Controllers\UserController;
use DEV\User;

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

        $this->tpl = new Tpl;

        if(isset($_SESSION['user_logedIn']) && $_SESSION['user_logedIn'] != null) {
            $user = new User();
            $this->user_logedIn = $user->getUser($_SESSION['user_logedIn']);
        }
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

        $this->default['footer'] = false;
        $info = array(
            'title_pagina' => 'Seu Feed',
            'header_login' => $this->default['header_login'],
            'url_base' => URL_BASE,
            'links' => $this->default['links'],
            'page_mensagens' => $this->default['page_mensagens'],
            'user_logedIn' => $this->user_logedIn,
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

        $nome = $args['usuario'];
        $this->default['footer'] = false;
        $info = array(
            'title_pagina' => 'Feed de '.$nome,
            'header_login' => $this->default['header_login'],
            'url_base' => URL_BASE,
            'links' => false,
            'page_mensagens' => $this->default['page_mensagens'],
            'user_logedIn' => $this->user_logedIn,
        );
        $this->setTpl('header', $info);
        $this->setTpl('feed/inicioCentral', array('classPrincipal' => 'feed'));
        $this->setTpl('feed/lateralEsquerda');
        $this->setTpl('feed/feed_usuario', array('nome_usuario' => $nome));
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
            'user_logedIn' => $this->user_logedIn,
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
        $info = array(
            'title_pagina' => 'Pesquisa',
            'header_login' => $this->default['header_login'],
            'url_base' => URL_BASE,
            'links' => $this->default['links'],
            'page_mensagens' => $this->default['page_mensagens'],
            'user_logedIn' => $this->user_logedIn,
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

        $info = array(
            'title_pagina' => 'Minhas mensagens',
            'header_login' => $this->default['header_login'],
            'url_base' => URL_BASE,
            'links' => $this->default['links'],
            'page_mensagens' => true,
            'user_logedIn' => $this->user_logedIn,
        );
        $this->setTpl('header', $info);
        $this->setTpl('feed/inicioCentral', array('classPrincipal' => 'mensagens'));
        $this->setTpl('feed/lateralEsquerda');
        $this->setTpl('mensagens');
        $this->setTpl('feed/finalCentral');
    }
    
    public function fotos(){
        UserController::verifyLogin();

        $info = array(
            'title_pagina' => 'Minhas Fotos',
            'header_login' => $this->default['header_login'],
            'url_base' => URL_BASE,
            'links' => $this->default['links'],
            'page_mensagens' => $this->default['page_mensagens'],
            'user_logedIn' => $this->user_logedIn,
        );
        $this->setTpl('header', $info);
        $this->setTpl('feed/inicioCentral', array('classPrincipal' => 'minhas_fotos'));
        $this->setTpl('feed/lateralEsquerda');
        $this->setTpl('fotos');
        $this->setTpl('feed/finalCentral');
    }
}