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
    <script src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/js/js.min.js"></script>
</head>
<body>
    <header>
        <div class="content">
            <div class="logo">
                <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/logo_principal.png" alt="Imagem da Logo Principal">
            </div>

            <?php if( $header_login == true ){ ?>
            <div class="login">
                <form action="login" method="POST">
                    <input type="email" name="email" placeholder="E-MAIL">
                    <input type="password" name="password" placeholder="SENHA">
                    <input type="submit" name="btn" value="Entrar">
                </form>
            </div>
            <?php }else{ ?>
            <div class="left">
                <div class="pesquisa">
                    <form action="pesquisa" method="get">
                        <input type="text" name="q" placeholder="pesquisar">
                        <input type="submit" value="?">
                    </form>
                </div>
                <div class="pessoal">
                    <div class="menu">
                        <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/setaMenu.png" alt="">
                        <ul>
                            <li><a href="configuracao">Configurações</a></li>
                            <li><a href="#">Sair</a></li>
                        </ul>
                    </div>
                    <img class="foto" src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/person-512.webp" alt="">
                </div>
            </div>
            <?php } ?>
        </div>
    </header>