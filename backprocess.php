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
    echo ' <div id="alerta" class="alert alert-success" style="margin: 0.5em;padding-right: 0.1rem;padding-left: 0.1rem;padding-top: 0.1rem;padding-bottom: 0.1rem;margin-top: 0.1rem;">
    <strong>Tarea Creada!</strong> La nota '.$nombre.' se ha registrado
  </div>
  <script>
 $("#alerta").fadeOut(5000);
 </script>
  
  ';
}
else {
    echo "Error".$sql."<br>";
    mysqli_error($connection);
}

mysqli_close($connection);





?>