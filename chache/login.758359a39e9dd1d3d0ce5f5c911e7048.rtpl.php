<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="el-login">
    <form action="/" method="post">
        <legend>Cadastrar</legend>
        <input type="text" name="name" placeholder="Nome">
        <input type="email" name="email" placeholder="E-mail">
        <input class="phone_with_ddd"type="tel" name="phone" placeholder="Celular">
        <input type="password" name="password" placeholder="Senha">
        <p>Ao se cadastrar você concorda com os <a href="#">termos e polítca</a></p>
        <input type="submit" name="btn" value="Cadastrar">
    </form>
</section>