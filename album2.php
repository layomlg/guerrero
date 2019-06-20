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
          <div class="portada">
            <!--  <img src="./Images/portada.png">-->
            <img class="foto-perfil" src="./Images/foto-perfil.png">


          </div>
          <div class="informacion-perfil">
            <p>Miguel González</p>
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

              <p class="tit1">Puntos Disponibles</p>
              <p class="pts disp"><span>1050</span> pts.</p>
              <hr class="block-separador cje">
              <p class="tit1 cje">Puntos por canjear en Mi Carrito</p>
              <p class="pts cje"><span>1050</span> pts.</p>
              <button class="outline c cje" onclick="location.href='carrito.php?idUsuario=<?php echo $idUsuario; ?>';">Canjear</button>
            </div>

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

            <p class="block-titulo">Álbums</p>
            <div class="block-cuerpo top">
              <img src="./Images/album1.png" onclick="location.href='./album.php?idUsuario=<?php echo $idUsuario; ?>';">
              <div class="bton">
                <button type="button" class="outline c mb-10"><i class="fa fa-download"></i>Ver Álbum</button>
              </div>
            </div>





          </div>
          <div class="col-sm-9 clearfix">
            <p class="block-titulo">Publicaciones Destacadas</p>
            <div class="block-cuerpo albm">
              <div class="destacadas">
                <img src="Images/album1.png" data-toggle="modal" data-target="#publicacion">
                <img src="Images/album2.png" data-toggle="modal" data-target="#publicacion">
                <img src="Images/album3.png" data-toggle="modal" data-target="#publicacion">
                <img src="Images/album4.png" data-toggle="modal" data-target="#publicacion">
                <img src="Images/album1.png" data-toggle="modal" data-target="#publicacion">
                <img src="Images/album2.png" data-toggle="modal" data-target="#publicacion">
                <img src="Images/album3.png" data-toggle="modal" data-target="#publicacion">
                <img src="Images/album4.png" data-toggle="modal" data-target="#publicacion">
                <img src="Images/album4.png" data-toggle="modal" data-target="#publicacion">
              </div>

              <button class="outline">Ver más</button>
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




    <!-- Modal -->
    <div class="modal fade" id="publicacion" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-body">
            <div class="clearfix">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>


            <div class="block-cuerpo">
              <div class="cabecera">
                <img class="logo" src="./Images/logoc.png">
                <p class="titulo">Aliado Guerrero</p>
                <p class="info">22/12/2017 10:30am</p>
                <br>
                <p class="contenido">Plan de acción Danone-DANETTE</p>
                <span class="destacado"></span>
                <span class="editar"></span>
                <span class="eliminar"></span>
              </div>

              <img src="Images/publicacion.png">
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



              <div class="comentar comentario editar clearfix">
                <img class="logo" src="./Images/user1.jpeg">
                <textarea maxlength="200" rows="2" data-info="textarea-words-info" style="resize:none">JUAREZ TORRES FRANCISCO PEDRO, SIGUAMOS CON TODO GRUPO COAPA ANIMO</textarea>
                <span class="eliminar"></span>
                <span class="editar"></span>                
                <div class="botones">
                  <button class="outline f">Comentar</button>
                </div>
                <br>
              </div><div class="comentar comentario editar clearfix">
              <img class="logo" src="./Images/user1.jpeg">
              <textarea maxlength="200" rows="2" data-info="textarea-words-info" style="resize:none">JUAREZ TORRES FRANCISCO PEDRO, SIGUAMOS CON TODO GRUPO COAPA ANIMO</textarea>
              <span class="eliminar"></span>
              <span class="editar"></span>                
              <div class="botones">
                <button class="outline f">Comentar</button>
              </div>
              <br>
              </div><div class="comentar comentario editar clearfix">
              <img class="logo" src="./Images/user1.jpeg">
              <textarea maxlength="200" rows="2" data-info="textarea-words-info" style="resize:none">JUAREZ TORRES FRANCISCO PEDRO, SIGUAMOS CON TODO GRUPO COAPA ANIMO</textarea>
              <span class="eliminar"></span>
              <span class="editar"></span>                
              <div class="botones">
                <button class="outline f">Comentar</button>
              </div>
              <br>
              </div><div class="comentar comentario editar clearfix">
              <img class="logo" src="./Images/user1.jpeg">
              <textarea maxlength="200" rows="2" data-info="textarea-words-info" style="resize:none">JUAREZ TORRES FRANCISCO PEDRO, SIGUAMOS CON TODO GRUPO COAPA ANIMO</textarea>
              <span class="eliminar"></span>
              <span class="editar"></span>                
              <div class="botones">
                <button class="outline f">Comentar</button>
              </div>
              <br>
              </div><div class="comentar comentario editar clearfix">
              <img class="logo" src="./Images/user1.jpeg">
              <textarea maxlength="200" rows="2" data-info="textarea-words-info" style="resize:none">JUAREZ TORRES FRANCISCO PEDRO, SIGUAMOS CON TODO GRUPO COAPA ANIMO</textarea>
              <span class="eliminar"></span>
              <span class="editar"></span>                
              <div class="botones">
                <button class="outline f">Comentar</button>
              </div>
              <br>
              </div><div class="comentar comentario editar clearfix">
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
      var w1 = $(".a-titulo").width();
      w1= w1 + 15;
      w1 = w1 + "px";
      var ww = 'calc( 100% - ' + w1 +')';
      $(".a-hr").css("width",ww);
    </script>

  </body>
</html>
