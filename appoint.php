 <?php
include("conexion.php");

  /*  $conIglesia = "SELECT nombre FROM iglesia;";
    $result = mysqli_query($mysqli, $conIglesia);*/

    $consulta= "SELECT horario FROM cita where fecha LIKE '2019-09-26';";
    $query2 = mysqli_query($mysqli,$consulta);
    $nueve= FALSE;
    $diez= FALSE;
    $once= FALSE;
    $doce= FALSE;
    $uno= FALSE;
    $cuatro= FALSE;
    $cinco= FALSE;
    $seis= FALSE;
 

    

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
                break;
            case '11-12':
                $once= 'disabled';
				break;
            case '12-13':
                $doce= 'disabled';
                break;
            case '13-14':
                $uno= 'disabled';
				break;
            case '16-17':
                $cuatro= 'disabled';
                break;
            case '17-18':
                $cinco= 'disabled';
                break;
            case '18-19':
                $seis= 'disabled';
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
    
    <script>
    alert(variablemm);
    </script>
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
                            <button class="botonC" onclick="obtenerHor(this)" id="9" <?php echo $nueve;?>>9-10</button>
                        </td>
                    </tr>
                    <tr class="horarios-row">
                        <td class="hora">
                            <button class="botonC" onclick="obtenerHor(this)" id="10" <?php echo $diez;?>>10-11</button>
                        </td>
                    </tr>
                    <tr class="horarios-row">
                        <td class="hora">
                            <button class="botonC" onclick="obtenerHor(this)" id="11" <?php echo $once;?>>11-12</button>
                        </td>
                    </tr>
                    <tr class="horarios-row">
                        <td class="hora">
                            <button class="botonC" onclick="obtenerHor(this)" id="12" <?php echo $doce;?>>12-1</button>
                        </td>
                    </tr>
                    <tr class="horarios-row">
                        <td class="hora">
                            <button class="botonC" onclick="obtenerHor(this)" id="13" <?php echo $uno;?>>1-2</button>
                        </td>
                    </tr>
                    <tr class="horarios-row">
                        <td class="hora">
                            <button class="botonC" onclick="obtenerHor(this)" id="16" <?php echo $cuatro;?>>4-5</button>
                        </td>
                    </tr>
                    <tr class="horarios-row">
                        <td class="hora">
                            <button class="botonC" onclick="obtenerHor(this)" id="17" <?php echo $cinco;?>>5-6</button>
                        </td>
                    </tr>
                    <tr class="horarios-row">
                        <td class="hora">
                            <button class="botonC" onclick="obtenerHor(this)" id="18" <?php echo $seis;?>>6-7</button>
                        </td>
                    </tr>
                </tbody>
            </table>

                <button class="button" id="add-button">Agregar cita</button>
            <!-- <button class="button" id="add-button">Agregar cita</button> -->
        </div>
        <div class="dialog" id="dialog">
            <h2 class="dialog-header"> Pedir cita </h2>
            <form class="form" id="form" action="principal.php" method="POST" >
                <div class="form-container" align="center" > <!-- formulario  para la cita -->
                    
                    <label class="form-label" >Fecha de Cita: </label>
                    <label class="form-label" id="fechaCita"></label><br>
                    <!--<input type="text" id="fechaCita" name="fechaCita">-->
                    <label class="form-label" ></label>Hora de Cita: </label>
                    <label class="form-label" id="horaCita"></label><br><br>

                    
                    <label class="form-label" id="valueFromMyButton" for="name"  >Nombre completo</label>
                    <input class="input" type="text" id="name" maxlength="36" name="nombre" >
                    <label class="form-label" id="valueFromMyButton" for="motivoC">Motivo de la cita</label>
                    <input class="input" type="text" id="cita" maxlength="36" name="motivo">
                    <label class="form-label" id="valueFromMyButton" for="cel">Número telefonico</label>
                    <input class="input" type="tel" id="numer" placeholder="Sin lada" name="numero">
                    <input type="button" value="Cancel" class="button" id="cancel-button"  >
                    <input type="submit" value="OK" class="button" id="ok-button">
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