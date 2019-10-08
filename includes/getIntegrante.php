<?php

	require ('../conexion.php');
	
    $idIntegrante = $_POST['idintegrante'];
    
    $queryM = "SELECT horario FROM cita where idIntegrante=$idIntegrante";

    $resultadoM = $mysqli->query($queryM);
    
    $select = "";

    $array = array("<tr class='horarios-row'><td id='hora'><button class='botonC' onclick=\"obtenerHor('9')\">9-10</button></td></tr>",
                   "<tr class='horarios-row'><td id='hora'><button class='botonC' onclick=\"obtenerHor('10')\">10-11</button></td></tr>",
                   "<tr class='horarios-row'><td id='hora'><button class='botonC' onclick=\"obtenerHor('11')\">11-12</button></td></tr>",
                   "<tr class='horarios-row'><td id='hora'><button class='botonC' onclick=\"obtenerHor('12')\">12-13</button></td></tr>",
                   "<tr class='horarios-row'><td id='hora'><button class='botonC' onclick=\"obtenerHor('13')\">13-14</button></td></tr>",
                   "<tr class='horarios-row'><td id='hora'><button class='botonC' onclick=\"obtenerHor('16')\">16-17</button></td></tr>",
                   "<tr class='horarios-row'><td id='hora'><button class='botonC' onclick=\"obtenerHor('17')\">17-18</button></td></tr>",
                   "<tr class='horarios-row'><td id='hora'><button class='botonC' onclick=\"obtenerHor('18')\">18-19</button></td></tr>");
    $i = 0;

	while($rowM = $resultadoM->fetch_assoc())
	{
        //$select.= "<option value='".$rowM['idCita']."'>".$rowM['horario']."</option>";
        if($rowM){

        switch ($rowM['horario']) {
            case '9-10':
                $array[$i] = "";
                break;
            case '10-11':
                $array[$i] = "";
                break;
            case '11-12':
                $array[$i] = "";
            break;
            case '12-13':
                $array[$i] = "";
                break;
            case '13-14':
                $array[$i] = "";
                break;
            case '16-17':
                $array[$i] = "";
                break;
            case '17-18':
                $array[$i] = "";
                break;
            case '18-19':
                $array[$i] = "";
                break;
            }
            $i++;
        }
    }
    
    $i = 0;

    while($i < 8){
        $cadena = $array[$i];
        if(strlen($cadena) > 0){
            $select.= $array[$i];
        }
        $i++;
    }

    
    //$new. = "<button class='button' id='add-button'>Agregar cita</button>";

    echo $select;
    //echo $new;
    
   /*
        $r=$rowM['horario'];
        echo $r;
        switch ($r) {
        case '9-10':
            $nueve= 'disabled';
            $col9='rgb(124, 41, 20)';
            echo 'nueve';
            break;
        case '10-11':
            $diez= 'disabled';
            $col10= 'rgb(124, 41, 20)';
            break;
        case '11-12':
            $once= 'disabled';
            $col11='rgb(124, 41, 20)';
            break;
        case '12-13':
            $doce= 'disabled';
            $col12='rgb(124, 41, 20)';
            break;
        case '13-14':
            $uno= 'disabled';
            $col1='rgb(124, 41, 20)';
            break;
        case '16-17':
            $cuatro= 'disabled';
            $col4='rgb(124, 41, 20)';
            echo 'cuatro';
            break;
        case '17-18':
            $cinco= 'disabled';
            $col5='rgb(124, 41, 20)';
            break;
        case '18-19':
            $seis= 'disabled';
            $col6='rgb(124, 41, 20)';
            break;
        }
    */
	
?>