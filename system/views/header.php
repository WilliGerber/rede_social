<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title_pagina}</title>
    <link rel="stylesheet" href="{$url_base}resources/css/css.css">

    <script src="{$url_base}resources/js/jquery/jquery.min.js"></script>
    <script src="{$url_base}resources/js/jquery.mask/jquery.mask.min.js"></script>
    <script src="{$url_base}resources/js/js.min.js"></script>
</head>
<body>
    <header>
        <div class="content">
            <div class="logo">
                <img src="{$url_base}resources/images/logo_principal.png" alt="Imagem da Logo Principal">
            </div>

            {if="$header_login == true"}
            <div class="login">
                <form action="login" method="POST">
                    <input type="email" name="email" placeholder="E-MAIL">
                    <input type="password" name="password" placeholder="SENHA">
                    <input type="submit" name="btn" value="Entrar">
                </form>
            </div>
            {else}
            <div class="left">
                <div class="pesquisa">
                    <form action="pesquisa" method="get">
                        <input type="text" name="q" placeholder="pesquisar">
                        <input type="submit" value="?">
                    </form>
                </div>
                <div class="pessoal">
                    <div class="menu">
                        <img src="{$url_base}resources/images/setaMenu.png" alt="">
                        <ul>
                            <li><a href="configuracao">Configurações</a></li>
                            <li><a href="#">Sair</a></li>
                        </ul>
                    </div>
                    <img class="foto" src="{$url_base}resources/images/person-512.webp" alt="">
                </div>
            </div>
            {/if}
        </div>
    </header>