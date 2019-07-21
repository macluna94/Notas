<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


</head>
<body>
    <header>
        <h2>Registro de Actividad</h2>
    </header>

<div id="noteContainer">

    <label for="noteName">Nombre
        <input type="text" id="noteName">
    </label>

    <label for="description">Descripcion
        <input type="text" id="description">
    </label>

    <label for="stateNote">Estado
        <select id="stateNote">
            <option value="1">Inicio</option>
            <option value="2">Progreso</option>
            <option value="3">Completado</option>
        </select>
    </label>

    <button id="saveNote" onclick="SaveNote(
        $('#noteName').val(),
        $('#description').val(),
        $('#stateNote').val()
    )">Guardar</button>

</div>


<span id="resultado"></span>


<script>

function SaveNote(valor1, valor2, valor3) {
    var parametros={
        "valor1": valor1,
        "valor2": valor2,
        "valor3": valor3
    };

    $.ajax({
        data: parametros,
        url: 'backprocess.php',
        type: 'post',
        beforeSend: function () {
            $('#resultado').html("Procesando");
        },
        success: function (response){
            $("#resultado").html(response);
            cargar();
        }
    });
}

function cargar() {
    $.ajax({
        data:{},
        url:'backCharge.php',
        type:'post',
        success: function (datos) {
            $('#noteList').html(datos);
        }
    });
}


</script>


<button onclick="cargar()"> Mostrar Nota</button>

<div id="noteList">



</div>







</body>
</html>