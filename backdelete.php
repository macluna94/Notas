<?php
include 'config.php';

$id_search = intval($_POST['id_note']);

$sql="DELETE FROM `$table` WHERE `$table`.`id_note` = $id_search";


if (mysqli_query($connection, $sql)) {
        echo ' <div id="alerta" class="alert alert-danger" style="margin: 0.5em;padding-right: 0.1rem;padding-left: 0.1rem;padding-top: 0.1rem;padding-bottom: 0.1rem;margin-top: 0.1rem;">
    <strong>Tarea '.$id_search.' Eliminada!</strong>
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