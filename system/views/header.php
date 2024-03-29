<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title_pagina}</title>
    <link rel="stylesheet" href="{$url_base}resources/css/css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="{$url_base}resources/js/jquery/jquery.min.js"></script>
    <script src="{$url_base}resources/js/jquery.mask/jquery.mask.min.js"></script>
    <script src="{$url_base}resources/js/jquery.form/jquery.form.min.js"></script>
    <script src="{$url_base}resources/js/slick/slick.min.js"></script>
    <script src="{$url_base}resources/js/js.min.js"></script>
</head>
<body>
    <header>
        <div class="content">
            <div class="logo">
                <a href="{$url_base}feed">
                    <img src="{$url_base}resources/images/logo_principal.png" alt="Imagem da Logo Principal">
                </a>
            </div>

            {if="$header_login == true"}
            <div class="login">
                <form class="form_ajax" action="{$url_base}login" method="POST">
                    <input type="email" name="email" placeholder="E-MAIL">
                    <input type="password" name="password" placeholder="SENHA">
                    <input type="submit" name="btn" value="Entrar">
                    <div class="alerta"></div>
                </form>
            </div>
            {else}
            <div class="left">
                <div class="pesquisa">
                    <form action="search" method="get">
                        <input type="text" name="q" placeholder="pesquisar" value="{$search}">
                        <input type="submit" value="">
                    </form>
                </div>
                <div class="pessoal">
                    <div class="menu">
                        <img src="{$url_base}resources/images/setaMenu.png" alt="">
                        <ul>
                            <li><a href="{$url_base}configuracao">Configurações</a></li>
                            <li><a href="{$url_base}logout">Sair</a></li>
                        </ul>
                    </div>
                    <a href="{$url_base}feed/{$user_logedIn['profile_url']}">
                        <img class="foto" src="{$url_base}{$user_logedIn['user_avatar']}" alt="">
                    </a>
                </div>
            </div>
            {/if}
        </div>
    </header>