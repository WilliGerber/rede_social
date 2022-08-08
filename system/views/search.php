<div class="conteudo">
    <section class="searches">

        {loop="$result_search"}
            <div class="item">
                <div class="foto">
                    <a href="{$url_base}{$value.profile_url}">
                        <img src="{$value.user_avatar}" alt="Foto de {$value.user_name} {$value.user_lastName}">
                    </a>
                </div>
                <div class="info">
                    <a href="{$url_base}feed/{$value.profile_url}">
                        <p class="nome">{$value.user_name} {$value.user_lastName}</p>
                    </a>
                    <div class="bio">
                        <a href="{$url_base}feed/{$value.profile_url}">
                            {$value.user_description}
                        </a>
                    </div>
                </div>
            </div>
            
        {/loop}

    </section>
</div>