<?php
    require ("conexion.php");
    $nombre = $_POST['nombre'];
    $motivoCita = $_POST['motivo'];
    $numTel = $_POST['numero'];  
    $horario = "12";
    $Fecha = "2019-09-18";
    $insertar = "INSERT INTO clientes VALUES (NULL, '$nombre','$motivoCita', '$numTel', '$horario', '$Fecha')";
    $consulta= "SELECT * FROM  horario";
     $query = mysqli_query($mysqli,$insertar);
     $query2 = mysqli_query($mysqli,$consulta);

    if($query){
        echo 'datos agregados';
    }else{
        echo 'datos no agregados';
    }

?>

