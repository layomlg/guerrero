<?php
$servername = "layator.com";
$username = "layatorc_sql";
$password = "e=[~en@@ZZAm";
$dbname = "layatorc_test2";


#echo "<pre>".print_r($_POST)."</pre>";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

#sql = "INSERT INTO `Log` (`id`, `sku`, `puntosProd`, `puntosAct`, `visita`) VALUES (NULL, ".$_POST['idProd']." , ".$_POST['idUsr']." , '56789' , '2017-09-20 08:19:21')";

$sql = "INSERT INTO `detallefavoritos` (`idDetalleFavorito`, `cantidad`, `Productos_idProductos`, `Factura_idFactura`) VALUES (NULL, '1', ".$_POST['idProd'].", ".$_POST['idUsr'].");";

if(mysqli_query($conn, $sql)){
    echo "New record created successfully";
} else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

/*if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/

echo json_encode($data);
mysqli_close($conn);
die();
header("Refresh:0");
?>