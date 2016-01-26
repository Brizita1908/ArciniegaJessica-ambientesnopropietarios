$(document).ready(function() {

  $( "form#contacto" ).validate({
     rules: {
        nombre: {
          required: true,
          minlength: 2
        },
        apellido: {
          required: true,
          minlength: 2
        },
        email: {
          email: true,
          required: true,
        },
        telefono: {
          required: true,
          digits: true,
          minlength: 9,
          maxlength:10
        },
        provincia: {
          required: true
        },
        canton: {
          required: true
        },
        parroquia: {
          required: true
        },
        usuario: {
          required: true,
          minlength: 5,
          remote: {
            url: "rpc/user.php",
            type: "post",
            data:{
                usuario:function(){
                return $('#usuario').val();
              } 
            }
          },
        },
        contrasena: {
          required: true,
          minlength: 5
        },
        vercontrasena: {
          required: true,
          minlength: 5,
          equalTo: "#contrasena"
        },
    },
    messages: {
    nombre: {
      required: "Ingresa tu nombre.",
      minlength: $.validator.format("Al menos {0} caracteres requeridos")
    },
    apellido: {
      required: "Ingresa tu apellido.",
      minlength: $.validator.format("Al menos {0} caracteres requeridos")
    },
    email: {
      required: "Ingresa tu correo electronico."
    },
    telefono: {
      required: "Ingresa tu número de teléfono.",
      digits: "El campo admite solo numeros",
      minlength: $.validator.format("Al menos {0} caracteres requeridos"),
      maxlength: $.validator.format("No mas de {0} caracteres requeridos")
    },
    provincia: {
      required: "Selecciona una provincia"
    },
    canton: {
      required: "Selecciona un canton"
    },
    parroquia: {
      required: "Selecciona una parroquia"
    },
    usuario: {
      required: "Ingresa un usuario.",
      minlength: $.validator.format("Al menos {0} caracteres requeridos")
    },
    contrasena: {
      required: "Ingresa tu contraseña.",
      minlength: $.validator.format("Al menos {0} caracteres requeridos")
    },
    vercontrasena: {
      required: "Ingresa tu contraseña nuevamente.",
      minlength: $.validator.format("Al menos {0} caracteres requeridos"),
      equalTo: "Las contraseñas no coinciden"
    }
  }
  });

  $('#selprovincia').on('change', function(event) {
    event.preventDefault();
    
    $.ajax({
      url: 'rpc/get_cantones.php',
      type: 'POST',
      data: {provincia: $('#selprovincia').val()},
    })
    .done(function(msg) {
      $('#selcanton').html(msg);
      $('#selparroquia').html('<option value="">Seleccione...</option>');
      console.log("success");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  });


  $('#selcanton').on('change', function(event) {
    event.preventDefault();
    
    $.ajax({
      url: 'rpc/get_parroquias.php',
      type: 'POST',
      data: {canton: $('#selcanton').val()},
    })
    .done(function(msg) {
      $('#selparroquia').html(msg);
      console.log("success");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  });


  $("#btn-enviar").on("click", function(){

    if( $( "form#contacto" ).valid() ) {   
       var $btn = $(this).button('loading');
      $.ajax({
        url: 'rpc/procesar.php',
        type: 'post',
        // dataType: 'json',
        data: {"nombre": $("form#contacto #nombre").val(),
              "apellido": $("form#contacto #apellido").val(),
              "email": $("form#contacto #email").val(),
              "telefono": $("form#contacto #telefono").val(),
              "direccion": $("form#contacto #direccion").val(),
              "provincia": $("form#contacto #selprovincia").val(),
              "canton": $("form#contacto #selcanton").val(),
              "parroquia": $("form#contacto #selparroquia").val(),
              "usuario": $("form#contacto #usuario").val(),
              "contrasena": $("form#contacto #contrasena").val()}
      })
      .done(function(msg) {
        console.log("success");
        $("#success").html(msg)
        $('#contact-form').modal('hide')
      })
      .fail(function(jqXHR, textStatus, errorThrown) {
        console.log("fail: " + textStatus + " " + errorThrown);
        $("#error").html(textStatus)
      })
      .always(function() {
        console.log("complete");
        $btn.button('reset');
      });
    }
    
  })
  $("#contact-form").on("hide.bs.modal", function(){
    $('#contacto')[0].reset();
  });


  $('#tabla_usuarios tr td').dblclick(function(event) {
      event.preventDefault();
     // $(this).html('<input type="text" value="' + $(this).html() + '">');

        var html = $(this).html();
        var input = $('<input type="text" value="' + $(this).html() + '">');
        input.val(html);
        $(this).html(input);
        $(this).children().first().focus();
        $(this).children().first().keypress(function (e) { 
          if (e.which == 13) { 
            var newContent = $(this).val(); 
            $(this).parent().text(newContent);
          }
            
        });

        $(this).children().first().blur(function(){
          var newContent = $(this).val(); 
          $(this).parent().text(newContent);
        });

        var fila = $(this).parent().parent().children().index($(this).parent());
        $('#boton'+fila).append('<button id="guardar_' + fila + '">Guardar</button>');

      
        $('#guardar_'+fila).on('click', function(event){
          event.preventDefault();
          var $btn = $(this).button('loading');
         
            $.ajax({
            url: 'rpc/actualizar.php',
            type: 'POST',
            data: {
              "nomb": $('form#act #nombre'+fila).text(),
              "apellido": $("form#act #apellido"+fila).text(),
              "email": $("form#act #email"+fila).text(),
              "telefono": $("form#act #telefono"+fila).text(),
              "direccion": $("form#act #direccion"+fila).text(),
              "usuario": $("form#act #usuario"+fila).text(),},
            })
            .done(function() {
              console.log("success");
            })
            .fail(function() {
              console.log("error");
            })
            .always(function() {
              console.log("complete");
            });


          // if($('#guardar_'+fila).css('display')!='none'){
          //   $('#guardar_'+fila).fadeOut();
          // }

          //alert($('form#act #nombre'+fila).text());
  });

 });
});