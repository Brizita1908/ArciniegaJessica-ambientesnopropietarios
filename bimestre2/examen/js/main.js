$(document).ready(function() {

  $( "form#registro" ).validate({
     rules: {
        nombres: {
          required: true,
          minlength: 5
        },
        apellidos: {
          required: true,
          minlength: 5
        },
        email: {
          email: true,
          required: true,
          remote: {
            url: "rpc/email.php",
            type: "post",
            data:{
              
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
    nombres: {
      required: "Ingresa tu nombre.",
      minlength: $.validator.format("Al menos {0} caracteres requeridos")
    },
    apellidos: {
      required: "Ingresa tu apellido.",
      minlength: $.validator.format("Al menos {0} caracteres requeridos")
    },
    email: {
      required: "Ingresa tu correo electronico.",
      remote:"El correo electronico ya se encuentra registrado"
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
  })


  $("#btn-registrarme").on("click", function(){

    if( $( "form#registro" ).valid() ) {   
       var $btn = $(this).button('loading');
      $.ajax({
        url: 'rpc/procesar.php',
        type: 'post',
        // dataType: 'json',
        data: {"nombres": $("form#registro #nombres").val(),
              "apellidos": $("form#registro #apellidos").val(),
              "email": $("form#registro #email").val(),
              "contrasena": $("form#registro #contrasena").val()}
      })
      .done(function(msg) {
        if(msg=='true'){
          alert('Usuario registrado');
          window.location.href='index.php';
        }
        else
        {
          alert('no se pudo registrar');
        }
        console.log("success");
        $('#registro').trigger("reset");
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

  $("#btn-cancelar").on('click', function(){
   window.location.href='index.php';
  })


  $( "form#inicio-sesion" ).validate({
     rules: {
        email: {
          email: true,
          required: true,
        },
        contrasena: {
          required: true,
          minlength: 5
        },
    },
    messages: {
    email: {
      required: "Ingresa tu correo electronico."
    },
    contrasena: {
      required: "Ingresa tu contraseña.",
      minlength: $.validator.format("Al menos {0} caracteres requeridos")
    }
  }
  }),

  $("#btn-inises").on("click", function(){

    if( $( "form#inicio-sesion" ).valid() ) {
      $.ajax({
        url: 'rpc/inisesion.php',
        type: 'post',
        // dataType: 'json',
        data: {"email": $("form#inicio-sesion #email").val(),
              "contrasena": $("form#inicio-sesion #contrasena").val()}
      })
      .done(function(msg) {
        if(msg=='true'){
          alert("Has ingresado al modulo de matriculas");
          window.location.href='matriculacion.php';
        }
        else{
          alert("El usuario o contraseña ingresados no son correctos");
        }
        console.log("success");
        $('#inicio-sesion').trigger("reset");

      })
      .fail(function(jqXHR, textStatus, errorThrown) {
        console.log("fail: " + textStatus + " " + errorThrown);
        $("#error").html(textStatus)
      })
      .always(function() {
        console.log("complete");
      });
    }
    
  })

  $("#btn-reg").on('click', function(){
   window.location.href='registro.php';
  })


  $('#selnivel').on('change', function(event) {
    event.preventDefault();
    
    $.ajax({
      url: 'rpc/get_materias.php',
      type: 'POST',
      data: {nivel: $('#selnivel').val()},
    })
    .done(function(msg) {
      $('#materias').html(msg);
      console.log("success");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  })



var mats = [];


  $('#materias').on('click', function(event) {
      event.preventDefault();

      $('input:checkbox:checked').each(function ()
      {
          mats.push($(this).val());
        
      });
      
    });

  $("#btn-regmaterias").on('click', function(){
    event.preventDefault();


    alert(mats);

    $.ajax({
      url: 'rpc/reg_materias.php',
      type: 'POST',
      //dataType: 'JSON',
      data: {materias:mats},
    })
    .done(function(msg) {
      $('#materias').html(msg);
      console.log("success");
      location.reload();
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

    
  })

  

 

});