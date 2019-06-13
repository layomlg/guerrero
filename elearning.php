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
  <body class="body page-index clearfix">
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
        <p class="tit-elearning">Bienvenido al programa de capacitación Bonafont</p>
        <div id="c-1" class="curso">
          <p>Inicial</p>
          <p>Inducción comercial</p>
          <div class="niveles">
            <button class="outline active" data-course="c-1-1">Nivel 1</button>
            <button class="outline" data-course="c-1-2">Nivel 2</button>
            <button class="outline" data-course="c-1-3">Nivel 3</button>
            <button class="outline" data-course="c-1-4">Nivel 4</button>
          </div>
          <div class="contenidocurso">
            <div id="c-1-1" class="contenidos c-1 active">
              <p>Nivel 1</p>
              <div class="leccion complete">
                <div class="cuerpo">
                  <p>Clínica A</p>
                  <span><img src="./Images/svg/star.svg"></span>
                </div>
                <div class="nivel clearfix">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                    </div>
                  </div>
                  <span class="progress2">100%</span>
                  <button class="outline">Conocer más</button>
                  <button class="outline">Iniciar</button>
                </div>
              </div>
              <div class="leccion active">
                <div class="cuerpo">
                  <p>Clínica A</p>
                  <span><img src="./Images/svg/star.svg"></span>
                </div>
                <div class="nivel clearfix">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                    </div>
                  </div>
                  <span class="progress2">60%</span>
                  <button class="outline">Conocer más</button>
                  <button class="outline">Iniciar</button>
                </div>
              </div>
              <div class="leccion">
                <div class="cuerpo">
                  <p>Clínica A</p>
                  <span><img src="./Images/svg/star.svg"></span>
                </div>
                <div class="nivel clearfix">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                    </div>
                  </div>
                  <span class="progress2">60%</span>
                  <button class="outline">Conocer más</button>
                  <button class="outline">Iniciar</button>
                </div>
              </div>
              <div class="leccion">
                <div class="cuerpo">
                  <p>Clínica A</p>
                  <span><img src="./Images/svg/star.svg"></span>
                </div>
                <div class="nivel clearfix">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                    </div>
                  </div>
                  <span class="progress2">60%</span>
                  <button class="outline">Conocer más</button>
                  <button class="outline">Iniciar</button>
                </div>
              </div>
            </div>
            <div id="c-1-2" class="contenidos c-1">
              <p>Nivel 2</p>
              <div class="leccion">
                <div class="cuerpo">
                  <p>Clínica A</p>
                  <span><img src="./Images/svg/star.svg"></span>
                </div>
                <div class="nivel clearfix">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                    </div>
                  </div>
                  <span class="progress2">100%</span>
                  <button class="outline">Conocer más</button>
                  <button class="outline">Iniciar</button>
                </div>
              </div>
              <div class="leccion">
                <div class="cuerpo">
                  <p>Clínica A</p>
                  <span><img src="./Images/svg/star.svg"></span>
                </div>
                <div class="nivel clearfix">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                    </div>
                  </div>
                  <span class="progress2">60%</span>
                  <button class="outline">Conocer más</button>
                  <button class="outline">Iniciar</button>
                </div>
              </div>
              <div class="leccion">
                <div class="cuerpo">
                  <p>Clínica A</p>
                  <span><img src="./Images/svg/star.svg"></span>
                </div>
                <div class="nivel clearfix">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                    </div>
                  </div>
                  <span class="progress2">60%</span>
                  <button class="outline">Conocer más</button>
                  <button class="outline">Iniciar</button>
                </div>
              </div>
              <div class="leccion">
                <div class="cuerpo">
                  <p>Clínica A</p>
                  <span><img src="./Images/svg/star.svg"></span>
                </div>
                <div class="nivel clearfix">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                    </div>
                  </div>
                  <span class="progress2">60%</span>
                  <button class="outline">Conocer más</button>
                  <button class="outline">Iniciar</button>
                </div>
              </div>
            </div>


          </div>
        </div>
        <div id="c-2" class="curso">
          <p>Básico</p>
          <p>Básicos de ejecución</p>
          <div class="niveles">
            <button class="outline active" data-course="c-2-1">Nivel 1</button>
            <button class="outline" data-course="c-2-2">Nivel 2</button>
            <button class="outline" data-course="c-2-3">Nivel 3</button>
            <button class="outline" data-course="c-2-4">Nivel 4</button>
          </div>
          <div class="contenidocurso">
            <div id="c-2-1" class="contenidos c-2 active">
              <p>Nivel 1</p>
              <div class="leccion complete">
                <div class="cuerpo">
                  <p>Clínica A</p>
                  <span><img src="./Images/svg/star.svg"></span>
                </div>
                <div class="nivel clearfix">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                    </div>
                  </div>
                  <span class="progress2">100%</span>
                  <button class="outline">Conocer más</button>
                  <button class="outline">Iniciar</button>
                </div>
              </div>
              <div class="leccion active">
                <div class="cuerpo">
                  <p>Clínica A</p>
                  <span><img src="./Images/svg/star.svg"></span>
                </div>
                <div class="nivel clearfix">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                    </div>
                  </div>
                  <span class="progress2">60%</span>
                  <button class="outline">Conocer más</button>
                  <button class="outline">Iniciar</button>
                </div>
              </div>
              <div class="leccion">
                <div class="cuerpo">
                  <p>Clínica A</p>
                  <span><img src="./Images/svg/star.svg"></span>
                </div>
                <div class="nivel clearfix">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                    </div>
                  </div>
                  <span class="progress2">60%</span>
                  <button class="outline">Conocer más</button>
                  <button class="outline">Iniciar</button>
                </div>
              </div>
              <div class="leccion">
                <div class="cuerpo">
                  <p>Clínica A</p>
                  <span><img src="./Images/svg/star.svg"></span>
                </div>
                <div class="nivel clearfix">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                    </div>
                  </div>
                  <span class="progress2">60%</span>
                  <button class="outline">Conocer más</button>
                  <button class="outline">Iniciar</button>
                </div>
              </div>
            </div>


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


    <!-- Modal subir foto-->
    <div class="modal fade" id="foto" role="dialog">
      <div class="modal-dialog">

        <!-- Modal subir fotografía-->
        <div class="modal-content">
          <div class="modal-body">
            <div class="clearfix">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="subir-foto">
              <div>
                <img src="./Images/svg/camera.svg">
                <p>Subir Fotos</p>
              </div>
            </div>
            <select class="subir-foto-select" name="text">
              <option value="value1">Albúm 1</option> 
              <option value="value2" selected>Albúm 2</option>
              <option value="value3">Albúm 3</option>
              <option value="value3">Albúm 4</option>
            </select>
            <button class="outline c">Publicar</button>
          </div>
        </div>

      </div>
    </div>
    <script src="js/index.js"></script>
    <script src="js/detalle.js"></script>
    <script src="js/toast.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/elearning.js"></script>
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
    </script>

  </body>
</html>