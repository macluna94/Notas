<?php


$servername = "localhost";
$database = "notas";
$username = "root";
$pass = "";

$connection = mysqli_connect(
    $servername,
    $username,
    $pass,
    $database
);



if (!$connection) {
    die("Error de conexion".mysqli_connect_error());
}

$sql = "SELECT * FROM `tareas`";

$consul = mysqli_query($connection, $sql) or die ( "Algo ha ido mal en la consulta a la base de datos");

while ($row = mysqli_fetch_array($consul)) {
    echo '
    <label for="">Nombre</label>
    <span>'.$row['nombre'].'</span>
    <br>
    <label for="">Descripcion</label>
    <span>'.$row['descripcion'].'</span>
    <br>
    <label for="">Estado</label>
    <span>'.$row['estado'].'</span>
    ';
    echo "<br>----------------------------------------------------<br>";
}


mysqli_close($connection);
























?>