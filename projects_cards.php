<?php

include 'config.php';

if (!$connection) {
    die("Error de conexion".mysqli_connect_error());
}


$all_projects = "SELECT * FROM `projects` ";


$consulProjects = mysqli_query($connection, $all_projects) or die ("Erro de consulta".$all_projects);




while($row = mysqli_fetch_array($consulProjects)){

    echo '
        <div class="card shadow bg-white rounded" style="width: 18rem;">
            <img src="'.$row['image_project'].'" class="card-img-top crop" alt="code_images" style="width: 100%; height: 10%;">
            <div class="card-body">
            <h5 class="card-title">'.$row['name_project'].'</h5>
            <p class="card-text">'.$row['description_project'].'.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
            <div class="card-footer">
            <div class="row">
            
            <div class="col-sm">
            <i class="fas fa-users"></i>
            2
            </div>
                            <div class="col-sm">
                        <i class="fas fa-chart-line"></i>
                        10%
                        </div>
                        <div class="col-sm">
                        <i class="fas fa-sticky-note"></i>
                        2
                        </div>
                        </div>
                        </div>
                        </div>
    ';
}
                        
?>