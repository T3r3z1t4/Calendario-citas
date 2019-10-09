<?php
require ("conexion.php");  
    $lider = $_POST['lider']; 
    $nombre = $_POST['nombre'];
    $motivoCita = $_POST['motivo'];
    $numTel = $_POST['numero'];  
    $horario = $_POST['cita'];
    $Fecha = $_POST['fecha'];

    $query = "SELECT idIntegrante FROM integrante WHERE nombre = '$lider'";
    $idLider = mysqli_query($mysqli,$query);
    $row = $idLider->fetch_assoc();

    $insertar = "INSERT INTO cita VALUES (NULL,$row[idIntegrante],1,'$nombre','$motivoCita', '$numTel', '$horario', '$Fecha')";
    $query = mysqli_query($mysqli,$insertar);

    if($query){
        echo 'datos agregados';
    }else{
        echo 'datos no agregados';
    }
    
?>

