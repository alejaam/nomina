<?php 

date_default_timezone_set('America/Mexico_City');

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
    
<h2 style="color: #39c973">Crear nueva Nomina: </h2>

<form name="crearNomina" action="<?=$_SERVER['PHP_SELF']?>" method="POST"> 
    <table>
        <tr>
            <td colspan="3"><b>DATOS DEL EMPLEADO:</td>
        </tr>
        <tr>
            <td><label> IdEmpleado </label></td>
            <td><input name="idEmpleado" id="idEmpleado" value="" readonly/> <input type="button" onclick="popup()" style="background-image: url(imagenes/buscar.ico); padding: 2px 10px 15px 20px; background-repeat: no-repeat;"></td>
            <td><label>Nombre:</label></td>
            <td><input id='nombre' name="nombre" value='' readonly/></td>
        </tr>
        <tr>    
	        <td><label>RFC:</label> </td> 
            <td><input id='rfc' name="rfc" value='' readonly/></td>
            <td>NSS: </label></td>
            <td><input id='nss' name="nss" value='' readonly/></td>
        </tr>
        <tr>
            <td><label>&nbsp</label></td>
        </tr>
        <tr>
            <td style="color: #39c973"><b>DATOS DE LA NOMINA:</td>        
            <td><label for='person3'> Fecha: </label><input type="text" name="fechaNomina" id="fechaNomina" value="<?php echo date("Y-m-d") ?>" readonly > </td>
            <td><label>Tipo nomina: </label>
                <select name="tipoNomina" id="tipoNomina">
                    <option value="S">Semanal</option>
                    <option value="Q">Qincenal</option>
                </select></td>
        </tr>
        <tr>
            <td colspan="4"><b>PERCEPCIONES: </b></td>
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
            <td><input name="ayudaGasolina" id="ayudaGasolina" type="number" readonly></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td style="color: #39c973; font-weight: 900">TOTAL:</td>
        </tr>
        <tr>
            <td> <label> &nbsp </label></td>
        </tr>
        <tr>
            <td colspan="3"><b>DEDUCCIONES: </b></td>
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
        </tr>
            <td><label>Prestamos</label>
            <td><input type="number" readonly></td>
        <tr>
            <td></td>
            <td></td>
            <td style="color: #39c973; font-weight: 900">TOTAL:</td>
        </tr>
    </table>
</form>
</body>
</html>