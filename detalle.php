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
          <p class="sec-titulo"><img src="Images/svg/bagb.svg"> Catálogo </p>
        </div>
      </div>
      <div class="elemento">
        <div class="row">
          <div class="col-sm-3 izq clearfix">
            <p class="block-titulo">Estado de cuenta</p>
            <div class="block-cuerpo">
              <p>Metas</p>
              <p>&nbsp;-Sell Out<span>150</span></p>
              <p>&nbsp;-Cobertura <span>250</span></p>
              <p>&nbsp;-Ejecución <span>350</span></p>
              <p>&nbsp;-OTS <span>450</span></p>
              <br>
              <p>Logros</p>
              <p>&nbsp;-Sell Out<span>150</span></p>
              <p>&nbsp;-Cobertura <span>250</span></p>
              <p>&nbsp;-Ejecución <span>350</span></p>
              <p>&nbsp;-OTS <span>450</span></p>
              <p>Total <span>2400</span></p>
              <hr class="block-separador">
              <p class="tit1">Puntos Disponibles</p>
              <p class="pts">1050 pts.</p>
              <button class="outline c" onclick="location.href='cuenta.php?idUsuario=<?php echo $idUsuario; ?>';">Ver más</button>
            </div>
            <p class="block-titulo">Categorías</p>
            <div class="block-cuerpo">
              <form>
                <div class="radio">
                  <label><input type="radio" name="cat">Temporalidad</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="cat">Tendencias</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="cat">Personal</label>
                </div>
              </form>
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
                <label>Puntos</label>
                <select>
                  <option value="f4">Marca 1</option>
                  <option value="f5">Marca 2</option>
                  <option value="f6">Marca 3</option>
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
                            <img  class="canjear" title="Agregar a Wishlist"src="./Images/svg/hearto.svg" onclick="addfav(<?php echo $id;?>,<?php echo $idUsuario;?>)">
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
                  <div class="col-xs-6 col-sm-4">

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

                  </div>

                  <?php
                  }
                  ?>

                  <button class="outline c" onclick="location.href='categoria.php?idUsuario=<?php echo $idUsuario; ?>';">Ver más</button>
                  <a id="subcat1"></a>
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