<?php
include 'config.php';

$nombre = $_POST['valor1'];
$descripcion = $_POST['valor2'];
$estado = $_POST['valor3'];



if (!$connection) {
    die("Error de conexion".mysqli_connect_error());
}

$sql = "INSERT INTO `".$table."` (
    `id_note`,
    `nombre`,
    `descripcion`,
    `estado`
    )
    VALUES (
        NULL, 
        '$nombre', 
        '$descripcion', 
        '$estado'
        )"
;


if (mysqli_query($connection, $sql)) {
    echo "Successefull";
}
else {
    echo "Error".$sql."<br>";
    mysqli_error($connection);
}

mysqli_close($connection);


?>