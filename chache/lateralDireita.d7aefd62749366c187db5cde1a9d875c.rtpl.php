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

    <?php if( $list_fotos ){ ?>
    <div class="fotos">
        <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>fotos">
            <p>Fotos</p>
        </a>
        <ul>
            <?php $counter1=-1;  if( isset($list_fotos) && ( is_array($list_fotos) || $list_fotos instanceof Traversable ) && sizeof($list_fotos) ) foreach( $list_fotos as $key1 => $value1 ){ $counter1++; ?>
            <li>
                <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>fotos">
                    <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["foto_path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>

    <?php if( $list_following ){ ?>
        <div class="fotos follows">
        <p>Seguindo</p>
            <ul>
                <?php $counter1=-1;  if( isset($list_following) && ( is_array($list_following) || $list_following instanceof Traversable ) && sizeof($list_following) ) foreach( $list_following as $key1 => $value1 ){ $counter1++; ?>
                <li>
                    <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>feed/<?php echo htmlspecialchars( $value1["profile_url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        <img src="<?php echo htmlspecialchars( $value1["user_avatar"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
    <div class="footer">
        <div class="content">
            <p>Todos os Direitos Reservados <?php echo date('Y'); ?></p>
        </div>
    </div>

</section>