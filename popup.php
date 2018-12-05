<?php

include "conexion.php";

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buscar Empleado</title>
<script>
    function datosEmpleado(idEmp,nombre,rfc,nss){
        opener.document.crearNomina.idEmpleado.value = idEmp;
        opener.document.crearNomina.nombre.value = nombre;
        opener.document.crearNomina.rfc.value = rfc;
        opener.document.crearNomina.nss.value = nss;
        window.close();
    }

</script>
</head>
<body>
<table border="1px">
    <tr>
        <td>idEmpleado</td>
        <td>Nombre</td>
        <td>RFC</td>
        <td>NSS</td>
    </tr>
    <?php 
          
          $sql = "SELECT idEmpleado,nombre,rfc,nss FROM empleado";
          //mysqli_query($conexion, "SET NAMES 'utf8'");
          //$query = mysqli_query($conexion,$sql);
        foreach(mysqli_query($conexion,$sql) as $fila){?>
    <tr>
        <td><?php echo $fila['idEmpleado'] ?></td>
        <td><?php echo $fila['nombre'] ?></td>
        <td><?php echo $fila['rfc'] ?></td>
        <td><?php echo $fila['nss'] ?></td>
        <?php
            $idEmpleado = $fila['idEmpleado'];
            $nombre = $fila['nombre'];
            $nombre = str_replace(" ","&nbsp;", $nombre);
            $rfc = $fila['rfc'];
            $nss = $fila['nss'];
        ?>
        <td><input type="button" value="Seleccionar" onclick="datosEmpleado('<?php echo $idEmpleado ?>','<?php echo $nombre ?>','<?php echo $rfc?>','<?php echo $nss ?>')"></td>
    </tr>
    <?php 
        } 
    ?>
</table>
    
</body>
</html>