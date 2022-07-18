<section class="lateral_esquerda">
    <div class="topo">
        <img src="{$url_base}resources/images/person-512.webp" alt="Foto de Fulano de Tal">
        <div class="info">
            <p>Fulano de Tal</p>
            <button class="btn-seguir">Seguir</button>
        </div>
    </div>

    {if="$mensagens == true"}
        <div class="links">
            <ul>
                <li><a href="#">Mensagens <span>(2)</span></a></li>
            </ul>
        </div>
        <div class="form_about">
            <form action="#" method="post">
                <textarea name="" id="" cols="30" rows="10" placeholder="Quem sou eu" maxlength="160"></textarea>
                <input type="submit" name="btn" value="Salvar">
            </form>
        </div>
    {else}
        <div class="form_about">
            <form action="#" method="post">
                <textarea name="" id="" cols="30" rows="10" placeholder="Quem é ele" readonly="readonly"></textarea>
            </form>
        </div>
    {/if}
</section>