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


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>


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

    $resultado2 = $mysqli->query("SELECT * FROM productos where puntos > '".$puntosrand."' AND Categoria_idCategoria = 10 ORDER BY puntos LIMIT 1;");
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
          <img class="logo1" src="./Images/logo.svg" onclick="location.href='home.php?idUsuario=<?php echo $idUsuario; ?>';">
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


            <li class="img mnu-cuenta"><p><a href="./perfil.php"><img class="user" src="./Images/user-perfil.png"><span> <?php echo $nombre;?></span></a></p>

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
            <li class="img pr-20">
              <a href="./carrito.php?idUsuario=<?php echo $idUsuario; ?>">
                <img class="img-a" src="./Images/svg/cart.svg">
                <img class="img-b" src="./Images/svg/cart-b.svg">
                <span class="name"> Carrito</span>
                <span class="indicator">3</span>
              </a></li>
            <li class="img"
                ><a href="./proximamente.html">
              <img class="img-a" src="./Images/svg/pencil.svg">
              <img class="img-b" src="./Images/svg/pencil-b.svg">
              <span class="name"> E-learning</span>
              </a>
            </li>
            <li class="img pr-20" id="btn-s1">
              <img class="img-a" src="./Images/svg/bell.svg">
              <img class="img-b" src="./Images/svg/bell-b.svg">
              <span class="indicator">3</span>
            </li>
          </ul>
        </div>
        <button id="btn-s" class="btn-search">

          <img class="img-" src="./Images/svg/Bell.svg">
          <span class="indicator">3</span>
        </button>

        <div class="search-contenedor"><p>Guerre@ ya se encuentran disponibles tus puntos de junio en tu estado de cuenta</p><p>¡Tienes hasta el próximo 15 de julio para realizar tus canjes de este periodo!</p><p>Del 20 al 25 de julio, ¡tus puntos valen el doble!</p><p>Sube una foto de tu teatralización con la prioridad 1 del periodo antes del 30 de julio y gana un ¡Kit Guerrrero!</p>




        </div>

      </nav>
    </div>
    <div class="toast"> Tu producto fue agregado con éxito</div>
    <div class="toastg"> Tu producto fue agregado con éxito a tu lista</div>
    <div class="animacion-carga"><div><img src="./Images/logocarga.png"> <p>Cargando...</p></div></div>
    <div class="contenedor">
      <div class="elemento">
        <div class="row">
          <div class="col-sm-3 izq clearfix">
            <p class="block-titulo">Estado de cuenta</p>
            <div class="block-cuerpo">
              <p class="tit1">Puntos Disponibles</p>
              <p class="pts disp"><span>4,500</span> pts.</p>
              <hr class="block-separador cje">
              <p class="tit1 cje">Puntos por canjear en Mi Carrito</p>
              <p class="pts cje"><span>4,500</span> pts.</p>
              <button class="outline c cje" onclick="location.href='carrito.php?idUsuario=<?php echo $idUsuario; ?>';">Canjear</button>
            </div>
            <!--
