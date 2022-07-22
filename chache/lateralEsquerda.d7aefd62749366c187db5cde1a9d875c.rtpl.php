<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="lateral_esquerda">
    <div class="topo">
        <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>feed/willi">
            <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/person-512.webp" alt="Foto de Fulano de Tal">
        </a>
        <div class="info">
            <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>feed/willi">
                <p>Fulano de Tal</p>
            </a>
            <button class="btn-seguir">Seguir</button>
        </div>
    </div>

    <?php if( $page_mensagens == true ){ ?>
        <div class="lista_mensagens">
            <class class="item">
                <div class="foto">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/person-512.webp" alt="">
                </div>
                <div class="info">
                    <p class="nome">Fulano de Tal</p>
                    <div class="ultima_mensagem">
                        Lorem ipsum dolor sit amet consectetur...
                    </div>
                </div>
            </class>
            <class class="item">
                <div class="foto">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/person-512.webp" alt="">
                </div>
                <div class="info">
                    <p class="nome">Fulano de Tal</p>
                    <div class="ultima_mensagem">
                        Lorem ipsum dolor sit amet consectetur...
                    </div>
                </div>
            </class>
            <class class="item">
                <div class="foto">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/person-512.webp" alt="">
                </div>
                <div class="info">
                    <p class="nome">Fulano de Tal</p>
                    <div class="ultima_mensagem">
                        Lorem ipsum dolor sit amet consectetur...
                    </div>
                </div>
            </class>
        </div>
    <?php }else{ ?>
        <?php if( $links == true ){ ?>
            <div class="links">
                <ul>
                    <li><a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>mensagens">Mensagens<span>(2)</span></a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>configuracao">Configurações</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>configuracao">Fotos</a></li>
                </ul>
            </div>
            <div class="form_about">
                <form class="form_ajax" action="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>quem_sou_eu" method="post">
                    <textarea name="" id="" cols="30" rows="10" placeholder="Quem sou eu" maxlength="160"></textarea>
                    <input type="submit" name="btn" value="Salvar">
                </form>
            </div>
        <?php }else{ ?>
            <div class="form_about">
                <form>
                    <textarea name="" id="" cols="30" rows="10" placeholder="Quem é ele" readonly="readonly"></textarea>
                </form>
            </div>
        <?php } ?>
    <?php } ?>
</section>