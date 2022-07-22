$(document).ready(function(){
    //Tratamento de mascaras
    $('.date').mask('11/11/1111');
    $('.time').mask('00:00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('.cep').mask('00000-000');
    $('.phone').mask('0000-0000');
    $('.phone_with_ddd').mask('(00) 00000-0000');
    $('.phone_us').mask('(000) 000-0000');
    $('.mixed').mask('AAA 000-S0S');
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.money').mask('000.000.000.000.000,00', {reverse: true});

  //Alterar imagem no upload de imagem em configuração
  var reader = new FileReader();
  reader.onload = function (e) {
    $('#img-config').css('background-image', "url("+e.target.result+")");
    $('#img-config').attr('src',"");
   }

  function readURL(input) {
    if (input.files && input.files[0]) {
      reader.readAsDataURL(input.files[0]);
    }
  }

  //Alterar imagem pagina fotos na seleção das miniaturas
  $("#campo-img").change(function(){
    readURL(this);
  });

  $(".img_thumb").on('click', function() {
    var cover = $('.img_cover');
    var thumb = $(this).attr('src');

    if(cover.attr('src') !== thumb) {
      cover.fadeTo('200', '0', function() {
        cover.attr('src', thumb);
        cover.fadeTo('150', '1');
      })
    }
    $(".img_thumb.active").removeClass('active');
    $(this).addClass('active');
  })

  //Ativar/desativar lightbox de nova postagem
  $('.publicar .exibir').on('click', function(){
    $(this).next().addClass('active');
    $('body').addClass('active-lightbox')
  })

  $('.lightbox .close').on('click', function(){
    $(this).parent().removeClass('active');
    $('body').removeClass('active-lightbox');
  })
});
