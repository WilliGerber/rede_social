<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars( $title_pagina, ENT_COMPAT, 'UTF-8', FALSE ); ?></title>
    <link rel="stylesheet" href="resources/css/css.css">
    <link rel="stylesheet" href="resourcer/js/js.min.js">
</head>
<body>
    <header>
        <div class="content">
            <div class="logo">
                <img src="resources/images/logo_principal.png" alt="Imagem da Logo Principal">
            </div>
            <div class="login">
                <form action="login" method="POST">
                    <input type="email" name="email" placeholder="E-MAIL">
                    <input type="password" name="password" placeholder="SENHA">
                    <input type="submit" name="btn" value="Entrar">
                </form>
            </div>
        </div>
    </header>