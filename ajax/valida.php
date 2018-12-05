<?php

    include "../conexion.php";

    $tablaTmp = "";

    $sql = "SELECT idEmpleado,nombre,rfc,nss FROM empleado";

    if($_POST["texto"] != ""){

        $sql ="SELECT idEmpleado,nombre,rfc,nss FROM empleado where nombre LIKE '".$_POST["texto"]."%'";

    }

    $tmp="<table class='table table-hover' border='1px'>
            <tr style='color: Skyblue'>
                <td>Id Empleado</td>
                <td>Nombre</td>
                <td>RFC</td>
                <td>NSS</td>
            <tr>";
    $res=mysqli_query($conexion,$sql);
    while($fila=mysqli_fetch_array($res)){
            $idEmpleado = $fila['idEmpleado'];
                $nombre = $fila['nombre'];
                $nombre = str_replace(" ","&nbsp;", $nombre);
                $rfc = $fila['rfc'];
                $nss = $fila['nss'];
        $tmp.="<tr class='color: red'>
                <td>".$idEmpleado."</td>
                <td>".$nombre."</td>
                <td>".$rfc."</td>
                <td>".$nss."</td>
                <td><input type='button' value='Seleccionar' onClick=\"datosEmpleado('".$idEmpleado."','".$nombre."','".$rfc."','".$nss."')\"></td>
                </tr>";
    }
    $tmp.="</table>";
    echo $tmp;

?>