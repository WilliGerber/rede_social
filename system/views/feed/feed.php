<div class="conteudo">
    <section class="publicar">
        <div class="exibir">
            <span>Nova Publicação</span>
            <button class="btn">Publicar</button>
        </div>
        <div class="lightbox">
            <span class="close"></span>
            <form class="form_ajax" action="{url_base}publicar" method="post" enctype="multipart/form-data">
                <textarea name="mensagem" placeholder="Nova Publicação" id="" cols="30" rows="10"></textarea>
                <label for="imagem">
                    <span>Imagens</span>
                    <input id="imagem" type="file" name="imagem[]" multiple="multiple" accept="image/*">
                </label>
                <input type="submit" value="Publicar">
            </form>
        </div>
    </section>
    <section class="publicacoes">
    <div class="item">
            <div class="topo">
                <a href="{$url_base}feed/willi">
                    <img src="{$url_base}resources/images/person-512.webp" alt="Foto de Fulano de Tal">
                </a>
                <a href="{$url_base}feed/willi">
                    <span>Fulano de Tal</span>
                </a>
            </div>
            <div class="info">
                <div class="texto">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore animi in, nemo quidem fugiat asperiores, soluta blanditiis minima nesciunt maiores necessitatibus iste deleniti non quae laborum eum alias iure itaque.
                </div>
                <div class="galeria">
                    <img src="{$url_base}resources/images/placeholder.png" alt="">
                </div>
            </div>
        </div>
        <div class="item">
            <div class="topo">
                <img src="{$url_base}resources/images/person-512.webp" alt="Foto de Fulano de Tal">
                <span>Fulano de Tal</span>
            </div>
            <div class="info">
                <div class="texto">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore animi in, nemo quidem fugiat asperiores, soluta blanditiis minima nesciunt maiores necessitatibus iste deleniti non quae laborum eum alias iure itaque.
                </div>
            </div>
        </div>
        <div class="item">
            <div class="topo">
                <img src="{$url_base}resources/images/person-512.webp" alt="Foto de Fulano de Tal">
                <span>Fulano de Tal</span>
            </div>
            <div class="info">
                <div class="galeria">
                    <img src="{$url_base}resources/images/placeholder.png" alt="">
                </div>
            </div>
        </div>
    </section>
</div>