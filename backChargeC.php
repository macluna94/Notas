<?php

include 'config.php';


if (!$connection) {
    die("Error de conexion".mysqli_connect_error());
}


$inCompleted = "SELECT *  FROM `$table` WHERE `estado` = 3 ORDER BY `estado`  ASC";


$consulProgress = mysqli_query($connection, $inCompleted) or die ("Erro de consulta".$inCompleted);



while($rowCompleted = mysqli_fetch_array($consulProgress)){
    echo '
    <div class="card " style="display: flex; justify-content:center;margin: 1em;">
            <div class="card-header titleNote">
                #'.$rowCompleted['id_note'].' '.$rowCompleted['nombre'].'
            </div>
            <div class="card-body titleNoteBody">
                <p class="card-text">
                    '.$rowCompleted['descripcion'].'
                </p>
                ';
                    switch ($rowCompleted['estado']){
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
                    }
                echo '
        </div>
        <div class="card-footer titleNote">
            <div class="row justify-content-around">
                    <div class="col-6">
                        <button type="button" class="btn btn-primary btn-sm btn-block"  onclick="modalTransfer('.$rowCompleted['id_note'].')" data-toggle="modal" data-whatever="'.$rowCompleted['id_note'].'" data-target="#EditarModal" >
                            Editar
                        </button>
                    </div> 
                    <div class="col-6">
                        <button type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#EliminarModal" data-whatever="'.$rowCompleted['id_note'].'" onclick="modalTransferE('.$rowCompleted['id_note'].')">
                            Eliminar
                        </button>
                    </div>
            </div>
        </div>
    </div>';
}



mysqli_close($connection);
?>