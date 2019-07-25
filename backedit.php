<?php
include 'config.php';

if (!$connection) {
    die("Error de conexion".mysqli_connect_error());
}

$id_note = intval($_POST['id']);

$nombre = $_POST['valor1'];
$descripcion = $_POST['valor2'];
$estado = $_POST['valor3'];



$sql= "UPDATE `$table` SET `nombre` = '$nombre', `descripcion` = '$descripcion', `estado` = '$estado' WHERE `$table`.`id_note` = $id_note ";


if (mysqli_query($connection, $sql)) {
    echo $sql;
}
else {
    echo "Error".$sql."<br>";
    mysqli_error($connection);
}

mysqli_close($connection);


?>