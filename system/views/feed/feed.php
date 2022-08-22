<div class="conteudo">
    <section class="publicar">
        <div class="exibir">
            <span>Nova Publicação</span>
            <button class="btn">Publicar</button>
        </div>
        <div class="lightbox">
            <span class="close"></span>
            <form class="form_ajax" action="{$url_base}publish" method="post" enctype="multipart/form-data">
                <div class="inputs">
                    <textarea name="message" placeholder="Nova Publicação" id="" cols="30" rows="10"></textarea>
                    <label for="imagem">
                        <span>Imagens</span>
                        <input id="imagem" type="file" name="imagem[]" multiple accept="image/*">
                    </label>

                    <input type="submit" value="Publicar">
                </div>
                
                <div id="preview"></div>

            </form>
        </div>
    </section>
    <section class="publicacoes">
        
    </section>

    <input type="hidden" name="" id="page_index" value="1">
    <input type="hidden" id="user_id" value="{$user_logedIn['id']}">
    <input type="hidden" id="feed" value="true">

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <!-- <script>
        var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
    </script> -->
</div>