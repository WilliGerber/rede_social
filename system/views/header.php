<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title_pagina}</title>
    <link rel="stylesheet" href="resources/css/css.css">

    <script src="resources/js/jquery/jquery.min.js"></script>
    <script src="resources/js/jquery.mask/jquery.mask.min.js"></script>
    <script src="resources/js/js.min.js"></script>
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