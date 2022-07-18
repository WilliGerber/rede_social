<?php
namespace DEV\controllers;

use Rain\Tpl;

class HomeController
{
    private $tpl;
    private $default = array(
        'footer' => true,
        'header_login' => false,
    );

    function __construct() {
        $config = array(
            'base_url' => __DIR_PRINCIPAL__,
            'tpl_dir' => $_SERVER['DOCUMENT_ROOT'].__DIR_PRINCIPAL__."/system/views/",
            'cache_dir' => $_SERVER['DOCUMENT_ROOT'].__DIR_PRINCIPAL__.'/chache/',
            'tpl_ext' => 'php',
        );

        Tpl::configure($config);
        $this->tpl = new Tpl;
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
        );
        $this->setTpl('header', $info);
        $this->setTpl('login');
    }

    public function feed() {
        $this->default['footer'] = false;
        $info = array(
            'title_pagina' => 'Página de Login',
            'header_login' => $this->default['header_login'],
        );
        $this->setTpl('header', $info);
        $this->setTpl('feed/inicioCentral', array('classPrincipal' => 'feed'));
        $this->setTpl('feed/lateralEsquerda');
        $this->setTpl('feed/feed');
        $this->setTpl('feed/lateralDireita');
        $this->setTpl('feed/finalCentral');
    }

    public function feed_usuario($request, $response, $args) {
        $info = array(
            'title_pagina' => 'Feed de '.$nome,
            'header_login' => $this->default['header_login'],
        );
        $nome = $args['usuario'];
        $this->setTpl('header', $info);
        $this->setTpl('feed_usuario', array('nome_usuario' => $nome));
    }    

    public function configuracao() {
        $info = array(
            'title_pagina' => 'Configurações',
            'header_login' => $this->default['header_login'],
        );
        $this->setTpl('header', $info);
        $this->setTpl('configuracao');
    }

    public function search()
    {
        $info = array(
            'title_pagina' => 'Pesquisa',
            'header_login' => $this->default['header_login'],
        );
        $this->setTpl('header', $info);
        $this->setTpl('search');

    }
    
    public function mensagens()
    {
        $info = array(
            'title_pagina' => 'Mensagens',
            'header_login' => $this->default['header_login'],
        );
        $this->setTpl('header', $info);
        $this->setTpl('mensagens');
    }
    
    public function fotos()
    {
        $info = array(
            'title_pagina' => 'Fotos',
            'header_login' => $this->default['header_login'],
        );
        $this->setTpl('header', $info);
        $this->setTpl('fotos');
    }

}