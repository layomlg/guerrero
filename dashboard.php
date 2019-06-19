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
        min-height: 100vh;
        background: rgba(149,211,215,1);
        background: -moz-linear-gradient(45deg, rgba(149,211,215,1) 0%, rgba(68,125,217,1) 100%);
        background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(149,211,215,1)), color-stop(100%, rgba(68,125,217,1)));
        background: -webkit-linear-gradient(45deg, rgba(149,211,215,1) 0%, rgba(68,125,217,1) 100%);
        background: -o-linear-gradient(45deg, rgba(149,211,215,1) 0%, rgba(68,125,217,1) 100%);
        background: -ms-linear-gradient(45deg, rgba(149,211,215,1) 0%, rgba(68,125,217,1) 100%);
        background: linear-gradient(45deg, rgba(149,211,215,1) 0%, rgba(68,125,217,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#95d3d7', endColorstr='#447dd9', GradientType=1 );
        margin: 0px;
        overflow-y: auto;
      }
      .contenedor{
        top: 0px;
        width: 100%;
        max-width: none;
        min-height: 100vh;
        background: #EBEBEB;
        margin: 0px;
        overflow-y: auto;
      }
    </style>

  </head>
  <body class="body page-index clearfix">
    <div class="contenedor">
      <div class="login-lnv login-programas">
        <p class="lndg-p1">Bienvenido</p>
        <p class="lndg-p3">Selecciona la plataforma a la cual deseas ingresar:</p>
        <br>
        <br>

        <div class="bloque">
          <div class="programa2 c1" onclick="location.href='./home.php?idUsuario=2';">
            <div class="c2">
              <img src="Images/dashboard/1.png">
              <img src="Images/dashboard/1h.png">
            </div>
          </div>
        </div>
        <!--<br>-->
        <div class="bloque">
          <div class="programa2 c1" onclick="location.href='./proximamente.html';">
            <div class="c2">
              <img src="Images/dashboard/2.png">
              <img src="Images/dashboard/2h.png">
            </div>
          </div>
        </div>
        <!--<div class="bloque">
<div class="programa2 c1" onclick="location.href='./proximamente.html';">
<div class="c2">
<img src="Images/dashboard/3.png">
</div>
</div>
</div>
<div class="bloque">
<div class="programa2 c1" onclick="location.href='./ranking.php?idUsuario=2';">
<div class="c2">
<img src="Images/dashboard/4.png">
</div>
</div>
</div>-->
      </div>
    </div>
  </body>
</html>
