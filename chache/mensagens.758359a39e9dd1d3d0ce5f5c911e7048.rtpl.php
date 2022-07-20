<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="conteudo">
    <div class="msgs">
        <div class="conteudo_mensagem">
            <div class="topo">
                <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/person-512.webp" alt="">
                <p class="nome">Jenifer Ludwig</p>
            </div>
            <hr>
            <div class="lista_mensagens">
                <div class="mensagem dele">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda repudiandae provident eos nisi sunt? Hic aliquid accusantium minus itaque facere animi veniam saepe, blanditiis obcaecati expedita dolor iste alias sed.
                </div>
                <div class="mensagem eu">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab ad aspernatur dignissimos labore accusantium laboriosam voluptatibus dolorem atque placeat facere praesentium quae repellat ex libero rerum exercitationem deserunt, ratione earum!
                </div>
            </div>
        </div>
        <form action="" method="post">
            <input type="text" name="mensagem" placeholder="Digite sua mensagem">
            <input type="submit" value="Enviar" class="btn">
        </form>
    </div>
</div>