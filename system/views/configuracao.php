<div class="conteudo">
    <section class="configuracoes">
        <form class="form_ajax" action="{$url_base}configuracao" method="post" enctype="multipart/form-data"s>
            <label for="campo-img" class="campo-img">
                <img src="{$user['user_avatar']}" alt="Foto de Pefil" id="img-config">
                <input type="file" id="campo-img" name="image">
            </label>
            <div class="nome">
                <input type="text" name="name" placeholder="Nome" value="{$user['user_name']}">
                <input type="text" name="lastName" placeholder="Sobrenome" value="{$user['user_lastName']}">
            </div>
            <input type="email" name="email" placeholder="E-mail" value="{$user['user_email']}">
            <input type="tel" name="phone" class="phone_with_ddd" placeholder="Celular" value="{$user['user_phone']}">
            <input type="password" name="password" placeholder="Senha" autocomplete="off">
            <input type="password" name="checkPassword" placeholder="Confirmar Senha" autocomplete="off">
            <input type="submit" class="btn" name="btn-salvar" value="Salvar">
            <div class="alerta"></div>
        </form>
    </section>
</div>