<?php

    include "conexion.php";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Sistema de nómina</title>
    <link rel="stylesheet" type="text/css" media="screen" href="estilos/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Open+Sans|Roboto" rel="stylesheet"> 
    <script src="main.js"></script>
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
    <table border="1px">
        <tr>        
            <th>Id Nomina</th>
            <th>Id Empleado</th>
            <th>nominaNeto</th>
            <th>concepto</th>
            <th>fecha</th>
            <th>tipoNomina</th>
            <th>Acción</th>
        </tr>

        <?php 
          
          $sql = "SELECT empl.*, nom.*, pto.* FROM empleado empl INNER JOIN puesto pto ON empl.idPuesto = pto.idPuesto INNER JOIN nomina nom ON empl.idEmpleado = nom.idEmpleado WHERE empl.activo= 1";
          //mysqli_query($conexion, "SET NAMES 'utf8'");
          //$query = mysqli_query($conexion,$sql);
        foreach(mysqli_query($conexion,$sql) as $fila){?>
        <tr>
            <td><?php echo $fila['idNomina'] ?></td>
            <td><?php echo $fila['idEmpleado'] ?></td>
            <td><?php echo $fila['nominaNeto'] ?></td>
            <td><?php echo $fila['concepto'] ?></td>
            <td><?php echo $fila['fecha'] ?></td>
            <td><?php echo $fila['tipoNomina'] ?></td>
                
            <td>
            <form action="verNomina.php" method="POST">
            
                <input type="hidden" name="idNomina" value="<?php echo $fila['idNomina'] ?>">
                <input type="hidden" name="idEmpleado" value="<?php echo $fila['idEmpleado'] ?>">
                <input type="hidden" name="nominaNeto" value="<?php echo $fila['nominaNeto'] ?>">
                <input type="hidden" name="concepto" value="<?php echo $fila['concepto'] ?>">
                <input type="hidden" name="fecha" value="<?php echo $fila['fecha']?>">
                <input type="hidden" name="tipoNomina" value="<?php echo $fila['tipoNomina'] ?>">
                <input type="hidden" name="fondoAhorro" value="<?php echo $fila['fondoAhorro'] ?>">
                <input type="hidden" name="valesDespensa" value="<?php echo $fila['valesDespensa'] ?>">
                <input type="hidden" name="ayudaGasolina" value="<?php echo $fila['ayudaGasolina'] ?>">
                <input type="hidden" name="primaVacacional" value="<?php echo $fila['primaVacacional'] ?>">
                <input type="hidden" name="totalPercepcion" value="<?php echo $fila['totalPercepcion']?>">
                <input type="hidden" name="totalDeduccion" value="<?php echo $fila['totalDeduccion'] ?>">
                <input type="hidden" name="isr" value="<?php echo $fila['isr'] ?>">
                <input type="hidden" name="imss" value="<?php echo $fila['imss'] ?>">
                <input type="hidden" name="infonavit" value="<?php echo $fila['infonavit'] ?>">
                <input type="hidden" name="faltas" value="<?php echo $fila['faltas'] ?>">
                <input type="hidden" name="retardos" value="<?php echo $fila['retardos'] ?>">
                <input type="hidden" name="bonoProductividad" value="<?php echo $fila['bonoProductividad'] ?>">
                <input type="hidden" name="aguinaldo" value="<?php echo $fila['aguinaldo']?>">
                <input type="hidden" name="sueldoBase" value="<?php echo $fila['sueldoBase']?>">
                <input type="hidden" name="rfc" value="<?php echo $fila['rfc']?>">
                <input type="hidden" name="nss" value="<?php echo $fila['nss']?>">
                <input type="hidden" name="tiempoExtra" value="<?php echo $fila['tiempoExtra']?>">
                
                <input type="submit" value="Ver Nomina" name="accion">
                <?php 
                    } 
                ?>
            </form>
            </td>
            
        </tr>
        
        </table>
</body>
</html>