<?php
include 'config.php';

$id = $_POST['valix'];


if (!$connection) {
    die("Error de conexion".mysqli_connect_error());
}


$sql = "SELECT * FROM `$table` WHERE `id_note` = $id ";

$consul = mysqli_query($connection, $sql) or die ( "Algo ha ido mal en la consulta a la base de datos");


while ($row = mysqli_fetch_array($consul)) {
    echo '

                <div class="modal-body">
                    <div class="form-group">
                        <label for="noteName">Nombre:</label>
                        <input type="text" class="form-control" id="noteNameEdit" value="'.$row['nombre'].'">
                    </div>

                    <div class="form-group">
                        <label for="description">Descripcion:</label>
                            <textarea id="descriptionEdit" class="form-control" rows="5" aria-describedby="emailHelp" >'.$row['descripcion'].'</textarea>
                        <small id="emailHelp" class="form-text text-muted">Describe detalladamente las acciones o
                            instrucciones.</small>

                    </div>

                    <div class="form-group">
                        <label for="stateNote">Estado:</label>

                        <select class="form-control" id="stateNoteEdit">
                            <option value="1">Inicio</option>
                            <option value="2">Progreso</option>
                            <option value="3">Completado</option>
                        </select>

                    </div>
                </div>

                ';


}


if (mysqli_query($connection, $sql)) {
    
}
else {
    echo "Error".$sql."<br>";
    mysqli_error($connection);
}

mysqli_close($connection);




?>