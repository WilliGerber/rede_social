<div class="conteudo oculto">
    <div class="msgs">
        <div class="conteudo_mensagem">
            <div class="topo">
                <a href="#">
                    <img src="{$url_base}resources/images/person-512.webp" alt="">
                </a>
                <a href="#">
                    <p class="nome"></p>
                </a>    
            </div>
            <hr>
            <div class="lista_msg">
                
            </div>
        </div>
        <form class="form_ajax" action="{$url_base}new_message" method="post">
            <input type="hidden" class="id_user_receive" name="id_user_receive" value="">
            <input type="hidden" name="response_none" value="1">
            <input type="text" name="msg" placeholder="Digite sua mensagem">
            <input type="submit" name="btn" value="Enviar" class="btn">
        </form>
    </div>
</div>