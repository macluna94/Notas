<?php
include 'config.php';

$id_search = $_POST['id_note'];

$sql="DELETE FROM `".$table."` WHERE `".$table."`.`id_note` = ".$id_search."";


if (mysqli_query($connection, $sql)) {
    echo "Successefull";
}
else {
    echo "Error".$sql."<br>";
    mysqli_error($connection);
}

mysqli_close($connection);

?>