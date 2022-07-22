<section class="lateral_direita">
    {if="$links == false"}
        <div class="form_nova_mensagem">
            <form class="form_ajax" action="{$url_base}nova_mensagem" method="post">
                <textarea name="" id="" cols="30" rows="10" placeholder="Nova Mensagem" maxlength=""></textarea>
                <input type="submit" name="btn" value="Enviar ">
            </form>
        </div>
    {/if}
    <div class="fotos">
        <a href="{$url_base}fotos">
            <p>Fotos</p>
        </a>
        <ul>
            <li>
                <a href="{$url_base}fotos">
                    <img src="{$url_base}resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="{$url_base}fotos">
                    <img src="{$url_base}resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="{$url_base}fotos">
                    <img src="{$url_base}resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="{$url_base}fotos">
                    <img src="{$url_base}resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="{$url_base}fotos">
                    <img src="{$url_base}resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="{$url_base}fotos">
                    <img src="{$url_base}resources/images/placeholder.png" alt="">
                </a>
        </ul>
    </div>
    <div class="fotos follows">
    <p>Seguindo</p>
        <ul>
            <li>
                <a href="{$url_base}feed/willi">
                    <img src="{$url_base}resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="{$url_base}feed/willi">
                    <img src="{$url_base}resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="{$url_base}feed/willi">
                    <img src="{$url_base}resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="{$url_base}feed/willi">
                    <img src="{$url_base}resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="{$url_base}feed/willi">
                    <img src="{$url_base}resources/images/placeholder.png" alt="">
                </a>
            </li>
            <li>
                <a href="{$url_base}feed/willi">
                    <img src="{$url_base}resources/images/placeholder.png" alt="">
                </a>
            </li>
        </ul>
    </div>
    <div class="footer">
        <div class="content">
            <p>Todos os Direitos Reservados {function="date('Y')"}</p>
        </div>
    </div>

</section>