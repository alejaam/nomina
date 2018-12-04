<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title> Seleccionar Empleado </title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
<script> 
    function retornavalores(idemp, nombre, puesto, area, nss, rfc){ 
        window.opener.document.crearNomina.getElementById('idEmpleado').value=idemp; 
        window.opener.document.crearNomina.getElementById('nombre').value=nombre; 
        window.opener.document.crearNomina.getElementById('nombrePuesto').value=puesto;
        window.opener.document.crearNomina.getElementById('nombreArea').value=area;  
        window.opener.document.crearNomina.getElementById('rfc').value=nss; 
        window.opener.document.crearNomina.getElementById('nss').value=rfc; 
        
        window.close();
    }
</script> 
</head>
<body>
    <table border="1" bgcolor="#ffffff" >
        <tr>
            <form action="">
                <td>ID del Empleado</td>
                <td>Nombre</td>
                <td>Tipo de puesto</td>
                <td>Area</td>
                <td>NSS</td> 
                <td>RFC</td>
        </tr><br>    

<?php

include("conexion.php");

$queryPopup = "SELECT empl.*, pto.*, are.* FROM empleado empl INNER JOIN puesto pto ON empl.idPuesto = pto.idPuesto INNER JOIN area are ON empl.idArea = are.idArea LIMIT 0 , 90";

foreach(mysqli_query($conexion,$queryPopup) as $fila) {?>
    <tr>
        <td><?php echo $fila['idEmpleado'] ?></td>
        <td><?php echo $fila['nombre'] ?></td>
        <td><?php echo $fila['nombrePuesto'] ?></td>
        <td><?php echo $fila['nombreArea'] ?></td>
        <td><?php echo $fila['rfc'] ?></td>
        <td><?php echo $fila['nss'] ?></td>
 
        <td><button type='submit' onclick="retornavalores('<?php $fila['$idEmpleado']?>','<?php $fila['nombre']?>','<?php $fila['nombrePuesto']?>','<?php $fila['nombreArea'] ?>','<?php $fila['nss'] ?>','<?php $fila['rfc']?>');">Seleccionar</button></td> 
    </tr>

<?php
    }
?>
</table>
</form>    
</body>
</html>