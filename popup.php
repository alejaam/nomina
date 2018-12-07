<?php

include "conexion.php";
//$queryEmpleado = "SELECT idEmpleado,tipoNomina, nombre, rfc, nss FROM empleado";
//mysqli_query($conexion, "SET NAMES 'utf8'");
//$query = mysqli_query($conexion,$sql);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buscar Empleado</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="js/busquedaTiempoReal.js"></script>
</head>
<body onload="busquedaTiempoReal();">
<table border="1px" class="frm">
    <input type="text" name="buscarEmpleado" id="buscarEmpleado" class="form-control" placeholder="Buscar empleado..." value="" onkeyup="busquedaTiempoReal();">
    <div id="datos"></div>
    <!-- <tr>
        <td>idEmpleado</td>
        <td>Nombre</td>
        <td>RFC</td>
        <td>NSS</td>
    </tr> -->
    <?php 
        //foreach(mysqli_query($conexion,$queryEmpleado) as $fila){?>
    <!-- <tr>
        <td><?php //echo $fila['idEmpleado'] ?></td>
        <td><?php //echo $fila['nombre'] ?></td>
        <td><?php //echo $fila['rfc'] ?></td>
        <td><?php //echo $fila['nss'] ?></td> -->
        <?php
            // $idEmpleado = $fila['idEmpleado'];
            // $tipoNomina= $fila['tipoNomina'];
            // $nombre = $fila['nombre'];
            // $nombre = str_replace(" ","&nbsp;", $nombre);
            // $rfc = $fila['rfc'];
            // $nss = $fila['nss'];
        ?>
        <!-- <td><input type="button" value="Seleccionar" onclick="datosEmpleado('<?php //echo $idEmpleado ?>','<?php //echo $tipoNomina ?>','<?php //echo $nombre ?>','<?php //echo $rfc?>','<?php //echo $nss ?>')"></td>
    </tr> -->
    <?php 
        // } 
    ?>
</table>
    
</body>
</html>