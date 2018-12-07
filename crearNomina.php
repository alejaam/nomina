<?php 
include "conexion.php";
date_default_timezone_set('America/Mexico_City');



    $nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";
    $numTel = (isset($_POST['numTel']))?$_POST['numTel']:"";
    $email = (isset($_POST['email']))?$_POST['email']:"";
    $idPuesto = (isset($_POST['idPuesto']))?$_POST['idPuesto']:"";
    $idArea = (isset($_POST['idArea']))?$_POST['idArea']:"";    
    $tipoNomina = (isset($_POST['tipoNomina']))?$_POST['tipoNomina']:"";
    $direccion = (isset($_POST['direccion']))?$_POST['direccion']:"";
    $rfc = (isset($_POST['rfc']))?$_POST['rfc']:"";
    $nss = (isset($_POST['nss']))?$_POST['nss']:"";
    $genero = (isset($_POST['genero']))?$_POST['genero']:"";

    $sueldoBase = (isset($_POST['sueldoBase']))?$_POST['sueldoBase']:"1";

    $factorFondoAhorro = 0.10;

    $fondoAhorro = $factorFondoAhorro * $sueldoBase;



$accion = (isset($_POST['accion']))?$_POST['accion']:"";
// switch ($accion) {
//     case "btnAgregar":
//         //Creamos el query para insertar un registro en MySql, y lo mandamos utilizando mysqli_query();
//         //$sql = "INSERT INTO empleado (nombre, numTel, email, idPuesto, idArea, tipoNomina, direccion, rfc, nss, genero, fechaIngreso, activo) VALUES ('$nombre', $numTel, '$email', $idPuesto, $idArea, $tipoNomina, '$direccion', '$rfc', '$nss', '$genero', CURDATE(), 1)";
//         $agregarNomina = "INSERT INTO `nomina` (`idEmpleado`, `nombre`, `numTel`, `email`, `idPuesto`, `idArea`, 
//                                         `tipoNomina`, `direccion`, `rfc`, `nss`, `genero`, `fechaIngreso`, 
//                                         `activo`) 
//                 VALUES (NULL, '$nombre', $numTel, '$email', '$idPuesto', '$idArea', '$tipoNomina', '$direccion',
//                          '$rfc', '$nss', '$genero', CURDATE(), 1)";
//         $query = mysqli_query($conexion,$agregarEmpleado) or die (mysqli_error($conexion));
//         //Validamos si mysqli_query(); retorna un true o un false para saber si pudo hacer la inserción
//         if ($query) {
//             echo "<script>alert('Empleado agregado con éxito')</script>";
//             header("location: empleados.php?success");
//         }else{
            
//             echo "No se pudo agregar empleado, error: ".mysqli_error($con)."<br>.".mysqli_errno($con);
            
//             //echo("Error description: " . mysqli_error($conexion));
//         }
        
//         /*echo $nombre;
//         echo "Presionaste btnAgregar";*/
//         break;
// }

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
            <td><label> IdEmpleado </label></td>
            <td><input name="idEmpleado" id="idEmpleado" value="" readonly required/> <input type="button" onclick="popup()" style="background-image: url(imagenes/buscar.ico); padding: 2px 10px 15px 20px; background-repeat: no-repeat;"></td>
            <td><label>Nombre:</label></td>
            <td><input id="nombre" name="nombre" value="" required/></td>
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
            <td><label for='person3'> Fecha: </label><input type="text" name="fechaNomina" id="fechaNomina" value="<?php echo date("Y-m-d") ?>" readonly > </td>
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
                    <option value="0">N/A</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
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
        <tr>
            <td><label>Aguinaldo: </label></td>
            <td colspan="3"><input name="ayudaGasolina" id="ayudaGasolina" type="number" readonly></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td style="color: #39c973; font-weight: 900">TOTAL:</td>
            <td><u>AQUI SE MOSTRARA EL TOTAL</u></td>
        </tr>
        <tr>
            <td colspan="4" style="background-color: #39c973"> <label> &nbsp </label></td>
        </tr>
        <tr>
            <td colspan="4" align="center   "><b>DEDUCCIONES</b></td>
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
            <td><input name="retardos" id="retardos" type="number" readonly></td>
            <td><label>Prestamos</label>
            <td><input type="number" readonly></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td style="color: #39c973; font-weight: 900">TOTAL:</td>
            <td><u>AQUI SE MOSTRARA EL TOTAL</u></td>
        </tr>
        <tr>
            <td colspan="4" align="center"><button class="botonGenerar" value="btnAgregar" type="submit" name="accion" s>Generar Nomina</button></td>
        </tr>
    </table>
</form>

</body>
</html>