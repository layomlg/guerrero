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


$sql1 = "DELETE FROM `detallefavoritos` WHERE `detallefavoritos`.`Factura_idFactura` = ".$_POST['idUsr']." AND `detallefavoritos`.`Productos_idProductos` = ".$_POST['idProd'].";";
$sql2 = "INSERT INTO `detallefactura` (`idDetalleFactura`, `cantidad`, `Productos_idProductos`, `Factura_idFactura`) VALUES (NULL, '1', ".$_POST['idProd'].", ".$_POST['idUsr'].");";


if(mysqli_query($conn, $sql1)){
    echo "New record created successfully";
} else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if(mysqli_query($conn, $sql2)){
    echo "New record created successfully";
} else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo json_encode($data);
mysqli_close($conn);
die();
header("Refresh:0");
?>