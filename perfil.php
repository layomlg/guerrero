<!doctype html>
<html>
  <head>

    <title>GuerreroBook</title>
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

    #$idUsuario = $_GET["idUsuario"];
    $idUsuario = 2;

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
            <li><a href="home.php?idUsuario=<?php echo $idUsuario; ?>">Inicio</a></li><li><a href="./proximamente.html">Capacitación</a></li>
            <li><a href="./categoria.php?idUsuario=<?php echo $idUsuario; ?>">Catálogo<span class="caret"></span></a></li>
            <li><a href="favoritos.php?idUsuario=<?php echo $idUsuario; ?>">Favoritos</a></li><li><a >Wishlist</a></li>
            <li><a href="carrito.php?idUsuario=<?php echo $idUsuario; ?>">Carrito</a></li>
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


            <li class="img mnu-cuenta"><p><a href="./perfil.php"><img class="user" src="./Images/user-perfil.png"><span> <?php echo $nombre; ?>  </span></a></p>

              <!--------------CAMBIO ------------------------>

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

              <!--------------CAMBIO ------------------------>


            </li>
            <div class="separador"></div>

            <li class="img"><a href="./home.php?idUsuario=<?php echo $idUsuario; ?>">
              <img class="img-a" src="./Images/svg/home.svg">
              <img class="img-b" src="./Images/svg/home-b.svg">
              <span class="name"> Inicio</span>
              </a>
            </li>
            <li class="img">
              <a href="./categoria.php?idUsuario=<?php echo $idUsuario; ?>">
                <img class="img-a" src="./Images/svg/bag.svg">
                <img class="img-b" src="./Images/svg/bag-b.svg">
                <span class="name"> Catálogo</span>
              </a>
            </li>
            <li class="img">
              <a href="./carrito.php?idUsuario=<?php echo $idUsuario; ?>">
                <img class="img-a" src="./Images/svg/cart.svg">
                <img class="img-b" src="./Images/svg/cart-b.svg">
                <span class="name"> Carrito</span>
                <span> (2)</span>
              </a></li>
            <li class="img"
                ><a href="./proximamente.html">
              <img class="img-a" src="./Images/svg/pencil.svg">
              <img class="img-b" src="./Images/svg/pencil-b.svg">
              <span class="name"> E-learning</span>
              </a>
            </li>
            <li class="img" id="btn-s1">
              <img class="img-a" src="./Images/svg/bell.svg">
              <img class="img-b" src="./Images/svg/bell-b.svg">
              <span> (3)</span>
            </li>
          </ul>
        </div>
        <button id="btn-s" class="btn-search">

          <img class="img-" src="./Images/svg/Bell.svg">
          <span> (2)</span>
        </button>

        <div class="search-contenedor">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>

      </nav>
    </div>
    <div class="toast"> Tu producto fue agregado con éxito</div>
    <div class="toastg"> Tu producto fue agregado con éxito a tu lista</div>
    <div class="animacion-carga"><div><img src="./Images/logocarga.png"> <p>Cargando...</p></div></div>
    <div class="contenedor">
      <div class="elemento">
        <div class="row">
          <div class="portada">
            <!--  <img src="./Images/portada.png">-->
            <img class="foto-perfil" src="./Images/foto-perfil.png">


          </div>
          <div class="informacion-perfil">
            <p>Alias</p>
            <div class="separador"></div>
            <p><?php echo $nombre; ?></p>
            <div class="separador"></div>
            <p>Región 4</p>
          </div>
        </div>
      </div>
      <div class="elemento">
        <div class="row">
          <div class="col-sm-3 izq clearfix">
            <!--<p class="block-titulo">Ranking</p>
<div class="block-cuerpo perfil elearning">
<p>Regional 25 <span>Nacional 50</span></p>
<hr>
<p>E-learning</p>
<div class="nivel clearfix">
<span class="nivel">Nivel 1 </span>
<div class="progress">
<div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:100%">
</div>
</div>
</div>
<div class="nivel clearfix">
<span class="nivel">Nivel 2 </span>
<div class="progress">
<div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:60%">
</div>
</div>

