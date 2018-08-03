$('.boton-top').click(function(){
    $('body,html').animate({scrollTop : 0}, 500);
    return false;
});

    $(window).scroll(function(){
    if ($(this).scrollTop() > 0) {
        $('.boton-top').fadeIn();
    } else {
        $('.boton-top').fadeOut();
    }

});

$(document).ready(function(){
   nviar_correo();
   navegacion();
   cerrar_menu();
});

function nviar_correo(){
 $("#formulario_contacto").submit(function(){
   $.ajax({
           type: "POST",
           url: "php/enviar_correo.php",
           data: $(this).serialize(),
           beforeSend: function(){$("#estatus_correo").html('<div style="text-center"><img src="img/cargar.gif" width="40px" class="d-block rounded mx-auto"></div>');},
           success: function(datas)
           {
          var responses = JSON.parse(datas);
        if (responses['success']) {$("#estatus_correo").html('');successAlert("Exito!","Correo Enviado.");recarga_otro();} 
        else{$("#estatus_correo").html(responses['error']);} 
           }
         }); 
    return false;
}); 
}

function alert(title, msg){
    if( typeof msg == 'undefined' )
    {
        msg = title;
        title = '';
    }
    $.jAlert({
        'title': title,
        'content': msg
    });
}

function navegacion(){
 $('.menu_action').click(function(e){
   e.preventDefault();
   scrollToElement( $(this).attr('href'), 900 );
}); 
}


var scrollToElement = function(el, ms){
    var speed = (ms) ? ms : 600;
    $('html,body').animate({
        scrollTop: $(el).offset().top
    }, speed);
}



function cerrar_menu(){
 $('.nav-link').click(function(){
   $("#navbarNav").removeClass("show");
});


}