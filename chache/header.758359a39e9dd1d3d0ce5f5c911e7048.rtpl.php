<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars( $title_pagina, ENT_COMPAT, 'UTF-8', FALSE ); ?></title>
    <link rel="stylesheet" href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/css/css.css">

    <script src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/js/jquery/jquery.min.js"></script>
    <script src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/js/jquery.mask/jquery.mask.min.js"></script>
    <script src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/js/jquery.form/jquery.form.min.js"></script>
    <script src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/js/js.min.js"></script>
</head>
<body>
    <header>
        <div class="content">
            <div class="logo">
                <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>feed">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/logo_principal.png" alt="Imagem da Logo Principal">
                </a>
            </div>

            <?php if( $header_login == true ){ ?>
            <div class="login">
                <form class="form_ajax" action="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>login" method="POST">
                    <input type="email" name="email" placeholder="E-MAIL">
                    <input type="password" name="password" placeholder="SENHA">
                    <input type="submit" name="btn" value="Entrar">
                    <div class="alerta"></div>
                </form>
            </div>
            <?php }else{ ?>
            <div class="left">
                <div class="pesquisa">
                    <form action="search" method="get">
                        <input type="text" name="q" placeholder="pesquisar">
                        <input type="submit" value="?">
                    </form>
                </div>
                <div class="pessoal">
                    <div class="menu">
                        <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/setaMenu.png" alt="">
                        <ul>
                            <li><a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>configuracao">Configurações</a></li>
                            <li><a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>logout">Sair</a></li>
                        </ul>
                    </div>
                    <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>feed/<?php echo htmlspecialchars( $user_logedIn['profile_url'], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        <img class="foto" src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $user_logedIn['user_avatar'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </header>