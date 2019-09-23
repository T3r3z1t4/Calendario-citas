 <?php
include("conexion.php");
    $consulta= "SELECT horario FROM clientes where Fecha LIKE '2019-09-18' ";
    $query2 = mysqli_query($mysqli,$consulta);
    $nueve= FALSE;
    $diez= FALSE;
    $once= FALSE;
    $doce= FALSE;
    $uno= FALSE;
    $cuatro= FALSE;
    $cinco= FALSE;
    $seis= FALSE;

   if($query2){
        while($fila=mysqli_fetch_array($query2)){
            $r=$fila['horario'];
            echo "<tr>";
            echo "<td>$fila[horario] </td><br>";
            echo "<tr>";
            switch ($r) {
            case '9-10':
                $nueve= 'disabled';
                echo 'nueve';
				break;
            case '10-11':
                echo 'diez';
                $diez= 'disabled';
                break;
            case '11-12':
                echo 'once';
                $once= 'disabled';
				break;
            case '12-13':
                echo 'doce';
                $doce= 'disabled';
                break;
            case '13-14':
                echo 'uno';
                $uno= 'disabled';
				break;
            case '16-17':
                $cuatro= 'disabled';
                echo 'cuatro';
                break;
            case '17-18':
                echo 'cinco';
                $cinco= 'disabled';
                break;
            case '18-19':
                echo 'seis';
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
    <div class="content">
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
            <h2 class="horarios-header"> Horarios disponibles para la citas </h2>
                <table class="horarios-table">
                    <tbody>
                        <tr class="horarios-row">   
                            <td class="hora">
                                <button class="botonC" <?php echo $nueve;?>>9-10</button>
                            </td>
                        </tr>
                        <tr class="horarios-row">
                            <td class="hora">
                                <button class="botonC" <?php echo $diez;?>>10-11</button>
                            </td>
                        </tr>
                        <tr class="horarios-row">
                            <td class="hora">
                                <button class="botonC" <?php echo $once;?>>11-12</button>
                            </td>
                        </tr>
                        <tr class="horarios-row">
                            <td class="hora">
                                <button class="botonC" <?php echo $doce;?>>12-1</button>
                            </td>
                        </tr>
                        <tr class="horarios-row">
                            <td class="hora">
                                <button class="botonC" <?php echo $uno;?>>1-2</button>
                            </td>
                        </tr>
                        <tr class="horarios-row">
                            <td class="hora">
                                <button class="botonC" <?php echo $cuatro;?>>4-5</button>
                            </td>
                        </tr>
                        <tr class="horarios-row">
                            <td class="hora">
                                <button class="botonC" <?php echo $cinco;?>>5-6</button>
                            </td>
                        </tr>
                        <tr class="horarios-row">
                            <td class="hora">
                                <button class="botonC" <?php echo $seis;?>>6-7</button>
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