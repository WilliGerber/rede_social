<div class="conteudo">
    <section class="publicar">
        <div class="exibir">
            <span>Nova Publicação</span>
            <button class="btn">Publicar</button>
        </div>
        <div class="lightbox">
            <span class="close"></span>
            <form class="form_ajax" action="{$url_base}publish" method="post" enctype="multipart/form-data">
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

    <input type="hidden" name="" id="indice_page" value="1">
    <input type="hidden" id="user_id" value="{$user_logedIn['id']}">
</div>