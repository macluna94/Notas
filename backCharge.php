<?php

include 'config.php';


if (!$connection) {
    die("Error de conexion".mysqli_connect_error());
}

$sql = "SELECT * FROM `".$table."`";

$consul = mysqli_query($connection, $sql) or die ( "Algo ha ido mal en la consulta a la base de datos");

while ($row = mysqli_fetch_array($consul)) {
    echo '
        <div class="card " style="display: flex; justify-content:center;margin: 1em;">
                <div class="card-header bg-light mb-3">
                    #'.$row['id_note'].' '.$row['nombre'].'
                </div>
                <div class="card-body">
                    <p class="card-text">
                        '.$row['descripcion'].'
                    </p>
                    ';
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
                    echo '
            </div>
            <div class="card-footer">
                <div class="row justify-content-around">
                    <div class="col-6">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditarModal">
                            Editar
                        </button>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#EliminarModal">
                            Eliminar
                        </button>
                    </div>
                </div>
            </div>
        </div>';
}


mysqli_close($connection);
























?>