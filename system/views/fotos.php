<div class="conteudo">
    <div class="fotos">
        <div class="cover">
            {if="$fotos[0].foto_path != ''"}
                <img class="img_cover" src="{$url_base}{$fotos[0].foto_path}" alt="">
            {/if}
        </div>
        <div class="thumbs">
            {loop="$fotos"}
                {if="$fotos[0].foto_path == $value.foto_path"}
                    <img class="img_thumb active" src="{$url_base}{$value.foto_path}" alt="">
                {else}
                    <img class="img_thumb" src="{$url_base}{$value.foto_path}" alt="">
                {/if}
            {/loop}
        </div>
    </div>
</div>