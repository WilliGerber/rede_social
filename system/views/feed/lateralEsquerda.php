<section class="lateral_esquerda">
    <div class="topo">
        <a href="{$url_base}feed/willi">
            <img src="{$user_logedIn['user_avatar']}" alt="Foto de Fulano de Tal">
        </a>
        <div class="info">
            <a href="{$url_base}feed/willi">
                <p>{$user_logedIn['user_name']}</p>
            </a>
            <button class="btn-seguir">Seguir</button>
        </div>
    </div>

    {if="$page_mensagens == true"}
        <div class="lista_mensagens">
            <class class="item">
                <div class="foto">
                    <img src="{$url_base}resources/images/person-512.webp" alt="">
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
                    <img src="{$url_base}resources/images/person-512.webp" alt="">
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
                    <img src="{$url_base}resources/images/person-512.webp" alt="">
                </div>
                <div class="info">
                    <p class="nome">Fulano de Tal</p>
                    <div class="ultima_mensagem">
                        Lorem ipsum dolor sit amet consectetur...
                    </div>
                </div>
            </class>
        </div>
    {else}
        {if="$links == true"}
            <div class="links">
                <ul>
                    <li><a href="{$url_base}mensagens">Mensagens<span>(2)</span></a></li>
                </ul>
                <ul>
                    <li><a href="{$url_base}configuracao">Configurações</a></li>
                </ul>
                <ul>
                    <li><a href="{$url_base}fotos">Fotos</a></li>
                </ul>
            </div>
            <div class="form_about">
                <form class="form_ajax" action="{$url_base}quem_sou_eu" method="post">
                    <textarea name="" id="" cols="30" rows="10" placeholder="Quem sou eu" maxlength="160"></textarea>
                    <input type="submit" name="btn" value="Salvar">
                </form>
            </div>
        {else}
            <div class="form_about">
                <form>
                    <textarea name="" id="" cols="30" rows="10" placeholder="Quem é ele" readonly="readonly"></textarea>
                </form>
            </div>
        {/if}
    {/if}
</section>