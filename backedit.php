<?php
include 'config.php';

if (!$connection) {
    die("Error de conexion".mysqli_connect_error());
}

$id_note = $_POST['id'];
$nombre = $_POST['valor1'];
$descripcion = $_POST['valor2'];
$estado = $_POST['valor3'];



$sql= "UPDATE `".$table."` SET `nombre` = '".$nombre."', `descripcion` = '".$descripcion."', `estado` = '".$estado."' WHERE `Notas`.`id_note` = ".$id_note." ";


if (mysqli_query($connection, $sql)) {
    echo "Successefull";
}
else {
    echo "Error".$sql."<br>";
    mysqli_error($connection);
}

mysqli_close($connection);


?>