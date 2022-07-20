<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="conteudo">
    <section class="configuracoes">
        <form action="#" method="post" enctype="multipart/form-data">
            <label for="campo-img">
                <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/person-512.webp" alt="Foto de Pefil" id="img-config">
                <input type="file" id="campo-img" name="image">
            </label>
            <div class="nome">
                <input type="text" name="nome" placeholder="Nome">
                <input type="text" name="sobrenome" placeholder="Sobrenome">
            </div>
            <input type="email" name="email" placeholder="E-mail">
            <input type="tel" name="telefone" class="phone_with_ddd" placeholder="Celular">
            <input type="password" name="senha" placeholder="Senha">
            <input type="password" name="confirmarsenha" placeholder="Confirmar Senha">
            <input type="submit" class="btn" name="btn-salvar" value="Salvar">
        </form>
    </section>
</div>