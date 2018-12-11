<?php 
include "conexion.php";
date_default_timezone_set('America/Mexico_City');


    $idNomina = (isset($_POST['idNomina']))?$_POST['idNomina']:"";
    $conceptoNomina = (isset($_POST['conceptoNomina']))?$_POST['conceptoNomina']:"";
    $fecha = (isset($_POST['fecha']))?$_POST['fecha']:"";
    $tipoNomina = (isset($_POST['tipoNomina']))?$_POST['tipoNomina']:"";
    $rfc = (isset($_POST['rfc']))?$_POST['rfc']:"";
    $nss = (isset($_POST['nss']))?$_POST['nss']:"";
    $fondoAhorro = (isset($_POST['fondoAhorro']))?$_POST['fondoAhorro']:"";
    $valesDespensa = (isset($_POST['valesDespensa']))?$_POST['valesDespensa']:"";    
    $ayudaGasolina = (isset($_POST['ayudaGasolina']))?$_POST['ayudaGasolina']:"";
    $primaVacacional = (isset($_POST['primaVacacional']))?$_POST['primaVacacional']:"";
    $totalPercepcion = (isset($_POST['totalPercepcion']))?$_POST['totalPercepcion']:"";
    $totalDeduccion = (isset($_POST['totalDeduccion']))?$_POST['totalDeduccion']:"";
    $isr = (isset($_POST['isr']))?$_POST['isr']:"";
    $infonavit = (isset($_POST['infonavit']))?$_POST['infonavit']:"";
    $imss = (isset($_POST['imss']))?$_POST['imss']:"";
    $faltas = (isset($_POST['faltas']))?$_POST['faltas']:"";
    $retardos = (isset($_POST['retardos']))?$_POST['retardos']:"";
    $idEmpleado = (isset($_POST['idEmpleado']))?$_POST['idEmpleado']:"";
    $bonoProductividad = (isset($_POST['bonoProductividad']))?$_POST['bonoProductividad']:"";
    $tiempoExtra = (isset($_POST['tiempoExtra']))?$_POST['tiempoExtra']:"";
    $nominaNeto = (isset($_POST['nominaNeto']))?$_POST['nominaNeto']:"";
    
    $genero = (isset($_POST['genero']))?$_POST['genero']:"";
    $sueldoBase = (isset($_POST['sueldoBase']))?$_POST['sueldoBase']:"1";


$accion = (isset($_POST['accion']))?$_POST['accion']:"";
switch ($accion) {
    case "btnAgregar":
        //Creamos el query para insertar un registro en MySql, y lo mandamos utilizando mysqli_query();
        //$sql = "INSERT INTO empleado (nombre, numTel, email, idPuesto, idArea, tipoNomina, direccion, rfc, nss, genero, fechaIngreso, activo) VALUES ('$nombre', $numTel, '$email', $idPuesto, $idArea, $tipoNomina, '$direccion', '$rfc', '$nss', '$genero', CURDATE(), 1)";
        // $agregarNomina = "INSERT INTO `nomina` (`idEmpleado`, `nombre`, `numTel`, `email`, `idPuesto`, `idArea`, 
        //                                 `tipoNomina`, `direccion`, `rfc`, `nss`, `genero`, `fechaIngreso`, 
        //                                 `activo`) 
        //         VALUES (NULL, '$nombre', $numTel, '$email', '$idPuesto', '$idArea', '$tipoNomina', '$direccion',
        //                  '$rfc', '$nss', '$genero', CURDATE(), 1)";
        
        $agregarNomina = "INSERT INTO `nomina` (`idNomina`, `idEmpleado`, `nominaNeto`, 
                                                `concepto`, `fecha`, `tipoNomina`, `fondoAhorro`,
                                                `valesDespensa`, `ayudaGasolina`, `primaVacacional`,
                                                `totalPercepcion`, `totalDeduccion`, `isr`, `infonavit`,
                                                `imss`, `faltas`, `retardos`, `bonoProductividad`, `aguinaldo`, `tiempoExtra`)
                         VALUES (NULL, '$idEmpleado', '$nominaNeto', '$conceptoNomina', '$fecha', '$tipoNomina', 
                                '$fondoAhorro', '$valesDespensa', '$ayudaGasolina','$primaVacacional', '$totalPercepcion',
                                 '$totalDeduccion', '0', '$infonavit', '$imss', '0', '0', '$bonoProductividad', '0', '$tiempoExtra')";
        $query = mysqli_query($conexion,$agregarNomina) or die (mysqli_error($conexion));
        //Validamos si mysqli_query(); retorna un true o un false para saber si pudo hacer la inserción
        if ($query) {
            echo "<script>alert('Empleado agregado con éxito')</script>";
            header("location: empleados.php?success");
        }else{
            
            echo "No se pudo agregar empleado, error: ".mysqli_error($con)."<br>.".mysqli_errno($con);
            
            //echo("Error description: " . mysqli_error($conexion));
        }
        
        /*echo $nombre;
        echo "Presionaste btnAgregar";*/
        break;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Sistema de nómina</title>
    <link rel="stylesheet" type="text/css" media="screen" href="estilos/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Open+Sans|Roboto" rel="stylesheet">  
    <script src="main.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0, maximium-scale=1.0, minimum-scale=1.0">
