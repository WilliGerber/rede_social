<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="conteudo">
    <section class="configuracoes">
        <form class="form_ajax" action="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>configuracao" method="post" enctype="multipart/form-data"s>
            <label for="campo-img">
                <img src="<?php echo htmlspecialchars( $user['user_avatar'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Foto de Pefil" id="img-config">
                <input type="file" id="campo-img" name="image">
            </label>
            <div class="nome">
                <input type="text" name="name" placeholder="Nome" value="<?php echo htmlspecialchars( $user['user_name'], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <input type="text" name="lastName" placeholder="Sobrenome" value="<?php echo htmlspecialchars( $user['user_lastName'], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <input type="email" name="email" placeholder="E-mail" value="<?php echo htmlspecialchars( $user['user_email'], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            <input type="tel" name="phone" class="phone_with_ddd" placeholder="Celular" value="<?php echo htmlspecialchars( $user['user_phone'], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            <input type="password" name="password" placeholder="Senha" autocomplete="off">
            <input type="password" name="checkPassword" placeholder="Confirmar Senha" autocomplete="off">
            <input type="submit" class="btn" name="btn-salvar" value="Salvar">
            <div class="alerta"></div>
        </form>
    </section>
</div>