</div>
<div class="nivel clearfix">
<span class="nivel">Nivel 3 </span>
<div class="progress">
<div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:0%">
</div>
</div>
</div>
<div class="nivel clearfix">
<span class="nivel">Nivel 4 </span>
<div class="progress">
<div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:0%">
</div>
</div>
</div>


</div>-->
            <p class="block-titulo">Estado de cuenta</p>
            <div class="block-cuerpo">
              <!--
<p>Mis conquistas <span class="datos">800</span></p>
<p>Mis batallas <span class="datos">200</span></p>
<p>Bolsa guerrera <span class="datos">150</span></p>
<p>Otros <span class="datos">0</span></p>
<p>Subtotal <span class="datos">1150</span></p>
<p>Puntos canjeados <span class="datos">100</span></p>-->

              <p class="tit1">Puntos Disponibles</p>
              <p class="pts disp"><span>1050</span> pts.</p>
              <hr class="block-separador cje">
              <p class="tit1 cje">Puntos por canjear en Mi Carrito</p>
              <p class="pts cje"><span>1050</span> pts.</p>
              <button class="outline c cje" onclick="location.href='carrito.php?idUsuario=<?php echo $idUsuario; ?>';">Canjear</button>
            </div>
            <!--<p class="block-titulo">Catálogo</p>
<div class="seccion block-cuerpo">
<p>Temporalidad</p>
<p>Tendencias</p>
<p>Personal</p>
<button class="outline c" onclick="location.href='categoria.php?idUsuario=<?php echo $idUsuario; ?>';">Ver más</button>
</div>-->

            <!-------CAMBIO---------->
            <p class="block-titulo der r1">Top 5 Regional<span>+</span><span>-</span></p>
            <div class="block-cuerpo top r1">
              <div>
                <span class="rank">1</span>
                <p>Juan Pérez <span class="datos">800 pts</span></p>
                <p> <span class="datos">Region 5</span></p>
              </div>
              <div>
                <span class="rank">2</span>
                <p>Juan Pérez <span class="datos">800 pts</span></p>
                <p> <span class="datos">Region 5</span></p>
              </div>
              <div class="active">
                <span class="rank">3</span>
                <p>Juan Pérez <span class="datos">800 pts</span></p>
                <p> <span class="datos">Region 5</span></p>
              </div>
              <div class="">
                <span class="rank">4</span>
                <p class="nombre">Juan Pérez <span class="datos">800 pts</span></p>
                <p class="info"><span class="datos">Region 5</span></p>
              </div>
              <div>
                <span class="rank">5</span>
                <p>Juan Pérez <span class="datos">800 pts</span></p>
                <p> <span class="datos">Region 5</span></p>
              </div>

            </div>
            <p class="block-titulo der r2">Top 5 Por Sector<span>+</span><span>-</span></p>
            <div class="block-cuerpo top r2">
              <div>
                <span class="rank">1</span>
                <p>Juan Pérez <span class="datos">800 pts</span></p>
                <p> <span class="datos">Region 5</span></p>
              </div>
              <div>
                <span class="rank">2</span>
                <p>Juan Pérez <span class="datos">800 pts</span></p>
                <p> <span class="datos">Region 5</span></p>
              </div>
              <div>
                <span class="rank">3</span>
                <p>Juan Pérez <span class="datos">800 pts</span></p>
                <p> <span class="datos">Region 5</span></p>
              </div>
              <div>
                <span class="rank">4</span>
                <p class="nombre">Juan Pérez <span class="datos">800 pts</span></p>
                <p class="info"><span class="datos">Region 5</span></p>
              </div>
              <div>
                <span class="rank">5</span>
                <p>Juan Pérez <span class="datos">800 pts</span></p>
                <p> <span class="datos">Region 5</span></p>
              </div>
              <div class="active">
                <span class="rank">9</span>
                <p>Juan Pérez <span class="datos">800 pts</span></p>
                <p> <span class="datos">Region 5</span></p>
              </div>

            </div>

            <p class="block-titulo">Álbumes</p>
            <div class="block-cuerpo top">
              <img src="./Images/publicaciones/p9.JPG" onclick="location.href='./album.php?idUsuario=<?php echo $idUsuario; ?>';">
              <div class="bton">
                <button type="button" class="outline c mb-10" onclick="location.href='album.php?idUsuario=<?php echo $idUsuario; ?>';"><i class="fa fa-download" ></i>Ver Álbumes</button>
              </div>
            </div>




            <!--<p class="block-titulo">Álbumes</p>
