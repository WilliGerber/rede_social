<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="el-login">
    <form class="form_ajax" action="cadastrar" method="POST">
        <legend>Cadastrar</legend>
        <input type="text" name="name" placeholder="Nome" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input class="phone_with_ddd"type="tel" name="phone" placeholder="Celular" required>
        <input type="password" name="password" placeholder="Senha" required>
        <p>Ao se cadastrar você concorda com os <a href="#">termos e polítca</a></p>
        <input type="submit" name="btn" value="Cadastrar" required>
        <div class="alerta"></div>
    </form>
</section>