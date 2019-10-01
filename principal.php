<?php
require ("conexion.php");

    $variable_hr = $_REQUEST['hr'];

    $nombre = $_POST['nombre'];
    $motivoCita = $_POST['motivo'];
    $numTel = $_POST['numero'];  
    $horario = $_POST['cita'];
    $Fecha = $_POST['fecha'];
    $insertar = "INSERT INTO clientes VALUES (NULL, '$nombre','$motivoCita', '$numTel', '$horario', '$Fecha')";
    $query = mysqli_query($mysqli,$insertar);
    if($query){
        echo 'datos agregados';
        echo $variable_hr;
    }else{
        echo 'datos no agregados';
    }
    
?>

