<div class="conteudo">
    <div class="fotos">
        <div class="cover">
            {if="$fotos"}
                {if="$fotos[0].foto_path != ''"}
                    <img class="img_cover" src="{$url_base}{$fotos[0].foto_path}" alt="">
                {/if}
            {else}
                <p>Faça uma postagem com suas fotos preferidas! <br><a href="{$url_base}">Acessar meu Feed</a></p>
            {/if}
        </div>
        {if="$fotos"}
            <div class="thumbs">

            {loop="$fotos"}
                    {if="$fotos[0].foto_path == $value.foto_path"}
                        <img class="img_thumb active" src="{$url_base}{$value.foto_path}" alt="">
                    {else}
                        <img class="img_thumb" src="{$url_base}{$value.foto_path}" alt="">
                    {/if}
            {/loop}
        
        {/if}

        </div>
    </div>
</div>