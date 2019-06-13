<!doctype html>
<html>
  <head>

    <title></title>
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

        background: rgba(149,211,215,1);
        background: -moz-linear-gradient(45deg, rgba(149,211,215,1) 0%, rgba(68,125,217,1) 100%);
        background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(149,211,215,1)), color-stop(100%, rgba(68,125,217,1)));
        background: -webkit-linear-gradient(45deg, rgba(149,211,215,1) 0%, rgba(68,125,217,1) 100%);
        background: -o-linear-gradient(45deg, rgba(149,211,215,1) 0%, rgba(68,125,217,1) 100%);
        background: -ms-linear-gradient(45deg, rgba(149,211,215,1) 0%, rgba(68,125,217,1) 100%);
        background: linear-gradient(45deg, rgba(149,211,215,1) 0%, rgba(68,125,217,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#95d3d7', endColorstr='#447dd9', GradientType=1 );
      }
      .login-datos{
        display: block;
        width: 100%;
        max-width: 400px;
        margin: 25px auto;

      }
      div.login-lnv.login-programas{
        position: absolute;
        top: 50%;
        transform: translate(-50%, -50%);
      }
      #logojaguar{
        margin-top:100px;
      }
    </style>

  </head>
  <body class="body page-index clearfix">
    <div class="contenedor">
      <div class="login-lnv login-programas">
        <div class="row">
<!--
          <div class="col-sm-6 h">
            <div><img id="logojaguar" src="Images/logoc.png"></div>
          </div>
-->
          <div class="col-sm-6">
            <p class="lndg-p1">Bienvenido a:</p>
            <img src="Images/logo.svg" style="width:70%;">

            <div class="login-datos">
              <p>Usuario</p>
              <input id="user" type="text">
              <p>Contraseña</p>
              <input type="password">
              <p class="r"><a data-toggle="modal" data-target="#contrasenia">Olvide contraseña</a></p>
              <input id="entrar" type="button" value="Ingresar" onclick="location.href='./dashboard.php'">
              <!--<p class="c">¿Aún no eres usuario?</p>
<input type="button" value="Registrate aqui" onclick="location.href='./registro.php'">-->
            </div>
          </div>
        </div>
        <!--<p class="lndg-p1">Bienvenido a</p>
<p class="lndg-p2">Bienestar Total</p>
<div class="login-datos">
<p>Usuario</p>
<input id="user" type="text">
<p>Contraseña</p>
<input type="password">
<p class="r"><a data-toggle="modal" data-target="#contrasenia">Olvide mi contraseña</a></p>
<input id="entrar" type="button" value="Ingresar" onclick="location.href='./dashboard.php'">
<p class="c">¿Aún no eres usuario?</p>
<input type="button" value="Registrate aqui" onclick="location.href='./registro.php'">
</div>-->
      </div>
    </div>
    <!-- Modal creacion de grupo-->
    <div class="modal fade" id="contrasenia" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body c-contrasenia">
            <div class="clearfix">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <p>Recuperación de Contraseña</p>
            <p class="subtitulo">Ingresa tu correo electrónico para reestablecer tu contraseña</p>

            <label>Correo electrónico</label>
            <input type="email">
            <button class="outline c">Enviar</button>
            <hr>
            <p>Si requieres ayuda de nuestros operadores, marca:</p>
            <a href="tel:5512502310">(55) 1250 2310</a>
            <a href="tel:018008225970">01 800 822 5970</a>


          </div>
        </div>

      </div>
    </div>
  </body>
</html>