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

    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <!--General CSS-->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/menu.css">
  </head>
  <body class="body page-index clearfix" style="max-width:100%; overflow-x:hidden;">
    <?php
    ob_start();
    include ("aconexion.php");

    /*$idUsuario = $_GET["idUsuario"];
    $idCategoriaUsuario = $_GET["idCategoria"];
    */
    $idUsuario = 2;
    $idCategoria = 8;

    $resultado1 = $mysqli->query("SELECT * FROM clientes where idClientes = '".$idUsuario."' ");
    $fila1 = $resultado1->fetch_array();
    $usuario = $fila1['usuario'];
    $nombre = $fila1['nombreCliente'];
    $puntosCliente = $fila1['cpuntos'];
    $puntosClienteF = number_format($puntosCliente);
    $puntosOferta = $puntosCliente - 500;
    $puntosOfertaF = number_format($puntosOferta);

    $aleatorio = rand(-2000,2000);
    $puntosrand = $puntosOferta - $aleatorio;

    $resultado2 = $mysqli->query("SELECT * FROM productos where  puntos > '".$puntosrand."' ORDER BY puntos LIMIT 1;");
    $fila2 = $resultado2->fetch_array();

    $id = $fila2['idProductos'];
    $img = $fila2['idIncentivo'];
    $nom = utf8_encode($fila2['nombreProducto']);
    $desc = utf8_encode($fila2['descripcionProducto']);
    $pnts = number_format($fila2['puntos']);
    $cat = $fila2['Categoria_idCategoria'];

    $txtimg1="./Images/art/";
    $txtimg2=".png";
    $txtimg= $txtimg1 . $img . $txtimg2;



    $res = $mysqli->query("SELECT categoria FROM `categoria` where idCategoria = '".$cat."';");
    $catego = $res->fetch_array();
    $categoria = utf8_encode($catego['categoria']);
    ?>
    <div class="header">
      <nav>
        <button class="btn-menu">
          <span class="tit"><img src="./Images/svg/menu.svg"></span>
        </button>
        <div class="nav-brand">
          <img class="logo1" src="./Images/logo.svg" onclick="location.href='dashboard.php?idUsuario=<?php echo $idUsuario; ?>';">
        </div>
        <div class="buscador">
          <img src="./Images/svg/search.svg">
          <input>            
        </div>

        <div class="nav-contenedor left">

          <ul class="">
            <div class="buscador2">
              <img src="./Images/svg/search.svg">
              <input>            
            </div>
            <li><a href="home.php?idUsuario=<?php echo $idUsuario; ?>">Home</a></li><li><a href="./proximamente.html">Capacitación</a></li>
            <li><a href="./categoria.php?idUsuario=<?php echo $idUsuario; ?>">Catálogo<span class="caret"></span></a></li>
            <li><a href="favoritos.php?idUsuario=<?php echo $idUsuario; ?>">Favoritos</a></li><li><a >Wishlist</a></li>
            <li><a href="carrito.php?idUsuario=<?php echo $idUsuario; ?>">Mi carrito</a></li>
            <li class="cnta"><a>Mi cuenta<span class="caret"></span></a>
              <ul>
                <li><a href="./editar.php?idUsuario=<?php echo $idUsuario; ?>">Editar Perfil</a></li>
                <li><a href="cuenta.php?idUsuario=<?php echo $idUsuario; ?>">Estado de Cuenta</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="nav-contenedor right">
          <ul class="">
            <li class="img"><a href="./home.php?idUsuario=<?php echo $idUsuario; ?>"><img src="./Images/svg/home.svg"><span class="name"> Home</span></a></li><li class="img"><a href="./proximamente.html"><img src="./Images/svg/pencil.svg"><span class="name"> Capacitación</span></a></li>
            <li class="img"><a href="./categoria.php?idUsuario=<?php echo $idUsuario; ?>"><img src="./Images/svg/bag.svg"><span class="name"> Catálogo</span></a></li>
            <li class="img"><a href="./favoritos.php?idUsuario=<?php echo $idUsuario; ?>"><img src="./Images/svg/heart.svg"><span class="name"> Favoritos</span><span> (2)</span></a></li>
            <li class="img"><a href="./carrito.php?idUsuario=<?php echo $idUsuario; ?>"><img src="./Images/svg/cart.svg"><span class="name"> Mi carrito</span><span> (2)</span></a></li>
            <li class="img" id="btn-s1"><img src="./Images/svg/bell.svg"><span> (3)</span></li>
            <div class="separador"></div>
            <li class="img mnu-cuenta"><p><a href="./perfil.php"><img src="./Images/svg/user.png"><span> <?php echo $nombre; ?>  </span></a></p></li>
          </ul>
        </div>
        <button id="btn-s" class="btn-search">
          <img src="./Images/svg/Bell.svg"><span> (2)</span>
        </button>

        <div class="search-contenedor">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div class="carrito-contenedor">
          <div class="col-xs-12 carrito">
            <div class="contenido">
              <ul class="cuenta">
                <li><a  href="perfil.php?idUsuario=<?php echo $idUsuario; ?>">Mi muro</a></li><li><a  href="editar.php?idUsuario=<?php echo $idUsuario; ?>">Editar perfil</a></li>
                <li><a href="cuenta.php?idUsuario=<?php echo $idUsuario; ?>" >Estado de cuenta</a></li><li><a href="index.php" >Cerrar sesión</a></li>

              </ul>

            </div>
          </div>
        </div>
      </nav>
    </div>
    <div class="toast"> Tu producto fue agregado con éxito</div>
    <div class="toastg"> Tu producto fue agregado con éxito a tu lista</div>
    <div class="animacion-carga"><div><img src="./Images/logoc.png"> <p>Cargando...</p></div></div>
    <div class="contenedor">
      <div class="elemento">
        <div class="row">
          <div class="col-sm-8 clearfix">
            <div class="block-cuerpo">
              <p class="titulo clearfix">SI TE CACHAN QUE TE CACHEN EN RUSIA – utt<span></span></p>
              <img class="impacto-banner" src="./Images/banners/banner2.png">
              <p class="imp-f1"><br><b>¡Nos fuimos al mundial!</b>
                <br><br>
                Y lo logramos aumentando número de exhibiciones en tienda e incrementando sell in y sell out en autoservicios, tiendas de convenciencia y clubes de precio en el periodo Marzo-Abril
              </p>
              <img class="impacto-banner" src="./Images/banners/banner.png">
              <p class="imp-f1"><b>¿Qué logramos?</b>
                <br><br>
                Total marca Bonafont Natural + 13% VOLUMEN (+11.1Mio Lts)
                <br>
                <b>SELL IN:</b> +22% VS AA  (+ 27Mio LTS – Marzo-Abril) 
                <br>
                <b>SELL OUT:</b> +32% VS AA (+3.1Mio LTS)
              </p>
              <video class="imp-vid" controls>
                <source src="./archivos/julio/VideoRusiaBonafont.mp4" type="video/mp4">
                Your browser does not support HTML5 video.
              </video>
            </div>
          </div>
          <div class="col-sm-4 clearfix">
              <p class="block-titulo">Recursos PDF</p>
              <div class="block-cuerpo recursos">
                <a id="c0" class="active"><img src="./Images/svg/pdf.svg"><span>COMO SE CALCULA TU BONO</span></a>
                <a id="c1"><img src="./Images/svg/pdf.svg"><span>DISCIPLINA OPERATIVA UTTT LDP </span></a>
              </div>
              <div class="block-cuerpo">
                <p class="titulo clearfix">Titulo </p>
                <p class="titulo clearfix"><a id="toggle-revista" class="descarga f">Revista</a> <a class="descarga f" download>Descargar</a></p>
                <!--<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>-->
                <iframe class="a-cont" src="" width="600" height="780" style="border: none;"></iframe>
                <video class="a-cont" src="" controls>
                  <source src="" type="video/mp4">
                  Your browser does not support HTML5 video.
                </video>
                <img class="a-cont" src="">
              </div>
          </div>
        </div>
      </div>
      <div class="elemento revista clearfix">
        <div class="col-sm-12 cen clearfix">
          <div class="block-cuerpo">
            <p class="titulo clearfix">Revista <span><a href="./archivos/julio/placeholder.pdf" class="descarga f" download>Descargar</a><a id="close-revista" class="descarga f">Cerrar</a></span></p>
            <!--<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>-->
            <iframe src="./archivos/julio/placeholder.pdf"style="border: none;"></iframe>
            <video class="a-cont" src="" controls>
              <source src="mov_bbb.mp4" type="video/mp4">
              Your browser does not support HTML5 video.
            </video>
            <img class="a-cont" src="./archivos/onboarding/PASOS%20DE%20LA%20EJECUCION%20ASESOR%20DE%20VENTAS%20UTT.JPG">
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <div class="f2">
        <div class="contenido">
          <div class="row clearfix">
            <p>Todos los derechos reservados. Garra Jaguar 2018 <span><a>Politicas de Privacidad</a><span class="separador"></span><a>Reglas</a><span class="separador"></span><a href="./soporte.php">Soporte</a></span></p>
          </div>
        </div>
      </div>
    </div>


    <script type="text/javascript">
      h = $("div.vermass").width();
      $("div.vermass").css("height", h );

    </script>
    <script src="js/index.js"></script>
    <script src="js/detalle.js"></script>
    <script src="js/toast.js"></script>
    <script src="js/menu.js"></script>
    <script type="text/javascript">
      if($(window).width() > 768 ){
        var hi = 0;
        var h1 = $(".banner > div:nth-child(1)").height();
        var h2 = $(".banner > div:nth-child(2)").height();
        if( hi < h1 ){ hi = h1;}
        if( hi < h2 ){ hi = h2;}
        hi=hi+10;
        hi= hi + "px";
        $(".banner").css("height",hi);
      }
      $("p.r1").click(function(){
        $("div.r1").toggle();
        $("p.r1 > span").toggle();

      });
      $("p.r2").click(function(){
        $("div.r2").toggle();
        $("p.r2 > span").toggle();
      });
      $("p.r3").click(function(){
        $("div.r3").toggle();
        $("p.r3 > span").toggle();
      });

      $("#toggle-revista").click(function(){
        $(".elemento.revista").addClass("show");
      });
      $("#close-revista").click(function(){
        $(".elemento.revista").removeClass("show");
      });
    </script>
    <script src="js/cont-liderazgo.js"></script>

  </body>
</html>