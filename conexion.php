<?php

    $server="localhost";
    $user= "root";
    $pass="";
    $db="cita";

    $mysqli = new mysqli($server, $user, $pass, $db);

    if($mysqli->connect_errno){
        echo "no conectado";
    }else{
        //echo "conectado -> ";
    }

    
?>
