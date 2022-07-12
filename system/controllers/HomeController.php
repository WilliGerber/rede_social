<?php
namespace DEV\controllers;

use Rain\Tpl;

class HomeController
{
    private $tpl;

    function __construct() {
        $config = array(
            'base_url' => __DIR_PRINCIPAL__,
            'tpl_dir' => $_SERVER['DOCUMENT_ROOT'].__DIR_PRINCIPAL__."/system/views/",
            'cache_dir' => $_SERVER['DOCUMENT_ROOT'].__DIR_PRINCIPAL__.'/chache/',
            'tpl_ext' => 'php',
        );

        Tpl::configure($config);
        $this->tpl = new Tpl;
        // $this->setTpl("header");
    }

    function __destruct() {

    }

    public function login() {
		// echo($_SERVER['DOCUMENT_ROOT'].__DIR_PRINCIPAL__."/system/views/");
        $this->tpl->draw('login', false);
    }

}