<script language="JavaScript">
    var miPopup;

    function popup(){
        miPopup = window.open("popup.php","empleados","width=700, height=800, menubar=si")
        miPopup.focus()
    }

    var sueldoBase = document.getElementById(sueldoBase).value;
    var sueldoBasex2 = sueldoBase * 2;
    var prueba = document.getElementById(prueba).value = 100;
    document.getElementById(sueldoBase).value = sueldoBasex2;

</script>  
</head>
<header>
        <h1>Nómina</h1>
        <div class="navbar">
            <a href="index.php">Inicio</a>
            <a href="nomina.php">Nomina</a>
            <a href="empleados.php">Empleados</a>
        </div>
</header>   
<body>
    
<h3 style="color: #39c973">Crear nueva Nomina: </h3>

<form name="crearNomina" action="<?=$_SERVER['PHP_SELF']?>" method="POST"> 
    <table class="frm">
        <tr>
            <td colspan="4" align="center"><b>DATOS DEL EMPLEADO</td>
        </tr>
        <tr>
            <td><label>Numero de Empleado </label></td>
            <td><input name="idEmpleado" id="idEmpleado" value="" readonly required/> <input type="button" onclick="popup()" style="background-image: url(imagenes/buscar.ico); padding: 2px 10px 15px 20px; background-repeat: no-repeat;"></td>
            <td><label>Nombre:</label></td>
            <td><input id="nombre" name="nombre" value="" required readonly/></td>
        </tr>
        <tr>    
	        <td><label>RFC:</label> </td> 
            <td><input id='rfc' name="rfc" value='' readonly required/></td>
            <td>NSS: </label></td>
            <td><input id='nss' name="nss" value='' readonly required/></td>
        </tr>
        <tr>
            <td><label>Sueldo Base:</label></td>
            <td><input type="text" name="sueldoBase" id="sueldoBase" readonly></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4" style="background-color: #39c973"><label>&nbsp</label></td>
        </tr>
        <tr>
            <td style="color: #39c973"><b>DATOS DE LA NOMINA:</td>        
            <td><label for='person3'> Fecha: </label><input type="text" name="fecha" id="fecha" value="<?php echo date("Y-m-d") ?>" readonly > </td>
            <td colspan="2"><label>Tipo nomina: </label>
                <input type="text" name="tipoNomina" id="tipoNomina" readonly>
            </td>
        </tr>
        <tr>
            <td colspan="4" align="center"><b>PERCEPCIONES</b></td>
        </tr>
        <tr>
            <td><label for='person3'> Tiempo extra (horas): </label></td>
            <td>
            <select>
                    <option value="0" name="tiempoExtra" id="tiempoExtra">N/A</option>
                    <option value="1" name="tiempoExtra" id="tiempoExtra">1</option>
                    <option value="2" name="tiempoExtra" id="tiempoExtra">2</option>
                    <option value="3" name="tiempoExtra" id="tiempoExtra">3</option>
                    <option value="4" name="tiempoExtra" id="tiempoExtra">4</option>
                    <option value="5" name="tiempoExtra" id="tiempoExtra">5</option>
                    <option value="6" name="tiempoExtra" id="tiempoExtra">6</option>
                    <option value="7" name="tiempoExtra" id="tiempoExtra">7</option>
                    <option value="8" name="tiempoExtra" id="tiempoExtra">8</option>
                    <option value="9" name="tiempoExtra" id="tiempoExtra">9</option>
                    <option value="10" name="tiempoExtra" id="tiempoExtra">10</option>
                    <option value="11" name="tiempoExtra" id="tiempoExtra">11</option>
                    <option value="12" name="tiempoExtra" id="tiempoExtra">12</option>
                </select>
            </td>
            <td><label> Bono de productividad: </label> </td>
            <td><input name="bonoProductividad" id="bonoProductividad" type="number"/></td>
        <tr>
            <td><label>Fondo de ahorro: </label></td>
            <td><input name="fondoAhorro" id="fondoAhorro" type="number" readonly></td>
            <td><label>Vales de despensa: </label></td>
            <td><input name="valesDespensa" id="valesDespensa" type="number" readonly></td>
        </tr>
        <tr>
            <td><label>Ayuda Gasolina: </label></td>
            <td><input name="ayudaGasolina" id="ayudaGasolina" type="number" readonly></td>
            <td><label>Prima Vacacional: </label></td>
            <td><input name="primaVacacional" id="primaVacacional" type="number" readonly></td>
        </tr>
        
        <?php
            
            if(date("n")==12){
                echo '<tr><td><label>Aguinaldo: </label></td>
                <td colspan="3"><input name="aguinaldo" id="aguinaldo" type="number" readonly></td></tr>';
            }
        ?>
            <td>Concepto Nomina: </td>
            <td><input type="text" name="conceptoNomina" id="conceptoNomina" value="Pago de Nomina" readonly></td>
            <td style="color: #39c973; font-weight: 900">TOTAL:</td>
            <td><u><input type="number" id="totalPercepcion" name="totalPercepcion" readonly></u></td>
        </tr>
        <tr>
            <td colspan="4" style="background-color: #39c973"> <label> &nbsp </label></td>
        </tr>
        <tr>
            <td colspan="4" align="center"><b>DEDUCCIONES</b></td>
        </tr>
        <tr>
            <td><label>Faltas: </label></td>
            <td>
                <select>
                    <option id="faltas" name="faltas" value="0">N/A</option>
                    <option id="faltas" name="faltas" value="1">1</option>
                    <option id="faltas" name="faltas" value="2">2</option>
                    <option id="faltas" name="faltas" value="3">3</option>
                </select>
            </td>
            <td><label>ISR: </label></td>
            <td><input name="isr" id="isr" type="number" readonly></td>
        </tr>
        <tr>
            <td><label>Infonavit: </label></td>
            <td><input name="infonavit" id="infonavit" type="number" readonly></td>
            <td><label>IMSS: </label></td>
            <td><input name="imss" id="imss" type="number" readonly></td>
        </tr>
        <tr>
            <td><label>Retardos: </label></td>
                <td>
                    <select>
                        <option id="retardos" name="retardos" value="0">N/A</option>
                        <option id="retardos" name="retardos" value="1">1</option>
                        <option id="retardos" name="retardos" value="2">2</option>
                        <option id="retardos" name="retardos" value="3">3</option>
                        <option id="retardos" name="retardos" value="4">4</option>
                        <option id="retardos" name="retardos" value="5">5</option>
                        <option id="retardos" name="retardos" value="6">6</option>
                        <option id="retardos" name="retardos" value="7">7</option>
                    </select>
                </td>
            <td><label>Prestamos: </label>
            <td><input type="number" id="prestamos" readonly disabled="true"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td style="color: #39c973; font-weight: 900">TOTAL:</td>
            <td><u><input type="text" id="totalDeduccion" name="totalDeduccion" readonly></u></td>
        </tr>
        <tr>
            <td colspan="4" style="background-color: #39c973"> <label> &nbsp </label></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td style="color: #39c973; font-weight: 900">TOTAL NOMINA:</td>
            <td><input type="number" id="nominaNeto" name="nominaNeto" readonly></td>
        </tr>
        <tr>
            <td colspan="4" align="center"><button class="botonGenerar" value="btnAgregar" type="submit" name="accion" s>Generar Nomina</button></td>
        </tr>
    </table>
</form>

</body>
</html>