<p class="block-titulo">Categorías</p>
<div class="block-cuerpo">
<div class="block-categorias">
<div class="categoria art">
<div class="cat-cont">
<img src="./Images/nuevas/art-personales.svg">
<p class="tit-cat">Artículos Personales</p>
</div>
<div class="subcat">
<ul>
<li><a href=""><p>Accesorios Personales</p></a></li>
<li><a href=""><p>Arreglo Personal</p></a></li>
<li><a href=""><p>Cuidado Personal</p></a></li>
<li><a href=""><p>Joyería</p></a></li>
<li><a href=""><p>Relojes</p></a></li>
</ul>
</div>
</div>
<div class="categoria aut">
<div class="cat-cont">
<img src="./Images/nuevas/autos.svg">
<p class="tit-cat">Autos</p>
</div>
<div class="subcat">
<ul>
<li><a href=""><p>Accesorios para auto</p></a></li>
<li><a href=""><p>Aspiradoras y Lava Alfombra</p></a></li>
<li><a href=""><p>Herramientas</p></a></li>
</ul>
</div>
</div>
<div class="categoria cer">
<div class="cat-cont">
<img src="./Images/nuevas/certificados.svg">
<p class="tit-cat">Certificados</p>
</div>
<div class="subcat">
<ul>
<li><a href=""><p>Cafés y Bebidas</p></a></li>
<li><a href=""><p>Cine</p></a></li>
<li><a href=""><p>Experiencia</p></a></li>
<li><a href=""><p>iTunes</p></a></li>
<li><a href=""><p>Tiendas Departamentales</p></a></li>
<li><a href=""><p>Tiendas Diversas</p></a></li>                      
</ul>
</div>
</div>
<div class="categoria dep">
<div class="cat-cont">
<img src="./Images/nuevas/deportes.svg">
<p class="tit-cat">Deportes</p>
</div>
<div class="subcat">
<ul>
<li><a href=""><p>Aparatos y Artículos de Gimnasio</p></a></li>
<li><a href=""><p>Campismo</p></a></li>
<li><a href=""><p>Ciclismo</p></a></li>
<li><a href=""><p>Futbol</p></a></li>
</ul>
</div>
</div>
<div class="categoria hog">
<div class="cat-cont">
<img src="./Images/nuevas/hogar.svg">
<p class="tit-cat">Hogar</p>
</div>
<div class="subcat">
<ul>
<li><a href=""><p>Artículos Personales</p></a></li>
<li><a href=""><p>Asadores</p></a></li>
<li><a href=""><p>Aspiradoras y Lava Alfombra</p></a></li>
<li><a href=""><p>Baterías, Ollas y Sartenes</p></a></li>
<li><a href=""><p>Blancos</p></a></li>
<li><a href=""><p>Cocina</p></a></li>
<li><a href=""><p>Electrodomésticos</p></a></li>
<li><a href=""><p>Herramientas</p></a></li>
<li><a href=""><p>Herramientas y Jardín</p></a></li>
<li><a href=""><p>Hogar</p></a></li>
<li><a href=""><p>Muebles</p></a></li>
<li><a href=""><p>Ventiladores y Calefactores</p></a></li>
</ul>
</div>
</div>
<div class="categoria beb">
<div class="cat-cont">
<img src="./Images/nuevas/bebes.svg">
<p class="tit-cat">Niños y Bebés</p>
</div>
<div class="subcat">
<ul>
<li><a href=""><p>Cuidado del Bebé</p></a></li>


</ul>
</div>
</div>
<div class="categoria rec">
<div class="cat-cont">
<img src="./Images/nuevas/certificados.svg">
<p class="tit-cat">Recargas</p>
</div>
<div class="subcat">
<ul>
<li><a href=""><p>Cine</p></a></li>
<li><a href=""><p>Recarga Celular</p></a></li>
</ul>
</div>
</div>
<div class="categoria syb">
<div class="cat-cont">
<img src="./Images/nuevas/salud.svg">
<p class="tit-cat">Salud y Belleza</p>
</div>
<div class="subcat">
<ul>
<li><a href=""><p>Arreglo Personal</p></a></li>
<li><a href=""><p>Cuidado Personal</p></a></li>
<li><a href=""><p>Lociones</p></a></li>
<li><a href=""><p>Perfumes</p></a></li>
<li><a href=""><p>Salud</p></a></li>
</ul>
</div>
</div>
<div class="categoria tec">
<div class="cat-cont">
<img src="./Images/nuevas/tecnologia.svg">
<p class="tit-cat">Tecnología</p>
</div>
<div class="subcat">
<ul>
<li><a href=""><p>Accesorios para tecnología</p></a></li>
<li><a href=""><p>Artículos Personales</p></a></li>
<li><a href=""><p>Audio / Video</p></a></li>
<li><a href=""><p>Car Audio</p></a></li>
<li><a href=""><p>Cómputo</p></a></li>
<li><a href=""><p>Fotografía</p></a></li>
<li><a href=""><p>Relojes</p></a></li>
<li><a href=""><p>Telefonía</p></a></li>
<li><a href=""><p>Videojuegos</p></a></li>
</ul>
</div>
</div>
<div class="categoria via">
<div class="cat-cont">
<img src="./Images/nuevas/viaje.svg">
<p class="tit-cat">Viaje</p>
</div>
<div class="subcat">
<ul>
<li><a href=""><p>Equipaje</p></a></li>
</ul>
</div>
</div>
</div>




