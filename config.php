<?php


if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    # Windows
        $servername = "localhost";
        $database = "notas";
        $username = "root";
        $pass = "";
        $table = "tareas";
} else {
    #Linux
        $servername = "localhost";
        $database = "Tareas";
        $username = "root";
        $pass = "";
        $table = "Notas";
}




$connection = mysqli_connect(
    $servername,
    $username,
    $pass,
    $database
);



?>