<div class="block-cuerpo top">
<p class="album-titulo">Guerrero Jaguar</p>
<img src="./Images/album1.png" onclick="location.href='./album.php?idUsuario=<?php echo $idUsuario; ?>';">
</div>
<div class="block-cuerpo top">
<p class="album-titulo">Reto Silk Selfie</p>
<img src="./Images/album2.png" onclick="location.href='./album.php?idUsuario=<?php echo $idUsuario; ?>';">
</div>
<div class="block-cuerpo top">
<p class="album-titulo">Ejecución vitalinea</p>
<img src="./Images/album3.png" onclick="location.href='./album.php?idUsuario=<?php echo $idUsuario; ?>';">
</div>
<div class="block-cuerpo top">
<p class="album-titulo">Mi galeria</p>
<img src="./Images/album4.png" onclick="location.href='./album.php?idUsuario=<?php echo $idUsuario; ?>';">
</div>-->
          </div>
          <div class="col-sm-6 cen clearfix">
            <div class="block-cuerpo">
              <p>Nueva Publicación</p>
              <textarea></textarea>
              <p>Hasta 200 caracteres por publicación<span>0/200 Caracteres</span></p>
              <div class="botones">
                <button class="gris" data-toggle="modal" data-target="#foto" ><img src="Images/svg/camera.png"> Subir Fotos</button>
                <button class="outline f">Publicar</button>
              </div>
            </div>
            <div class="block-cuerpo">
              <p class="seccion">Filtrar publicaciones por: </p>
              <div class="pub-filtro">
                <div class="row">
                  <div class="col-sm-6">
                    <select>
                      <option value="0">Todas las publicaciones</option>
                      <option value="0">Más Me gusta</option>
                      <option value="0">Menos Me gusta</option>
                    </select>
                  </div>
                  <div class="col-sm-6">

                    <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" />
                  </div>
                </div>
              </div>
            </div>
            <div class="block-cuerpo">
              <div class="cabecera">
                <img class="logo" src="./Images/logoc.png">
                <p class="titulo">Aliado Jaguar</p>
                <p class="info">22/12/2017 10:30am</p>
                <br>
                <p class="contenido">Plan de acción</p>
                <span class="destacado"></span>
                <span class="editar"></span>
                <span class="eliminar"></span>
              </div>

              <img src="Images/publicaciones/p4.JPG">
              <div class="botones">
                <p class="likes"><span>3</span> Me gusta<br><span>5</span> Comentarios</p>
                <div class="btn-cont clearfix">           
                  <button class="gris b-like"><img src="Images/svg/like.png"> Me gusta</button>                
                  <button class="gris b-comment"><img  src="Images/svg/globe.png"> Comentar</button>
                </div>
              </div>
              <div class="comentar comentario clearfix">
                <img class="logo" src="./Images/user1.jpeg">
                <textarea maxlength="200" rows="2" data-info="textarea-words-info" style="resize:none">JUAREZ TORRES FRANCISCO PEDRO, SIGUAMOS CON TODO GRUPO COAPA ANIMO</textarea>
                <span class="eliminar"></span>
                <span class="editar"></span>  
                <div class="botones">
                  <button class="outline f">Comentar</button>
                </div>
                <br>
              </div>
              <div class="comentar comentario editar clearfix">
                <img class="logo" src="./Images/user1.jpeg">
                <textarea maxlength="200" rows="2" data-info="textarea-words-info" style="resize:none">JUAREZ TORRES FRANCISCO PEDRO, SIGUAMOS CON TODO GRUPO COAPA ANIMO</textarea>
                <span class="eliminar"></span>
                <span class="editar"></span>                
                <div class="botones">
                  <button class="outline f">Comentar</button>
                </div>
                <br>
              </div>
              <div class="comentar clearfix">
                <img class="logo" src="./Images/logoc.png">
                <textarea></textarea>
                <p>Hasta 200 caracteres por publicación<span>0/200 Caracteres</span></p>
                <div class="botones">
                  <button class="outline f">Comentar</button>
                </div>
              </div>
            </div>
            <div class="block-cuerpo">
              <div class="cabecera">
                <img class="logo" src="./Images/logoc.png">
                <p class="titulo">Aliado Jaguar</p>
                <p class="info">22/12/2017 10:30am</p>
                <br>
                <p class="contenido">Plan de acción</p>
                <span class="destacado"></span>
                <span class="editar"></span>
                <span class="eliminar"></span>
              </div>

              <img src="Images/publicaciones/p5.JPG">
              <div class="botones">
                <p class="likes"><span>3</span> Me gusta<br><span>5</span> Comentarios</p>
                <div class="btn-cont clearfix">           
                  <button class="gris b-like"><img src="Images/svg/like.png"> Me gusta</button>                
                  <button class="gris b-comment"><img  src="Images/svg/globe.png"> Comentar</button>
                </div>
              </div>
              <div class="comentar comentario clearfix">
                <img class="logo" src="./Images/user1.jpeg">
                <textarea maxlength="200" rows="2" data-info="textarea-words-info" style="resize:none">JUAREZ TORRES FRANCISCO PEDRO, SIGUAMOS CON TODO GRUPO COAPA ANIMO</textarea>
                <span class="eliminar"></span>
                <span class="editar"></span>  
                <div class="botones">
                  <button class="outline f">Comentar</button>
                </div>
                <br>
              </div>
              <div class="comentar comentario editar clearfix">
                <img class="logo" src="./Images/user1.jpeg">
                <textarea maxlength="200" rows="2" data-info="textarea-words-info" style="resize:none">JUAREZ TORRES FRANCISCO PEDRO, SIGUAMOS CON TODO GRUPO COAPA ANIMO</textarea>
                <span class="eliminar"></span>
                <span class="editar"></span>                
                <div class="botones">
                  <button class="outline f">Comentar</button>
                </div>
                <br>
              </div>
              <div class="comentar clearfix">
                <img class="logo" src="./Images/logoc.png">
                <textarea></textarea>
                <p>Hasta 200 caracteres por publicación<span>0/200 Caracteres</span></p>
                <div class="botones">
                  <button class="outline f">Comentar</button>
                </div>
              </div>
            </div>

          </div>
          <div class="col-sm-3 der clearfix">
            <div class="block-cuerpo">
              <div id="promo" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators" style="display:none;">
                  <li data-target="#promo" data-slide-to="0" class="active"></li>
                  <li data-target="#promo" data-slide-to="1"></li>
                  <li data-target="#promo" data-slide-to="2"></li>
                  <li data-target="#promo" data-slide-to="3"></li>
                  <li data-target="#promo" data-slide-to="4"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="./Images/Bocas%20GIF.gif">
                  </div>

                  <div class="item">
                    <img src="./Images/Silk%20Chocolate.jpg">
                  </div>

                  <div class="item">
                    <img src="./Images/prioridad/pbod1.png">
                  </div>
                  <div class="item">
                    <img src="./Images/prioridad/phip1.png">
                  </div>
                  <div class="item">
                    <img src="./Images/prioridad/ppre1.png">
                  </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#promo" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#promo" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              <div id="Left_pnlUTT" style="text-align: center">

                <br>
                <a href="" id="Left_utt" data-toggle="modal" data-target="#pab-viewer">
                  <button type="button" class="outline"><i class="fa fa-download"></i>Ver PAB</button>
                </a>
                <br>
                <!--<a href="https://www.cubica.mx/guerrerobook2018/assets/pdf/Estrategia_promocional_Marzo_2018_SILK.pdf" id="Left_utt2" target="new">
                  <button type="button" class="outline"><i class="fa fa-download"></i>PDF Convivencia</button>
                </a>-->

              </div>
            </div>


            <!-------CAMBIO---------->
            <p class="block-titulo">Productos para tí</p>
            <div class="block-cuerpo">
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators" style="display:none;">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <div class="art clearfix">
                      <div class="img"><img src="./Images/art/MLG17529.png"></div>
                      <div class="art-desc">
                        <a href="detalle.php?idUsuario=2&ID=54">
                          <p title="Lavadora de 18 Kg. Whirlpool&reg;">Lavadora de 18 Kg. Whirlpool&reg;</p>
                        </a>
                        <p class="pts">155 pts. 
                        </p>
                        <button class="outline c canje" onclick="agregar(<?php echo $id;?>,<?php echo $idUsuario;?>)">
                          <img class="img-a" title="Agregar a Carrito"src="./Images/svg/cart.svg">
                          <img class="img-b" title="Agregar a Carrito"src="./Images/svg/cart-b.svg">
                          <span>&nbsp;&nbsp;&nbsp;Agregar a carrito</span>
                        </button>
                      </div>
                    </div>

                  </div>

                  <div class="item">
                    <div class="art clearfix">
                      <div class="img"><img src="./Images/art/MLG17529.png"></div>
                      <div class="art-desc">
                        <a href="detalle.php?idUsuario=2&ID=54">
                          <p title="Lavadora de 18 Kg. Whirlpool&reg;">Lavadora de 18 Kg. Whirlpool&reg;</p>
                        </a>
                        <p class="pts">155 pts.</p>
                        <button class="outline c canje" onclick="agregar(<?php echo $id;?>,<?php echo $idUsuario;?>)">
                          <img class="img-a" title="Agregar a Carrito"src="./Images/svg/cart.svg">
                          <img class="img-b" title="Agregar a Carrito"src="./Images/svg/cart-b.svg">
                          <span>&nbsp;&nbsp;&nbsp;Agregar a carrito</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="art clearfix">
                      <div class="img"><img src="./Images/art/MLG17529.png"></div>
                      <div class="art-desc">
                        <a href="detalle.php?idUsuario=2&ID=54">
                          <p title="Lavadora de 18 Kg. Whirlpool&reg;">Lavadora de 18 Kg. Whirlpool&reg;</p>
                        </a>
                        <p class="pts">155 pts.</p>
                        <button class="outline c canje" onclick="agregar(<?php echo $id;?>,<?php echo $idUsuario;?>)">
                          <img class="img-a" title="Agregar a Carrito"src="./Images/svg/cart.svg">
                          <img class="img-b" title="Agregar a Carrito"src="./Images/svg/cart-b.svg">
                          <span>&nbsp;&nbsp;&nbsp;Agregar a carrito</span>
                        </button>
                      </div>
                    </div>
                  </div>


                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
            <!-------CAMBIO---------->


          </div>
        </div>


      </div>


    </div>
    <div class="footer">
      <div class="f2">
        <div class="contenido">
          <div class="row clearfix">
            <p>Todos los derechos reservados. Guerrerobook  <span><a>Términos y Condiciones</a><span class="separador"></span><a>Reglas</a><span class="separador"></span><a href="./soporte.php">Contacto</a></span></p>
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
    <!-- Modal -->
    <div class="modal fade" id="pab-viewer" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-body">
            <div class="clearfix">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="block-cuerpo">
              <object class="pdfviewer" data="./files/PAM%20Junio%20UTT%202019-Final.pdf#toolbar=0&navpanes=0&scrollbar=0"></object>
            </div>




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
    </script>

  </body>
</html>
