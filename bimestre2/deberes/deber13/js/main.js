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
        usuario: {
          required: true,
          minlength: 5,
          remote: {
            url: "rpc/user.php",
            type: "post",
            data:{}
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
  })
});