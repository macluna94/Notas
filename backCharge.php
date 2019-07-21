<?php

include 'config.php';


if (!$connection) {
    die("Error de conexion".mysqli_connect_error());
}

$sql = "SELECT * FROM `".$table."`";

$consul = mysqli_query($connection, $sql) or die ( "Algo ha ido mal en la consulta a la base de datos");

while ($row = mysqli_fetch_array($consul)) {
    echo '
    <label for="">ID: </label>
    <span id="id_note"> #'.$row['id_note'].'</span>
    <br>
    <label for="">Nombre:</label>
    <span>'.$row['nombre'].'</span>
    <br>
    <label for="">Descripcion:</label>
    <span>'.$row['descripcion'].'</span>
    <br>
    <label for="">Estado:</label>';
    switch ($row['estado']){
        case 1:
            echo "<span>Sin Comenzar</span>";
            break;
        case 2:
            echo "<span>En Progreso</span>";
            break;
        case 3:
            echo "<span>Finalizada</span>";
            break;
    }
    echo '<button>Editar</button>
    <button>Eliminar</button>';
    echo "<br>----------------------------------------------------<br>";
}


mysqli_close($connection);
























?>