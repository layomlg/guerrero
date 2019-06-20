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

    $ID = $_GET["ID"];
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
          <div class="col-sm-3 izq clearfix">
            <p class="block-titulo">Estado de cuenta</p>
            <div class="block-cuerpo">
              <p class="tit1">Puntos Disponibles</p>
              <p class="pts disp"><span>1050</span> pts.</p>
              <hr class="block-separador cje">
              <p class="tit1 cje">Puntos por canjear en Mi Carrito</p>
              <p class="pts cje"><span>1050</span> pts.</p>
              <button class="outline c cje" onclick="location.href='carrito.php?idUsuario=<?php echo $idUsuario; ?>';">Canjear</button>
            </div>

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
                      <li><a href=""><p>sub 2</p></a></li>
                      <li><a href=""><p>sub 3</p></a></li>
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
            <p class="block-titulo">Filtros</p>
            <div class="block-cuerpo">
              <form>
                <label>Puntos</label>
                <select>
                  <option value="f1">1,000 pts - 3,000 pts.</option>
                  <option value="f2">3,000 pts - 9,000 pts.</option>
                  <option value="f3">9,000 pts - ??? pts.</option>
                </select>
                <label>Marca</label>
                <select>
                  <option >Adata</option>
                  <option >Beats</option>
                  <option >Bose</option>
                  <option >Calvin Klein</option>
                  <option >Carolina Herrera</option>
                  <option >Cinépolis</option>
                  <option >Citizen</option>
                  <option >Conair</option>
                </select>
              </form>
            </div>
          </div>
          <div class=" col-sm-9 clearfix">
            <div class="elemento clearfix">
              <div class="listado-prod row">
                <div class="col-xs-12">
                  <?php  
                  $resultado2 = $mysqli->query("SELECT * FROM productos WHERE idProductos = '".$ID."' ");
                  $fila2 = $resultado2->fetch_array();

                  $id = $fila2['idProductos'];
                  $img = $fila2['idIncentivo'];
                  $nom = utf8_encode($fila2['nombreProducto']);
                  $desc = utf8_encode($fila2['descripcionProducto']);
                  $pnts = number_format($fila2['puntos']);
                  $pntscomb = $fila2['combinado'];
                  $cat = $fila2['Categoria_idCategoria'];

                  $txtimg1="./Images/art/";
                  $txtimg2=".png";
                  $txtimg= $txtimg1 . $img . $txtimg2;
                  ?>
                  <div class="banner clearfix">
                    <div class="col-xs-12 col-sm-6">
                      <div class="art clearfix"><a><div class="img"><img src="<?= $txtimg;?>"></div></a></div>
                      <center>
                        <span class="f20"><?= $pnts;?> pts.</span>
                      </center>
                    </div>
                    <div class="bnrdesc col-xs-12 col-sm-6">
                      <div class="pago-banner">
                        <div>
                          <p class="f20"><?= $nom;?></p>
                          <p class="f12"><?= $desc;?></p>
                        </div>
                        <center>
                          <span >
                            <button class="outline c canje" onclick="agregar(<?php echo $id;?>,<?php echo $idUsuario;?>)">Canjear</button>
                          </span>
                        </center>

                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="elemento clearfix">
                <p class="sec-titulo">Productos relacionados</p>
                <div class="listado-prod row">

                  <?php
                  $resultado = $mysqli->query("SELECT * FROM productos where puntos > '".$pnts."' AND Categoria_idCategoria = '".$cat."' ORDER BY puntos LIMIT 12;");
                  while( $fila = $resultado->fetch_array()){

                    $id = $fila['idProductos'];
                    $img = $fila['idIncentivo'];
                    $nom = utf8_encode($fila['nombreProducto']);
                    $desc = utf8_encode($fila['descripcionProducto']);
                    $pts = number_format($fila['puntos']);

                    $txtimg1="./Images/art/";
                    $txtimg2=".png";
                    $txtimg= $txtimg1 . $img . $txtimg2;
                    /*$idcat = $fila['idCategoria'];*/
                  ?>
                  <!--                  <div class="col-xs-6 col-sm-4">

<div class="art clearfix">
<div class="img"><img src="<?= $txtimg;?>"></div>
<div class="art-desc">
<a href="detalle.php?idUsuario=<?php echo $idUsuario; ?>&ID=<?php echo $id;?>">
<p title="<?= $nom;?>"><?= $nom;?></p>
</a>
<p class="pts"><?= $pts;?> pts. 
<span class="canjear">
<span class="favorito" title="Agregar a Wishlist" onclick="addfav(<?php echo $id;?>,<?php echo $idUsuario;?>)"></span>
<span class="canje" title="Agregar a Carrito" onclick="agregar(<?php echo $id;?>,<?php echo $idUsuario;?>)"></span>
</span>
</p>
</div>
</div>

</div>-->

                  <div class="col-xs-6 col-sm-4">
                    <div class="art clearfix">
                      <div class="img"><img src="<?= $txtimg;?>"></div>
                      <div class="art-desc">
                        <a href="detalle.php?idUsuario=<?php echo $idUsuario; ?>&ID=<?php echo $id;?>">
                          <p title="<?= $nom;?>"><?= $nom;?></p>
                        </a>
                        <p class="pts"><?= $pts;?> pts.</p>
                        <!--<button class="outline c canje fav" onclick="addfav(<?php echo $id;?>,<?php echo $idUsuario;?>)"><img title="Agregar a Wishlist"src="./Images/svg/heartf.svg"><span>&nbsp;&nbsp;&nbsp;Agregar a favoritos</span></button>-->
                        <button class="outline c canje" onclick="agregar(<?php echo $id;?>,<?php echo $idUsuario;?>)">
                          <img class="img-a" title="Agregar a Carrito"src="./Images/svg/cart.svg">
                          <img class="img-b" title="Agregar a Carrito"src="./Images/svg/cart-b.svg">
                          <span>&nbsp;&nbsp;&nbsp;Agregar a carrito</span>
                        </button>
                      </div>
                    </div>
                  </div>

                  <?php
                  }
                  ?>
                  <div class="col-xs-12">
                    <button class="outline c" onclick="location.href='categoria.php?idUsuario=<?php echo $idUsuario; ?>';">Ver más</button>
                    <a id="subcat1"></a>
                  </div>
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
            <p>Todos los derechos reservados. Guerrerobook  <span><a>Términos y Condiciones</a><span class="separador"></span><a>Reglas</a><span class="separador"></span><a href="./soporte.php">Contacto</a></span></p>
          </div>
        </div>
      </div>
    </div>
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
