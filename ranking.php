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
              <span class="name"> Home</span>
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
                <span class="name"> Mi carrito</span>
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

      <!-- Menú Tabs-->
      <p class="sec-titulo">
        Ranking
      </p>
      <div class="sec-titulo">
        <strong>
          <span id="ContentPlaceHolder1_lblNacionalMes"></span>
        </strong>
        <br>
      </div>






      <div class="tab-pane fade in active" id="top-nacional">
        <br>
        <div class="table-responsive">
          <table class="table table-bordered table-vertical-middle">
            <thead>
              <tr>
                <th>Región
                  <br>
                  <select name="ctl00$ContentPlaceHolder1$ddlRegion" id="ddlRegion" class="combo-admin">
                    <option selected="selected" value="0">--- SELECCIONA ---</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>

                  </select>
                </th>
                <th>Puesto 
                  <br>
                  <select name="ctl00$ContentPlaceHolder1$ddlPuesto" id="ddlPuesto" class="combo-admin">
                    <option value="0">--- SELECCIONA ---</option>
                    <option selected="selected" value="1">GERENTE</option>
                    <option value="2">LIDER DE VENTAS</option>
                    <option value="3">PREVENTA</option>

                  </select>
                  <span id="ContentPlaceHolder1_rfPuesto" style="display:none;">Seleccione un puesto</span>
                </th>
                <th>Año
                  <br>
                  <select name="ctl00$ContentPlaceHolder1$ddlAnio" id="ddlAnio" class="combo-año">
                    <option selected="selected" value="2018">2018</option>

                  </select>
                </th>
                <th>Mes
                  <br>
                  <select name="ctl00$ContentPlaceHolder1$ddlMes" id="ddlMes" class="combo-admin">
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="13">Primer Trimestre</option>
                    <option selected="selected" value="14">Segundo Trimestre</option>

                  </select>
                </th>
                <th style="text-align: center; vertical-align: top">Participante
                  <input name="ctl00$ContentPlaceHolder1$txtnombre" type="text" id="txtnombre" class="combo-admin">
                </th>
                <th style="text-align: center; vertical-align: top">
                  <br>
                  <input type="submit" name="ctl00$ContentPlaceHolder1$btnBuscar" value="Busqueda" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ContentPlaceHolder1$btnBuscar&quot;, &quot;&quot;, true, &quot;busqueda&quot;, &quot;&quot;, false, false))" id="ContentPlaceHolder1_btnBuscar" class="btn btn-info">
                </th>
              </tr>
            </thead>
          </table>
        </div>
      </div>

      <!-- TOP 10-Nacional -->
      <div id="ContentPlaceHolder1_udpRanNacional">


        <div class="tab-pane fade in active" id="hola">
          <br>
          <div class="table-responsive">
            <div id="ContentPlaceHolder1_pnlDTT">

              <div>
                <table class="table table-bordered" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                  <tbody>
                    <tr>
                      <th scope="col" style="width:40px;">No.</th>
                      <th scope="col" style="width:100px;">Participante</th>
                      <th scope="col">Puesto</th>
                      <th scope="col" style="width:80px;">Región</th>
                      <th scope="col">Puntos Mes</th>
                      <th scope="col">Total KPI's</th>
                      <th scope="col">Estatus</th>
                      <th scope="col">Equipo</th>
                    </tr>
                    <tr>
                      <td style="width:40px;">1</td>
                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                      <td>GERENTE</td>
                      <td style="width:80px;">3</td>
                      <td>1800</td>
                      <td>2063.0</td>
                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                      <td><button class="ver">Ver equipo</button></td>
                    </tr>
                    <tr class="node">
                      <td colspan="8">
                        <table class="table table-bordered nested-1" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                          <tbody>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td style="width:40px;">1</td>
                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                      <td>GERENTE</td>
                      <td style="width:80px;">3</td>
                      <td>1800</td>
                      <td>2063.0</td>
                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                      <td><button class="ver">Ver equipo</button></td>
                    </tr>
                    <tr class="node">
                      <td colspan="8">
                        <table class="table table-bordered nested-1" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                          <tbody>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td style="width:40px;">1</td>
                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                      <td>GERENTE</td>
                      <td style="width:80px;">3</td>
                      <td>1800</td>
                      <td>2063.0</td>
                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                      <td><button class="ver">Ver equipo</button></td>
                    </tr>
                    <tr class="node">
                      <td colspan="8">
                        <table class="table table-bordered nested-1" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                          <tbody>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td style="width:40px;">1</td>
                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                      <td>GERENTE</td>
                      <td style="width:80px;">3</td>
                      <td>1800</td>
                      <td>2063.0</td>
                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                      <td><button class="ver">Ver equipo</button></td>
                    </tr>
                    <tr class="node">
                      <td colspan="8">
                        <table class="table table-bordered nested-1" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                          <tbody>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td style="width:40px;">1</td>
                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                      <td>GERENTE</td>
                      <td style="width:80px;">3</td>
                      <td>1800</td>
                      <td>2063.0</td>
                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                      <td><button class="ver">Ver equipo</button></td>
                    </tr>
                    <tr class="node">
                      <td colspan="8">
                        <table class="table table-bordered nested-1" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                          <tbody>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:40px;">1</td>
                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                              <td>GERENTE</td>
                              <td style="width:80px;">3</td>
                              <td>1800</td>
                              <td>2063.0</td>
                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                              <td><button class="ver">Ver equipo</button></td>
                            </tr>
                            <tr class="node">
                              <td colspan="8">
                                <table class="table table-bordered nested-2" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                  <tbody>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:40px;">1</td>
                                      <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                      <td>GERENTE</td>
                                      <td style="width:80px;">3</td>
                                      <td>1800</td>
                                      <td>2063.0</td>
                                      <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                      <td><button class="ver">Ver equipo</button></td>
                                    </tr>
                                    <tr class="node">
                                      <td colspan="8">
                                        <table class="table table-bordered nested-3" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridView1" style="border-collapse:collapse;">
                                          <tbody>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                            <tr>
                                              <td style="width:40px;">1</td>
                                              <td style="width:100px;">MORALES PEÑA ISMAEL</td>
                                              <td>GERENTE</td>
                                              <td style="width:80px;">3</td>
                                              <td>1800</td>
                                              <td>2063.0</td>
                                              <td><button class="consultar" data-toggle="modal" data-target="#consulta">Consultar</button></td>
                                              <td>N/A</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody></table>
              </div>

            </div>

          </div>
        </div>

      </div>
      <!-- /TOP 10-Nacional -->

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




    <!-- Modal subir foto-->
    <div class="modal fade" id="consulta" role="dialog">
      <div class="modal-dialog">

        <!-- Modal subir fotografía-->
        <div class="modal-content">
          <div class="modal-body">
            <div class="clearfix">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="elemento">
              <div class="row">
                <div class="sub-header clearfix">
                  <!--<img src="./Images/logo-ind.png">-->
                  <div class="datos">
                    <div class="nombre">
                      <p class="sec-titulo"><span class="gris">Bienvenid@</span> <b><?php echo $nombre; ?></b></p>
                    </div>
                    <div class="saldo">
                      <p class="sec-titulo">Tus puntos</p>
                      <p class="sec-pts"><?php echo $puntosClienteF; ?></p>
                    </div>
                  </div>
                  <div class="rank">
                    <p class="rank-reg"><span>Top Regional 25</span>/<span>50</span></p>
                    <p class="rank-nac"><span>Top Nacional 400</span>/<span>1400</span></p>
                    <p class="rank-cedis"><span>Top CEDIS 12</span>/<span>25</span></p>
                  </div>
                </div>
                <hr>
              </div>
            </div>
            <div class="block-cuerpo">
              <p class="tit">Estado de cuenta</p>
              <table class="resume-orden">
                <thead>
                  <tr>
                    <th class="">Puntos Canjeables Acumulados</th>
                    <th class="">Puntos Canjeados</th>
                    <th class="">Puntos Vencidos</th>
                    <th class="">Puntos Canjeables Disponibles</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>
                    <td class="">0</td>

                  </tr>
                </tbody>
              </table>
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
      $(".ver").click(function(e){
        $(this).toggleClass("down");
        $(this).parent().parent().next("tr").toggle();
        if($(this).hasClass("down")){
          $(this).text("Ocultar")
        }
        else{
          $(this).text("Ver equipo");
        }


      });
    </script>

  </body>
</html>
