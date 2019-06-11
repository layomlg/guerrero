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
          <!--<div class="col-sm-3 izq clearfix">
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
<p class="block-titulo">Explorar</p>
<div class="block-cuerpo">
<a href="destacadas.php?idUsuario=<?php echo $idUsuario; ?>">Publicaciones destacadas</a>
</div>

</div>-->
          <div class="col-sm-12 der clearfix">
            <div class="block-cuerpo">
              <p class="tit">Estado de cuenta</p>
              <table class="resume-orden">
                <thead>
                  <tr>
                    <th class="">Mes</th>
                    <th class="">Enero</th>
                    <th class="">Febrero</th>
                    <th class="">Marzo</th>
                    <th class="">Abril</th>
                    <th class="">Mayo</th>
                    <th class="">Junio</th>
                    <th class="">Julio</th>
                    <th class="">Agosto</th>
                    <th class="">Septiempre</th>
                    <th class="">Octubre</th>
                    <th class="">Noviembre</th>
                    <th class="">Diciembre</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="">Metas-Sell Out</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                  </tr>
                  <tr>
                    <td class="">Metas-Cobertura</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                  </tr>
                  <tr>
                    <td class="">Metas-Ejecución</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                  </tr>
                  <tr>
                    <td class="">Metas-OTS</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                  </tr>
                  <tr>
                    <td class="">Logros-Sell Out</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                  </tr>

                  <tr>
                    <td class="">Logros-Cobertura</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                  </tr>

                  <tr>
                    <td class="">Logros-Ejecución</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                  </tr>

                  <tr>
                    <td class="">Logros-OTS</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                  </tr>

                  <tr>
                    <td class="">TOTAL</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="block-cuerpo">
              <p class="tit">Historico de canjes</p>
              <div class="row">
                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
              </div>
            </div>
            <div class="block-cuerpo">
              <p class="tit">Historico de canjes</p>
              <table class="det">
                <thead class="det">
                  <tr>
                    <th class="nom-orden">Nombre del producto</th>
                    <th class="can-orden">Cantidad</th>
                    <th class="fol-orden">Folio</th>
                    <th class="num-orden">Orden #</th>
                    <th class="ref-orden">Referencia</th>
                  </tr>
                </thead>
                <tbody class="det">
                  <tr>
                    <td class="nom-orden">
                      <div class="producto">
                        <img src="Images/art/MLG18519.png" onclick="location.href='detalle-historico.php?idUsuario=<?php echo $idUsuario; ?>';">
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
                  </tr>
                  <tr>
                    <td class="nom-orden">
                      <div class="producto">
                        <img src="Images/art/MLG18519.png" onclick="location.href='detalle-historico.php?idUsuario=<?php echo $idUsuario; ?>';">
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
                  </tr>
                  <tr>
                    <td class="nom-orden">
                      <div class="producto">
                        <img src="Images/art/MLG18519.png" onclick="location.href='detalle-historico.php?idUsuario=<?php echo $idUsuario; ?>';">
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
            <p>Todos los derechos reservados. Garra Jaguar 2018 <span><a>Politicas de Privacidad</a><span class="separador"></span><a>Reglas</a><span class="separador"></span><a href="./soporte.php">Soporte</a></span></p>
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


      $("table.resume-orden > tbody > tr > td:not('td:first-child')").each(function(){
        x = Math.trunc(Math.random() * 100);
        $(this).text(x);
      });

      $("table.resume-orden > tbody > tr > td:not('td:first-child')").each(function(){
        if($(this).html() > 80){$(this).addClass("t-green");}
        else if ($(this).html() > 60){}
        else if ($(this).html() > 30){$(this).addClass("t-yellow");}
        else {$(this).addClass("t-red");}
      });
    </script>
    <script src="js/puntos.js"></script>

  </body>
</html>