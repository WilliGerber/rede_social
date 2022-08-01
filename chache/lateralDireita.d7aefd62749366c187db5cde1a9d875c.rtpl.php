<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="lateral_direita">
    <?php if( $links == false && $user_logedIn['id'] != $user['id'] ){ ?>
        <div class="form_nova_mensagem">
            <form class="form_ajax" action="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>new_message" method="post">
                <input type="hidden" name="id_user_receive" value="<?php echo htmlspecialchars( $user['id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <textarea name="msg" id="" cols="30" rows="10" placeholder="Nova Mensagem" maxlength=""></textarea>
                <input type="submit" name="btn" value="Enviar ">
                <div class="alerta"></div>
            </form>
        </div>
    <?php } ?>
    <div class="fotos">
        <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>fotos">
            <p>Fotos</p>
        </a>
        <ul>
            <li>
                <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>fotos">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>fotos">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>fotos">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>fotos">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>fotos">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>fotos">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
        </ul>
    </div>
    <div class="fotos follows">
    <p>Seguindo</p>
        <ul>
            <li>
                <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>feed/willi">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>feed/willi">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>feed/willi">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>feed/willi">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>feed/willi">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>feed/willi">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
        </ul>
    </div>
    <div class="footer">
        <div class="content">
            <p>Todos os Direitos Reservados <?php echo date('Y'); ?></p>
        </div>
    </div>

</section>