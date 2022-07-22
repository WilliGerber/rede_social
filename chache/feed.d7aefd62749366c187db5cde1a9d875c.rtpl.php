<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="conteudo">
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
                <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>feed/willi">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/person-512.webp" alt="Foto de Fulano de Tal">
                </a>
                <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>feed/willi">
                    <span>Fulano de Tal</span>
                </a>
            </div>
            <div class="info">
                <div class="texto">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore animi in, nemo quidem fugiat asperiores, soluta blanditiis minima nesciunt maiores necessitatibus iste deleniti non quae laborum eum alias iure itaque.
                </div>
                <div class="galeria">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </div>
            </div>
        </div>
        <div class="item">
            <div class="topo">
                <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/person-512.webp" alt="Foto de Fulano de Tal">
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
                <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/person-512.webp" alt="Foto de Fulano de Tal">
                <span>Fulano de Tal</span>
            </div>
            <div class="info">
                <div class="galeria">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </div>
            </div>
        </div>
    </section>
</div>