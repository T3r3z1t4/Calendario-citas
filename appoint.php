 <?php
include("conexion.php");
<<<<<<< HEAD
    $consulta= "SELECT horario FROM clientes where Fecha LIKE '2019-10-01' ";
=======

  /*  $conIglesia = "SELECT nombre FROM iglesia;";
    $result = mysqli_query($mysqli, $conIglesia);*/

    $consulta= "SELECT horario FROM cita where fecha LIKE '2019-09-26';";
>>>>>>> af14101c6923db6d246b627ac14ab88ca06885a4
    $query2 = mysqli_query($mysqli,$consulta);
    $nueve= FALSE;
    $diez= FALSE;
    $once= FALSE;
    $doce= FALSE;
    $uno= FALSE;
    $cuatro= FALSE;
    $cinco= FALSE;
    $seis= FALSE;
    $col9='#026353';
    $col10='#026353';
    $col11='#026353';
    $col12='#026353';
    $col1='#026353';
    $col4='#026353';
    $col5='#026353';
    $col6='#026353';

    

    //obtener integrantes de la iglesia seleccionada
    $query_integrante = "SELECT nombre FROM integrante WHERE idIglesia=1";
    $queryIntegrante = mysqli_query($mysqli,$query_integrante);                 
    
   if($query2){
        while($fila=mysqli_fetch_array($query2)){
            $r=$fila['horario'];
            switch ($r) {
            case '9-10':
                $nueve= 'disabled';
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
        }
    }else{
        echo 'no';
    }
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Calendario de citas</title>
    <meta name="description" content="Calendar">
    <meta name="author" content="Charles Anderson">
    <link rel="stylesheet" href="styleAppoint.css">
</head>

<body>
    <div class="content" id="contenedor">
        <div class="appoint-container">
            <div class="appoint">
                <div class="year-header">
                    <span class="left-button" id="prev"> &lang; </span>
                    <span class="year" id="label"></span>
                    <span class="right-button" id="next"> &rang; </span>
                </div>
                <table class="months-table">
                    <tbody>
                        <tr class="months-row">
                            <td class="month">Ene</td>
                            <td class="month">Feb</td>
                            <td class="month">Mar</td>
                            <td class="month">Abr</td>
                            <td class="month">May</td>
                            <td class="month">Jun</td>
                            <td class="month">Jul</td>
                            <td class="month">Ago</td>
                            <td class="month">Sep</td>
                            <td class="month">Oct</td>
                            <td class="month">Nov</td>
                            <td class="month">Dic</td>
                        </tr>
                    </tbody>
                </table>

                <table class="days-table">
                    <td class="day">Dom</td>
                    <td class="day">Lun</td>
                    <td class="day">Mar</td>
                    <td class="day">Mie</td>
                    <td class="day">Jue</td>
                    <td class="day">Vie</td>
                    <td class="day">Sab</td>
                </table>
                <!-- Inicializa el calendario agregando las fechas HTMLdiv class="frame"> área del calendario -->
                <table class="dates-table">
                    <tbody class="tbody">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="events-container"> <!-- Aqui es donde se se ve el texto de que no hay act -->
        </div> 
        <div class="horarios-container" id="semana">
            <h2 class="horarios-header">Horarios</h2>
            
            <p>Seleccione su Integrante:
                <select name="integrante" id="integrante">
                    <?php 
                        while ($valores = mysqli_fetch_array($queryIntegrante)) {
                    ?>
                        <option value='1'> <?php echo $valores['nombre'] ?> </option>
                    <?php 
                        }
                    ?>
                </select>
            </p>
           <!-- <div class="custom-select" style="width:200px;">
                <select class="select-selected">
                    <option value="0">Select car:</option>
                    <option value="1">Audi</option>
                    <option value="2">BMW</option>
                    <option value="3">Citroen</option>
                    <option value="4">Ford</option>
                    <option value="5">Honda</option>
                    <option value="6">Jaguar</option>
                    <option value="7">Land Rover</option>
                    <option value="8">Mercedes</option>
                    <option value="9">Mini</option>
                    <option value="10">Nissan</option>
                    <option value="11">Toyota</option>
                    <option value="12">Volvo</option>
                </select>
            </div>-->
            <table class="horarios-table">
                <tbody>
                    <tr class="horarios-row">   
                        <td class="hora">
                            <button class="botonC"   onclick="obtenerHor('9')" style="background-color:<?php echo $col9;?>"  <?php echo $nueve;?>>9-10</button>
                        </td>
                    </tr>
                    <tr class="horarios-row">
                        <td class="hora">
                            <button class="botonC"  onclick="obtenerHor('10')" style="background-color:<?php echo $col10;?>" <?php echo $diez;?>>10-11</button>
                        </td>
                    </tr>
                    <tr class="horarios-row">
                        <td class="hora">
                            <button class="botonC" onclick="obtenerHor('11')"  style="background-color:<?php echo $col11;?>" <?php echo $once;?>>11-12</button>
                        </td>
                    </tr>
                    <tr class="horarios-row">
                        <td class="hora">
                            <button class="botonC" onclick="obtenerHor('12')"  style="background-color:<?php echo $col12;?>" <?php echo $doce;?>>12-1</button>
                        </td>
                    </tr>
                    <tr class="horarios-row">
                        <td class="hora">
                            <button class="botonC" onclick="obtenerHor('13')"  style="background-color:<?php echo $col1;?>" <?php echo $uno;?>>1-2</button>
                        </td>
                    </tr>
                    <tr class="horarios-row">
                        <td class="hora">
                            <button class="botonC" onclick="obtenerHor('16')"  style="background-color:<?php echo $col4;?>" <?php echo $cuatro;?>>4-5</button>
                        </td>
                    </tr>
                    <tr class="horarios-row">
                        <td class="hora">
                            <button class="botonC" onclick="obtenerHor('17')" style="background-color:<?php echo $col5;?>" <?php echo $cinco;?>>5-6</button>
                        </td>
                    </tr>
                    <tr class="horarios-row">
                        <td class="hora">
                            <button class="botonC" onclick="obtenerHor('18')"  style="background-color:<?php echo $col6;?>" <?php echo $seis;?>>6-7</button>
                        </td>
                    </tr>
                </tbody>
            </table>
<<<<<<< HEAD
            <button class="button" id="add-button" onclick="return validarHor()">Agregar cita</button> 
=======

                <button class="button" id="add-button">Agregar cita</button>
            <!-- <button class="button" id="add-button">Agregar cita</button> -->
>>>>>>> af14101c6923db6d246b627ac14ab88ca06885a4
        </div>
        <!-- <div><input type="text" id="myText" value="Mickey"> </div> -->
        <div class="dialog" id="dialog">  
            <h2 class="dialog-header"> Pedir cita </h2>
            <form name="fvalida" class="form" id="form" action="principal.php" method="POST" onsubmit = "return validacionForm() " >
                <div class="form-container" align="center" > <!-- formulario  para la cita -->
                    <label class="form-label" for="fecha-cita">Fecha de Cita:</label>
                    <input  class="input"  maxlength="36" type="text" id="fechaId" name="fecha" readonly  >
                    <label class="form-label" for="hora-cita">Hora de Cita:</label>
                    <input  class="input" maxlength="36" type="text" id="horaId" name="cita" readonly>
                    <label class="form-label"   for="nombre">Nombre completo</label>
                    <input class="input" min="3" max="25" type="text" id="name"  name="nombre"  tabindex="1" required autofocus >
                    <label class="form-label"  for="motivoC">Motivo de la cita</label>
                    <input class="input" min="5" max="40" type="text" id="cita"  name="motivo" tabindex="2" required autofocus>
                    <label class="form-label"  for="cel">Número telefonico</label>
                    <input class="input" type="tel" id="numer" min="7"  max="10" placeholder="Sin lada" name="numero"  tabindex="3" required>
                    <input type="button" value="Cancel" class="button" id="cancel-button"  >
                    <input type="submit" value="OK" class="button" id="ok-button" >
                </div>
            </form>
        </div>
    </div>
    <!-- Dialog Box-->  
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous">
    </script>
    <script src="scriptAppoint.js"></script> 
</body>

</html>