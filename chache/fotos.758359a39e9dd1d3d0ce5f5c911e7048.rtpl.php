<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="conteudo">
    <div class="fotos">
        <div class="cover">
            <?php if( $fotos ){ ?>
                <?php if( $fotos["0"]["foto_path"] != '' ){ ?>
                    <img class="img_cover" src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $fotos["0"]["foto_path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
                <?php } ?>
            <?php }else{ ?>
                <p>Faça uma postagem com suas fotos preferidas! <br><a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Acessar meu Feed</a></p>
            <?php } ?>
        </div>
        <?php if( $fotos ){ ?>
            <div class="thumbs">

            <?php $counter1=-1;  if( isset($fotos) && ( is_array($fotos) || $fotos instanceof Traversable ) && sizeof($fotos) ) foreach( $fotos as $key1 => $value1 ){ $counter1++; ?>
                    <?php if( $fotos["0"]["foto_path"] == $value1["foto_path"] ){ ?>
                        <img class="img_thumb active" src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["foto_path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
                    <?php }else{ ?>
                        <img class="img_thumb" src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["foto_path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
                    <?php } ?>
            <?php } ?>
        
        <?php } ?>

        </div>
    </div>
</div>