<?php

include 'config.php';


if (!$connection) {
    die("Error de conexion".mysqli_connect_error());
}

$sql = "SELECT *  FROM `$table` WHERE `estado` = 1 ORDER BY `estado`  ASC";


$consul = mysqli_query($connection, $sql) or die ( "Algo ha ido mal en la consulta a la base de datos");


while ($row = mysqli_fetch_array($consul)) {
    echo '
        <div class="card " style="display: flex; justify-content:center;margin: 1em;">
                <div class="card-header titleNote  ">
                    #'.$row['id_note'].' '.$row['nombre'].'
                </div>
                <div class="card-body titleNoteBody">
                    <p class="card-text">
                        '.$row['descripcion'].'
                    </p>
                    ';
                        switch ($row['estado']){
                        case 1:
                        echo '
                        <div class="alert alert-success" role="alert">
                            Sin Comenzar
                        </div>';
                        break;
                        case 2:
                        echo '
                        <div class="alert alert-info" role="alert">
                            En Progreso
                        </div>';
                        break;
                        case 3:
                        echo '
                        <div class="alert alert-danger" role="alert">
                            Finalizada
                        </div>';
                        break;
                        };
                    echo '
            </div>
            <div class="card-footer titleNote">
                <div class="row justify-content-around">
                    <div class="col-6">
                        <button type="button" class="btn btn-primary btn-sm btn-block"  onclick="modalTransfer('.$row['id_note'].')" data-toggle="modal" data-whatever="'.$row['id_note'].'" data-target="#EditarModal" >
                            Editar
                        </button>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-danger btn-sm btn-block" data-whatever="'.$row['id_note'].'"  onclick="modalTransferE('.$row['id_note'].')" data-toggle="modal" data-target="#EliminarModal">
                            Eliminar
                        </button>
                    </div>
                </div>
            </div>
        </div>';
}
 

mysqli_close($connection);


?>