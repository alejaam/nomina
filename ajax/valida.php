<?php

    include "../conexion.php";

    $tablaTmp = "";

    //$sql = "SELECT idEmpleado,tipoNomina, nombre,rfc,nss FROM empleado";
    $sql = "SELECT E.idEmpleado,E.tipoNomina, E.nombre,E.rfc,E.nss,E.idPuesto,E.fechaIngreso,P.sueldoBase FROM empleado E, puesto P WHERE E.idPuesto = P.idPuesto and nombre LIKE '".$_POST["texto"]."%'";
    if($_POST["texto"] != ""){

        //$sql ="SELECT idEmpleado,tipoNomina,nombre,rfc,nss FROM empleado where nombre LIKE '".$_POST["texto"]."%'";
        $sql = "SELECT E.idEmpleado,E.tipoNomina, E.nombre,E.rfc,E.nss,E.idPuesto,E.fechaIngreso,P.sueldoBase FROM empleado E, puesto P WHERE E.idPuesto = P.idPuesto and nombre LIKE '".$_POST["texto"]."%'";
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
            $tipoNomina = $fila['tipoNomina'];
            $nombre = $fila['nombre'];
            $nombre = str_replace(" ","&nbsp;", $nombre);
            $rfc = $fila['rfc'];
            $nss = $fila['nss'];
            $sueldoBase = $fila['sueldoBase'];
            $fechaIngreso = $fila['fechaIngreso'];
            
        $tmp.="<tr class='color: red'>
                <td>".$idEmpleado."</td>
                <td>".$nombre."</td>
                <td>".$rfc."</td>
                <td>".$nss."</td>
                <td><input type='button' value='Seleccionar' onClick=\"calcularNomina('".$idEmpleado."','".$tipoNomina."','".$nombre."','".$rfc."','".$nss."','".$sueldoBase."','".$fechaIngreso."')\"></td>
                </tr>";
    }
    $tmp.="</table>";
    echo $tmp;

?>