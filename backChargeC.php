<?php

include 'config.php';


if (!$connection) {
    die("Error de conexion".mysqli_connect_error());
}


$inCompleted = "SELECT *  FROM `Notas` WHERE `estado` = 3 ORDER BY `estado`  ASC";


$consulProgress = mysqli_query($connection, $inCompleted) or die ("Erro de consulta".$inCompleted);



while($rowCompleted = mysqli_fetch_array($consulProgress)){
    echo '
    <div class="card " style="display: flex; justify-content:center;margin: 1em;">
            <div class="card-header bg-light mb-3">
                #'.$rowCompleted['id_note'].' '.$rowCompleted['nombre'].'
            </div>
            <div class="card-body">
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
        <div class="card-footer">
            <div class="row justify-content-around">
                <div class="col-6">
                    <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#EditarModal">
                        Editar
                    </button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#EliminarModal">
                        Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>';
}



mysqli_close($connection);
?>