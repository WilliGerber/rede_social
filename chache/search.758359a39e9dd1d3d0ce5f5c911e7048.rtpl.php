<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="conteudo">
    <section class="searches">

        <?php $counter1=-1;  if( isset($result_search) && ( is_array($result_search) || $result_search instanceof Traversable ) && sizeof($result_search) ) foreach( $result_search as $key1 => $value1 ){ $counter1++; ?>
            <div class="item">
                <div class="foto">
                    <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["profile_url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        <img src="<?php echo htmlspecialchars( $value1["user_avatar"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Foto de <?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["user_lastName"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </a>
                </div>
                <div class="info">
                    <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["profile_url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        <p class="nome"><?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["user_lastName"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                    </a>
                    <div class="bio">
                        <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["profile_url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <?php echo htmlspecialchars( $value1["user_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        </a>
                    </div>
                </div>
            </div>
            
        <?php } ?>

    </section>
</div>