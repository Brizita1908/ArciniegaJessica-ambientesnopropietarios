<!DOCTYPE html> 
<html lang="es"> 
<head> 
  <meta charset="utf-8"> 
  <title>Inicio de Sesion</title>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-5 col-md-offset-3">
            <h3>Inicia sesión para matricularte</h3>
            <form id="inicio-sesion">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <input type="password" name="contrasena" class="form-control" id="contrasena" placeholder="Contraseña">
              </div>
            </form>
            <button type="button" class="btn btn-primary" id="btn-inises">Iniciar Sesión</button>
            <button type="button" class="btn btn-default" id="btn-reg">Registrarme</button>
          </div>
        </div>
      </div>
    </div>
            



    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/additional-methods.js"></script>

    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>