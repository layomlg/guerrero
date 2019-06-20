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
      <div class="elemento clearfix" style="text-align:left;">
        <br>
        <!--<p class="sec-titulo"><img src="Images/svg/cartf.png"> Confirmación de pedido</p>-->
        <div class="col-sm-12 cntnt clearfix">
          <img src="Images/gracias.png" style="width:100%;">
        </div>

        <div class="col-xs-12 dir-1line">
          <p class="block-titulo">Se entregará en:</p>
          <div class="block-cuerpo clearfix">
            <div class="direccion2">
              <p class="nombre">Casa 1</p>
              <p class="calle">Uxmal 336 - 2</p>
              <p class="colonia">Narvarte oriente</p>
              <p class="delegacion">BenitoJuaréz</p>
              <p class="telefono">Tel: 0344 332 5931</p>
            </div>
          </div>
        </div>

        <!--<div class="col-sm-8 cntnt clearfix">
<p style="font-size:12px;">¡Gracias por realizar tu canje, te esperamos pronto!</p>
<p style="font-size:12px;">No. de orden <span style="font-weight: bold;" >123456</span></p>
<p style="font-size:12px;">En breve recibirás un correo electrónico con la confirmación de tu orden.</p>
</div>-->
        <!--        <div class="col-sm-4 cntnt clearfix">
<p style="font-size:12px;">Orden # 123 456</p>
<p style="font-size:12px;">Fecha 22-01-06</p>
</div>
<div class="col-sm-4 cntnt clearfix">
<p style="font-size:12px;">Guia 123 444 5567</p>
<p style="font-size:12px;">Estatus: <span>EN PROCESO</span></p>
</div>-->
      </div>
      <div class="elemento clearfix">
        <div class="row">
          <div class="cnt clearfix">
            <p class="block-titulo">Resumen del pedido orden</p>
            <div class="block-cuerpo clearfix">
              <table class="det">
                <thead class="det">
                  <tr>
                    <th class="nom-orden">Nombre del producto</th>
                    <th class="can-orden">Cantidad</th>
                    <th class="fol-orden">ID Canje</th>
                    <th class="num-orden">Guia #</th>
                    <th class="ref-orden">Fecha de Canje</th>
                    <th class="ref-orden">Estatus</th>
                  </tr>
                </thead>
                <tbody class="det">
                  <tr>
                    <td class="nom-orden">
                      <div class="producto">
                        <img src="Images/art/MLG18519.png">
                        <p class="nom">Soundlink Revolve BT - Black. Bose&reg;</p>
                        <p>980-001073</p>
                        <p>negro</p>
                        <br>
                        <p>código: MLG18519</p>
                        <p>7,500 pts.</p>
                      </div>
                    </td>
                    <td class="can-orden">1</td>
                    <td class="fol-orden">1541453</td>
                    <td class="num-orden">24198326</td>
                    <td class="ref-orden">22-01-16</td>
                    <td class="ref-orden">EN PROCESO</td>
                  </tr>
                  <tr>
                    <td class="nom-orden">
                      <div class="producto">
                        <img src="Images/art/MLG18519.png">
                        <p class="nom">Soundlink Revolve BT - Black. Bose&reg;</p>
                        <p>980-001073</p>
                        <p>negro</p>
                        <br>
                        <p>código: MLG18519</p>
                        <p>7,500 pts.</p>
                      </div>
                    </td>
                    <td class="can-orden">1</td>
                    <td class="fol-orden">1541453</td>
                    <td class="num-orden">24198326</td>
                    <td class="ref-orden">22-01-16</td>
                    <td class="ref-orden">EN PROCESO</td>
                  </tr>
                  <tr>
                    <td class="nom-orden">
                      <div class="producto">
                        <img src="Images/art/MLG18519.png">
                        <p class="nom">Soundlink Revolve BT - Black. Bose&reg;</p>
                        <p>980-001073</p>
                        <p>negro</p>
                        <br>
                        <p>código: MLG18519</p>
                        <p>7,500 pts.</p>
                      </div>
                    </td>
                    <td class="can-orden">1</td>
                    <td class="fol-orden">1541453</td>
                    <td class="num-orden">24198326</td>
                    <td class="ref-orden">22-01-16</td>
                    <td class="ref-orden">EN PROCESO</td>
                  </tr>
                </tbody>
              </table>
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