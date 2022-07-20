<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="lateral_direita">
    <?php if( $links == false ){ ?>
        <div class="form_nova_mensagem">
            <form action="#" method="post">
                <textarea name="" id="" cols="30" rows="10" placeholder="Nova Mensagem" maxlength=""></textarea>
                <input type="submit" name="btn" value="Enviar ">
            </form>
        </div>
    <?php } ?>
    <div class="fotos">
        <p>Fotos</p>
        <ul>
            <li>
                <a href="#">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
        </ul>
    </div>
    <div class="fotos follows">
    <p>Seguindo</p>
        <ul>
            <li>
                <a href="#">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
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