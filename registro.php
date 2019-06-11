<!doctype html>
<html>
  <head>

    <title>Garra Jaguar</title>
    <link rel="shortcut icon" href="./Images/favicon.ico"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BOOTSTRAP Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <!------------------------------------------------>
    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <!--General CSS-->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/menu.css">
    <style type="text/css">
      .contenedor{
        top: 0px;
        width: 100%;
        max-width: none;
        height: calc( 100vh );
        margin: 0px;
        overflow-y: auto;

        background-image: url("./Images/fondo-login.png");
        background-size: cover;
        background-repeat: no-repeat;
      }
      .login-datos{
        display: block;
        width: 100%;
        max-width: 400px;
        margin: 25px auto;
        
      }
    </style>

  </head>
  <body class="body page-index clearfix">
    <div class="contenedor">
      <div class="login-lnv login-programas">
        <h3>Bienvenido</h3>
        <div class="login-datos">
          <img src="./Images/logo.svg" style="margin-bottom:30px;">
          <p>Ingresa tus datos para crear tu cuenta</p>
          <input type="text" placeholder="Nombre(s)">
          <input type="text" placeholder="Apellido Paterno">
          <input type="text" placeholder="Apellido Materno">
          <input type="text" placeholder="Correo electrónico">
          <input type="text" placeholder="Región">
          <input type="text" placeholder="Contraseña">
          <input type="text" placeholder="Confirma tu contraseña">
          <input type="button" value="Registrar" style="margin-top:30px" onclick="alert('Tu solicitud será enviada a un administrador'); location.href='./index.php';">

        </div>
      </div>
    </div>
  </body>
</html>
