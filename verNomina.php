<?php

    include "conexion.php";

    $idNomina = (isset($_POST['idNomina']))?$_POST['idNomina']:"";
    $conceptoNomina = (isset($_POST['concepto']))?$_POST['concepto']:"";
    $fecha = (isset($_POST['fecha']))?$_POST['fecha']:"";
    $tipoNomina = (isset($_POST['tipoNomina']))?$_POST['tipoNomina']:"";
    $nominaNeto = (isset($_POST['nominaNeto']))?$_POST['nominaNeto']:"";
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
    $sueldoBase = (isset($_POST['sueldoBase']))?$_POST['sueldoBase']:"";
    $tiempoExtra = (isset($_POST['tiempoExtra']))?$_POST['tiempoExtra']:"";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nomina n° <?php echo $idNomina ?></title>
    <link rel="stylesheet" href="estilos/main.css">
   
</head>
<body>
<table class="frm" border="1px">
        <tr>
            <td colspan="4" align="center"><b>DATOS DEL EMPLEADO</td>
        </tr>
        <tr>
            <td><label>Numero de Empleado </label></td>
            <td><?php echo $idEmpleado ?></td>
            <td><label>Nombre:</label></td>
            <?php
                $queryNombre = "SELECT nombre FROM empleado WHERE idEmpleado = '$idEmpleado'";
                foreach(mysqli_query($conexion,$queryNombre) as $fila){?>
            <td><?php echo $fila['nombre'] ?></td>
        </tr>
        <?php
                }
        ?>
        <tr>    
	        <td><label>RFC:</label> </td> 
            <td><?php echo $rfc ?></td>
            <td>NSS: </label></td>
            <td><?php echo $nss ?></td>
        </tr>
        <tr>
            <td><label>Sueldo Base:</label></td>
            <td colspan="3"><?php echo $sueldoBase ?></td>
        </tr>
        <tr>
            <td colspan="4" style="background-color: #39c973"><label>&nbsp</label></td>
        </tr>
        <tr>
            <td style="color: #39c973"><b>DATOS DE LA NOMINA:</td>        
            <td><label for='person3'> Fecha: </label><?php echo $fecha ?></td>
            <td><label>Tipo nomina: </label>
                <?php echo $tipoNomina ?>
            </td>
            <td><label>Nomina n°: </label><?php echo $idNomina ?></td>
        </tr>
        <tr>
            <td colspan="4" align="center"><b>PERCEPCIONES</b></td>
        </tr>
        <tr>
            <td><label for='person3'> Tiempo extra (horas): </label></td>
            <td>
                <?php echo $tiempoExtra ?>
            </td>
            <td><label> Bono de productividad: </label> </td>
            <td><?php echo $bonoProductividad ?></td>
        <tr>
            <td><label>Fondo de ahorro: </label></td>
            <td><?php echo $fondoAhorro ?></td>
            <td><label>Vales de despensa: </label></td>
            <td><?php echo $valesDespensa ?></td>
        </tr>
        <tr>
            <td><label>Ayuda Gasolina: </label></td>
            <td><?php echo $ayudaGasolina ?></td>
            <td><label>Prima Vacacional: </label></td>
            <td><?php echo $primaVacacional ?></td>
        </tr>
        
        <?php
            
            if(date("n")==12){
                echo '<tr><td><label>Aguinaldo: </label></td>
                <td colspan="3"><?php echo $nss ?></tr>';
            }
        ?>
            <td>Concepto Nomina: </td>
            <td><?php echo $conceptoNomina ?></td>
            <td style="color: #39c973; font-weight: 900">TOTAL:</td>
            <td><u><?php echo $totalPercepcion ?></u></td>
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
                <?php echo $faltas ?>
            </td>
            <td><label>ISR: </label></td>
            <td><?php echo $isr ?></td>
        </tr>
        <tr>
            <td><label>Infonavit: </label></td>
            <td><?php echo $infonavit ?></td>
            <td><label>IMSS: </label></td>
            <td><?php echo $imss ?></td>
        </tr>
        <tr>
            <td><label>Retardos: </label></td>
                <td>
                    <?php echo $retardos ?>
                </td>
            <td><label>Prestamos: </label>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td style="color: #39c973; font-weight: 900">TOTAL:</td>
            <td><u><?php echo $totalDeduccion ?></u></td>
        </tr>
        <tr>
            <td colspan="4" style="background-color: #39c973"> <label> &nbsp </label></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td style="color: #39c973; font-weight: 900">TOTAL NOMINA:</td>
            <td><u><?php echo $nominaNeto ?></u></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input class="botonGenerar" type='button' onclick='window.print();' value='Imprimir' /></td>
            <td colspan="2" align="center"><input class="botonGenerar" type='button' onclick="location.href = 'mostrarNominas.php'" value='Regresar' /></td>
        </tr>
    </table>
</body>
</html>