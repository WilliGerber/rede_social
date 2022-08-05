<section class="lateral_esquerda">
    <div class="topo">
        <a href="{$url_base}feed/{$user['profile_url']}">
            <img src="{$url_base}{$user['user_avatar']}" alt="Foto de {$user['user_name']} {$user['user_lastName']}">
        </a>
        <div class="info">
            <a href="{$url_base}feed/{$user['profile_url']}">
                <p>{$user['user_name']}</p>
            </a>

            {if="$user_logedIn['id'] != $user['id']"}
                <button class="btn-seguir">Seguir</button>
                <input type="hidden" value="{$user['id']}">
                <input type="hidden" value="{$user_logedIn['id']}">
            {/if}
        </div>
    </div>

    {if="$page_mensagens == true"}
        <div class="lista_mensagens">
            {if="$list_messages"}
                {loop="$list_messages"}
                    <class class="item" id="{$value.id_receiver}:{$value.id_sender}">
                        <div class="foto">
                            <img src="{$value.user_avatar}" alt="">
                        </div>
                        <div class="info">
                            <p class="nome">{$value.user_name}</p>
                            <div class="ultima_mensagem">
                                {$value.message}
                            </div>
                        </div>
                    </class>
                {/loop}
            {else}
            <div class="sem_mensagem">
                Você ainda não tem mensagens
            </div>
        {/if}
        </div>
    {else}
        {if="$links == true"}
            <div class="links">
                <ul>
                    <li><a href="{$url_base}mensagens">Mensagens<span>({if="$countMessages != null"}{$countMessages}{else}0{/if})</span></a></li>
                </ul>
                <ul>
                    <li><a href="{$url_base}configuracao">Configurações</a></li>
                </ul>
                <ul>
                    <li><a href="{$url_base}fotos">Fotos</a></li>
                </ul>
            </div>
            <div class="form_about">
                <form class="form_ajax" action="{$url_base}about_me" method="post">
                    <textarea name="about_me" id="" cols="30" rows="10" placeholder="Quem sou eu" maxlength="160">{$user['user_description']}</textarea>
                    <input type="submit" name="btn" value="Salvar">
                    <div class="alerta"></div>
                </form>
            </div>
        {else}
            <div class="form_about">
                <form>
                    <textarea name="" id="" cols="30" rows="10" placeholder="Quem é ele(a)" readonly="readonly">{$user['user_description']}</textarea>
                </form>
            </div>
        {/if}
    {/if}
</section>