</div>
<ul class="listaguion grupos">
<li><a data-toggle="modal" data-target="#grupo" ><img src="./Images/nuevas/grupos.svg" alt="crear grupos">Crear Grupo</a></li>
<li><a href="grupo.php?idUsuario=<?php echo $idUsuario; ?>">Grupo 1</a></li>              
</ul>-->
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
          </div>

          <div class="col-sm-9 der clearfix">
            <div class="block-cuerpo">
              <p class="tit">Estado de cuenta</p>
              <div id="ContentPlaceHolder1_gvEdoCtaHistorial">
                <div class="table-responsive">
                  <table class="resume-orden">
                    <thead>
                      <tr>
                        <th class="can-orden">Enero</th>
                        <th class="can-orden">Febrero</th>
                        <th class="can-orden">Marzo</th>
                        <th class="can-orden">Abril</th>
                        <th class="can-orden">Mayo</th>
                        <th class="can-orden">Junio</th>
                        <th class="can-orden">Julio</th>
                        <th class="can-orden">Agosto</th>
                        <th class="can-orden">Septiembre</th>
                        <th class="can-orden">Octubre</th>
                        <th class="can-orden">Noviembre</th>
                        <th class="can-orden">Diciembre</th>
                        <th class="can-orden">Puntos Acumulados</th>

                      </tr>
                    </thead>
                    <tbody class="det">
                      <tr>

                        <td class="can-orden"> 0</td>
                        <td class="can-orden"> 0</td>
                        <td class="can-orden"> 0</td>
                        <td class="can-orden"> 0</td>
                        <td class="can-orden"> 0</td>
                        <td class="can-orden"> 0</td>
                        <td class="can-orden"> 0</td>
                        <td class="can-orden"> 0</td>
                        <td class="can-orden"> 0</td>
                        <td class="can-orden"> 0</td>
                        <td class="can-orden"> 0</td>
                        <td class="can-orden"> 0</td>
                        <td class="can-orden"> 0</td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="block-cuerpo">
              <div class="row">
                <div id="containerGrafica" style="min-width: 310px; height: 400px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="0"><div id="highcharts-syc0ykk-0" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 800px; height: 400px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="800" height="400" viewBox="0 0 800 400"><desc>Created with Highcharts 7.1.2</desc><defs><clipPath id="highcharts-syc0ykk-1-"><rect x="0" y="0" width="733" height="249" fill="none"></rect></clipPath></defs><rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="800" height="400" rx="0" ry="0"></rect><rect fill="none" class="highcharts-plot-background" x="57" y="41" width="733" height="249"></rect><g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1"><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 117.5 41 L 117.5 290" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 178.5 41 L 178.5 290" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 239.5 41 L 239.5 290" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 300.5 41 L 300.5 290" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 361.5 41 L 361.5 290" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 423.5 41 L 423.5 290" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 484.5 41 L 484.5 290" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 545.5 41 L 545.5 290" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 606.5 41 L 606.5 290" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 667.5 41 L 667.5 290" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 728.5 41 L 728.5 290" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 789.5 41 L 789.5 290" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 56.5 41 L 56.5 290" opacity="1"></path></g><g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1"><path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 57 166.5 L 790 166.5" opacity="1"></path></g><rect fill="none" class="highcharts-plot-border" data-z-index="1" x="57" y="41" width="733" height="249"></rect><g class="highcharts-axis highcharts-xaxis" data-z-index="2"><path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 57 290.5 L 790 290.5"></path></g><g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="25.828125" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 25.828125 165.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="165.5"><tspan>Puntos</tspan></text><path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 57 41 L 57 290"></path></g><g class="highcharts-series-group" data-z-index="3"><g data-z-index="0.1" class="highcharts-series highcharts-series-0 highcharts-line-series highcharts-color-0     " transform="translate(57,41) scale(1 1)" clip-path="url(#highcharts-syc0ykk-1-)"><path fill="none" d="M 30.541666666667 124.5 L 91.625 124.5 L 152.70833333333 124.5 L 213.79166666667 124.5 L 274.875 124.5 L 335.95833333333 124.5 L 397.04166666667 124.5 L 458.125 124.5 L 519.20833333333 124.5 L 580.29166666667 124.5 L 641.375 124.5 L 702.45833333333 124.5" class="highcharts-graph" data-z-index="1" stroke="#447ed9" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path><path fill="none" d="M 20.541666666667 124.5 L 30.541666666667 124.5 L 91.625 124.5 L 152.70833333333 124.5 L 213.79166666667 124.5 L 274.875 124.5 L 335.95833333333 124.5 L 397.04166666667 124.5 L 458.125 124.5 L 519.20833333333 124.5 L 580.29166666667 124.5 L 641.375 124.5 L 702.45833333333 124.5 L 712.45833333333 124.5" visibility="visible" data-z-index="2" class="highcharts-tracker-line" stroke-linejoin="round" stroke="rgba(192,192,192,0.0001)" stroke-width="22"></path></g><g data-z-index="0.1" class="highcharts-markers highcharts-series-0 highcharts-line-series highcharts-color-0  highcharts-tracker    " transform="translate(57,41) scale(1 1)"><path fill="#447ed9" visibility="hidden" d="M 335 124.5 A 0 0 0 1 1 335 124.5 Z" class="highcharts-halo highcharts-color-0" data-z-index="-1" fill-opacity="0.25"></path><path fill="#447ed9" d="M 30 129 A 4 4 0 1 1 30.003999999333335 128.99999800000018 Z" opacity="1" class="highcharts-point highcharts-color-0"></path><path fill="#447ed9" d="M 91 128.5 A 4 4 0 1 1 91.00399999933333 128.49999800000018 Z" opacity="1" class="highcharts-point highcharts-color-0  " stroke-width="0.0031943447399958025"></path><path fill="#447ed9" d="M 152 128.5 A 4 4 0 1 1 152.00399999933333 128.49999800000018 Z" opacity="1" class="highcharts-point highcharts-color-0  " stroke-width="0.000009869571931497845"></path><path fill="#447ed9" d="M 213 128.5 A 4 4 0 1 1 213.00399999933333 128.49999800000018 Z" opacity="1" class="highcharts-point highcharts-color-0  " stroke-width="0.0014205498696930885"></path><path fill="#447ed9" d="M 274 128.5 A 4 4 0 1 1 274.00399999933336 128.49999800000018 Z" opacity="1" class="highcharts-point highcharts-color-0    " stroke-width="0.002849604801500538"></path><path fill="#447ed9" d="M 335 128.5 A 4 4 0 1 1 335.00399999933336 128.49999800000018 Z" opacity="1" class="highcharts-point highcharts-color-0    " stroke-width="0.002219017698460002"></path><path fill="#447ed9" d="M 397 128.5 A 4 4 0 1 1 397.00399999933336 128.49999800000018 Z" opacity="1" class="highcharts-point highcharts-color-0   " stroke-width="0.0015349798912442925"></path><path fill="#447ed9" d="M 458 128.5 A 4 4 0 1 1 458.00399999933336 128.49999800000018 Z" opacity="1" class="highcharts-point highcharts-color-0 " stroke-width="0.000009869571931497845"></path><path fill="#447ed9" d="M 519 129 A 4 4 0 1 1 519.0039999993334 128.99999800000018 Z" opacity="1" class="highcharts-point highcharts-color-0"></path><path fill="#447ed9" d="M 580 129 A 4 4 0 1 1 580.0039999993334 128.99999800000018 Z" opacity="1" class="highcharts-point highcharts-color-0"></path><path fill="#447ed9" d="M 641 129 A 4 4 0 1 1 641.0039999993334 128.99999800000018 Z" opacity="1" class="highcharts-point highcharts-color-0"></path><path fill="#447ed9" d="M 702 129 A 4 4 0 1 1 702.0039999993334 128.99999800000018 Z" opacity="1" class="highcharts-point highcharts-color-0"></path></g></g><g class="highcharts-exporting-group" data-z-index="3"><g class="highcharts-button highcharts-contextbutton" stroke-linecap="round" transform="translate(766,10)"><title>Chart context menu</title><rect fill="#ffffff" class="highcharts-button-box" x="0.5" y="0.5" width="24" height="22" rx="2" ry="2" stroke="none" stroke-width="1"></rect><path fill="#666666" d="M 6 6.5 L 20 6.5 M 6 11.5 L 20 11.5 M 6 16.5 L 20 16.5" class="highcharts-button-symbol" data-z-index="1" stroke="#666666" stroke-width="3" style="display: none;"></path><text x="0" data-z-index="1" style="font-weight:normal;color:#333333;cursor:pointer;fill:#333333;" y="12"></text></g></g><text x="400" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="400" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"><tspan>Evolución de tu obtención de puntos</tspan></text><g data-z-index="6" class="highcharts-data-labels highcharts-series-0 highcharts-line-series highcharts-color-0     " transform="translate(57,41) scale(1 1)" opacity="1"><g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(22,100)"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;fill:#000000;" y="16"><tspan x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0</tspan><tspan x="5" y="16">0</tspan></text></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(84,100)"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;fill:#000000;" y="16"><tspan x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0</tspan><tspan x="5" y="16">0</tspan></text></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(145,100)"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;fill:#000000;" y="16"><tspan x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0</tspan><tspan x="5" y="16">0</tspan></text></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(206,100)"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;fill:#000000;" y="16"><tspan x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0</tspan><tspan x="5" y="16">0</tspan></text></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(267,100)"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;fill:#000000;" y="16"><tspan x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0</tspan><tspan x="5" y="16">0</tspan></text></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(328,100)"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;fill:#000000;" y="16"><tspan x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0</tspan><tspan x="5" y="16">0</tspan></text></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(389,100)"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;fill:#000000;" y="16"><tspan x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0</tspan><tspan x="5" y="16">0</tspan></text></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(450,100)"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;fill:#000000;" y="16"><tspan x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0</tspan><tspan x="5" y="16">0</tspan></text></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(511,100)"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;fill:#000000;" y="16"><tspan x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0</tspan><tspan x="5" y="16">0</tspan></text></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(572,100)"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;fill:#000000;" y="16"><tspan x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0</tspan><tspan x="5" y="16">0</tspan></text></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(633,100)"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;fill:#000000;" y="16"><tspan x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0</tspan><tspan x="5" y="16">0</tspan></text></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(694,100)"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;fill:#000000;" y="16"><tspan x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0</tspan><tspan x="5" y="16">0</tspan></text></g></g><g class="highcharts-legend" data-z-index="7" transform="translate(339,360)"><rect fill="none" class="highcharts-legend-box" rx="0" ry="0" x="0" y="0" width="121" height="25" visibility="visible"></rect><g data-z-index="1"><g><g class="highcharts-legend-item highcharts-line-series highcharts-color-0 highcharts-series-0" data-z-index="1" transform="translate(8,3)"><path fill="none" d="M 0 11 L 16 11" class="highcharts-graph" stroke="#447ed9" stroke-width="2"></path><path fill="#447ed9" d="M 8 15 A 4 4 0 1 1 8.003999999333336 14.999998000000167 Z" class="highcharts-point" opacity="1"></path><text x="21" style="color:#333333;cursor:pointer;font-size:12px;font-weight:bold;fill:#333333;" text-anchor="start" data-z-index="2" y="15"><tspan>Total de puntos</tspan></text></g></g></g></g><g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="90.134391531014" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0) rotate(-45 90.134391531014 306)" y="306" opacity="1">Enero</text><text x="151.21772486435404" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0) rotate(-45 151.21772486435404 306)" y="306" opacity="1">Febrero</text><text x="212.30105819768403" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0) rotate(-45 212.30105819768403 306)" y="306" opacity="1">Marzo</text><text x="273.384391531014" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0) rotate(-45 273.384391531014 306)" y="306" opacity="1">Abril</text><text x="334.46772486435395" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0) rotate(-45 334.46772486435395 306)" y="306" opacity="1">Mayo</text><text x="395.551058197684" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0) rotate(-45 395.551058197684 306)" y="306" opacity="1">Junio</text><text x="456.634391531014" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0) rotate(-45 456.634391531014 306)" y="306" opacity="1">Julio</text><text x="517.7177248643541" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0) rotate(-45 517.7177248643541 306)" y="306" opacity="1">Agosto</text><text x="578.801058197684" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0) rotate(-45 578.801058197684 306)" y="306" opacity="1">Septiembre</text><text x="639.884391531014" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0) rotate(-45 639.884391531014 306)" y="306" opacity="1">Octubre</text><text x="700.9677248643541" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0) rotate(-45 700.9677248643541 306)" y="306" opacity="1">Noviembre</text><text x="762.051058197684" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0) rotate(-45 762.051058197684 306)" y="306" opacity="1">Diciembre</text></g><g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="42" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="169" opacity="1">0</text></g><text x="790" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor: pointer; color: rgb(153, 153, 153); font-size: 9px; fill: rgb(153, 153, 153); display: none;" y="395">Highcharts.com</text><g class="highcharts-label highcharts-tooltip                  highcharts-color-0" style="pointer-events:none;white-space:nowrap;" data-z-index="8" transform="translate(332,-9999)" opacity="0" visibility="visible"><path fill="none" class="highcharts-label-box highcharts-tooltip-box highcharts-shadow" d="M 3.5 0.5 L 119.5 0.5 C 122.5 0.5 122.5 0.5 122.5 3.5 L 122.5 41.5 C 122.5 44.5 122.5 44.5 119.5 44.5 L 66.5 44.5 60.5 50.5 54.5 44.5 3.5 44.5 C 0.5 44.5 0.5 44.5 0.5 41.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#000000" stroke-opacity="0.049999999999999996" stroke-width="5" transform="translate(1, 1)"></path><path fill="none" class="highcharts-label-box highcharts-tooltip-box highcharts-shadow" d="M 3.5 0.5 L 119.5 0.5 C 122.5 0.5 122.5 0.5 122.5 3.5 L 122.5 41.5 C 122.5 44.5 122.5 44.5 119.5 44.5 L 66.5 44.5 60.5 50.5 54.5 44.5 3.5 44.5 C 0.5 44.5 0.5 44.5 0.5 41.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#000000" stroke-opacity="0.09999999999999999" stroke-width="3" transform="translate(1, 1)"></path><path fill="none" class="highcharts-label-box highcharts-tooltip-box highcharts-shadow" d="M 3.5 0.5 L 119.5 0.5 C 122.5 0.5 122.5 0.5 122.5 3.5 L 122.5 41.5 C 122.5 44.5 122.5 44.5 119.5 44.5 L 66.5 44.5 60.5 50.5 54.5 44.5 3.5 44.5 C 0.5 44.5 0.5 44.5 0.5 41.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#000000" stroke-opacity="0.15" stroke-width="1" transform="translate(1, 1)"></path><path fill="rgba(247,247,247,0.85)" class="highcharts-label-box highcharts-tooltip-box" d="M 3.5 0.5 L 119.5 0.5 C 122.5 0.5 122.5 0.5 122.5 3.5 L 122.5 41.5 C 122.5 44.5 122.5 44.5 119.5 44.5 L 66.5 44.5 60.5 50.5 54.5 44.5 3.5 44.5 C 0.5 44.5 0.5 44.5 0.5 41.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#447ed9" stroke-width="1"></path><text x="8" data-z-index="1" style="font-size:12px;color:#333333;cursor:default;fill:#333333;" y="20"><tspan style="font-size: 10px">Junio</tspan><tspan style="fill:#447ed9" x="8" dy="15">●</tspan><tspan dx="0"> Total de puntos: </tspan><tspan style="font-weight:bold" dx="0">0</tspan></text></g></svg></div></div>
              </div>
            </div>

            <div class="block-cuerpo">
              <p class="tit">Histórico de canjes</p>
              <div id="ContentPlaceHolder1_gvHistoricoCanjes"><table class="det"><thead class="det'"><tr><th class="nom-orden">Nombre del producto</th><th class="can-orden">Cantidad</th><th class="fol-orden">Folio</th><th class="num-orden">Orden #</th><th class="ref-orden">Referencia</th></tr></thead><tbody class="det"></tbody></table></div>
            </div>

          </div>
        </div>


      </div>


    </div>
    <div class="footer">
      <div class="f2">
        <div class="contenido">
          <div class="row clearfix">
            <p>Todos los derechos reservados. Guerrerobook  <span><a>Términos y Condiciones</a><span class="separador"></span><a href="./reglas.php">Reglas</a><span class="separador"></span><a href="./soporte.php">Contacto</a></span></p>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal subir foto-->
    <div class="modal fade" id="foto" role="dialog">
      <div class="modal-dialog">
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
    <!-- Modal creacion de grupo-->
    <div class="modal fade" id="grupo" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body c-grupo">
            <div class="clearfix">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <p>Crear Grupo</p>
            <label>Nombre de grupo</label>
            <input type="text">
            <label>Agregar integrantes</label>
            <textarea></textarea>
            <button class="outline c">Publicar</button>
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
      /*
      $("table.resume-orden > tbody > tr > td:not('td:first-child')").each(function(){
        x = Math.trunc(Math.random() * 100);
        $(this).text(x);
      });

      $("table.resume-orden > tbody > tr > td:not('td:first-child')").each(function(){
        if($(this).html() > 80){$(this).addClass("t-green");}
        else if ($(this).html() > 60){}
        else if ($(this).html() > 30){$(this).addClass("t-yellow");}
        else {$(this).addClass("t-red");}
      });*/
    </script>
    <script src="js/puntos.js"></script>

  </body>
</html>