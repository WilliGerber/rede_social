<section class="lateral_direita">
    {if="$links == false && $user_logedIn['id'] != $user['id']"}
        <div class="form_nova_mensagem">
            <form class="form_ajax" action="{$url_base}new_message" method="post">
                <input type="hidden" name="id_user_receive" value="{$user['id']}">
                <textarea name="msg" id="" cols="30" rows="10" placeholder="Nova Mensagem" maxlength=""></textarea>
                <input type="submit" name="btn" value="Enviar ">
                <div class="alerta"></div>
            </form>
        </div>
    {/if}

    {if="$list_fotos"}
    <div class="fotos">
        <a href="{$url_base}fotos">
            <p>Fotos</p>
        </a>
        <ul>
            {loop="$list_fotos"}
                <li>
                    <a href="{$url_base}{$user['profile_url']}/fotos">
                        <img src="{$url_base}{$value.foto_path}" alt="">
                    </a>
                </li>       
            {/loop} 
            <!-- {if="$user_logedIn['id'] == $user['id']"}
                {loop="$list_fotos"}
                    <li>
                        <a href="{$url_base}fotos">
                            <img src="{$url_base}{$value.foto_path}" alt="">
                        </a>
                    </li>       
                {/loop}
            {else}
                {$user['']}
            {/if} -->
        
        </ul>
    </div>
    {/if}

    {if="$list_following"}
        <div class="fotos follows">
        <p>Seguindo</p>
            <ul>
                {loop="$list_following"}
                <li>
                    <a href="{$url_base}feed/{$value.profile_url}">
                        <img src="{$value.user_avatar}" alt="">
                    </a>
                </li>
                {/loop}
            </ul>
        </div>
    {/if}
    <div class="footer">
        <div class="content">
            <p>Todos os Direitos Reservados {function="date('Y')"}</p>
        </div>
    </div>

</section>