<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="conteudo">
    <section class="publicar">
        <div class="exibir">
            <span>Nova Publicação</span>
            <button class="btn">Publicar</button>
        </div>
        <div class="lightbox">
            <span class="close"></span>
            <form class="form_ajax" action="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>publish" method="post" enctype="multipart/form-data">
                <textarea name="message" placeholder="Nova Publicação" id="" cols="30" rows="10"></textarea>
                <label for="imagem">
                    <span>Imagens</span>
                    <input id="imagem" type="file" name="imagem[]" multiple accept="image/*">
                </label>
                <input type="submit" value="Publicar">
            </form>
        </div>
    </section>
    <section class="publicacoes">
        
    </section>

    <input type="hidden" name="" id="page_index" value="1">
    <input type="hidden" id="user_id" value="<?php echo htmlspecialchars( $user_logedIn['id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    <input type="hidden" id="feed" value="true">
</div>