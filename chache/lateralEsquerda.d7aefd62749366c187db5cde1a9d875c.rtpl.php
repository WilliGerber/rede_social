<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="lateral_esquerda">
    <div class="topo">
        <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>feed/<?php echo htmlspecialchars( $user['profile_url'], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $user['user_avatar'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Foto de <?php echo htmlspecialchars( $user['user_name'], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $user['user_lastName'], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
        </a>
        <div class="info">
            <a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>feed/<?php echo htmlspecialchars( $user['profile_url'], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <p><?php echo htmlspecialchars( $user['user_name'], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
            </a>

            <?php if( $user_logedIn['id'] != $user['id'] ){ ?>
                <button class="btn-seguir">Seguir</button>
                <input type="hidden" value="<?php echo htmlspecialchars( $user['id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <input type="hidden" value="<?php echo htmlspecialchars( $user_logedIn['id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            <?php } ?>
        </div>
    </div>

    <?php if( $page_mensagens == true ){ ?>
        <div class="lista_mensagens">
            <?php if( $list_messages ){ ?>
                <?php $counter1=-1;  if( isset($list_messages) && ( is_array($list_messages) || $list_messages instanceof Traversable ) && sizeof($list_messages) ) foreach( $list_messages as $key1 => $value1 ){ $counter1++; ?>
                    <class class="item" id="<?php echo htmlspecialchars( $value1["id_receiver"], ENT_COMPAT, 'UTF-8', FALSE ); ?>:<?php echo htmlspecialchars( $value1["id_sender"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        <div class="foto">
                            <img src="<?php echo htmlspecialchars( $value1["user_avatar"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
                        </div>
                        <div class="info">
                            <p class="nome"><?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                            <div class="ultima_mensagem">
                                <?php echo htmlspecialchars( $value1["message"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                            </div>
                        </div>
                    </class>
                <?php } ?>
            <?php }else{ ?>
            <div class="sem_mensagem">
                Você ainda não tem mensagens
            </div>
        <?php } ?>
        </div>
    <?php }else{ ?>
        <?php if( $links == true ){ ?>
            <div class="links">
                <ul>
                    <li><a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>mensagens">Mensagens<span>(<?php if( $countMessages != null ){ ?><?php echo htmlspecialchars( $countMessages, ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>0<?php } ?>)</span></a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>configuracao">Configurações</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>fotos">Fotos</a></li>
                </ul>
            </div>
            <div class="form_about">
                <form class="form_ajax" action="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>about_me" method="post">
                    <textarea name="about_me" id="" cols="30" rows="10" placeholder="Quem sou eu" maxlength="160"><?php echo htmlspecialchars( $user['user_description'], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
                    <input type="submit" name="btn" value="Salvar">
                    <div class="alerta"></div>
                </form>
            </div>
        <?php }else{ ?>
            <div class="form_about">
                <form>
                    <textarea name="" id="" cols="30" rows="10" placeholder="Quem é ele(a)" readonly="readonly"><?php echo htmlspecialchars( $user['user_description'], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
                </form>
            </div>
        <?php } ?>
    <?php } ?>
</section>