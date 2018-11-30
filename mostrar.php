<?php
        include "conexion.php";
        
        $nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";
        $numTel = (isset($_POST['numTel']))?$_POST['numTel']:"";
        $email = (isset($_POST['email']))?$_POST['email']:"";
        $nombrePuesto = (isset($_POST['nombrePuesto']))?$_POST['nombrePuesto']:"";
        $nombreArea = (isset($_POST['nombreArea']))?$_POST['nombreArea']:"";
        
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
            <a href="index.html">Inicio</a>
            <a href="nomina.php">Nomina</a>
            <a href="empleados.php">Empleados</a>
        </div>
</header>      
<body>
    <!-- <form action="" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre;?>" id="nombre" required><br>
        <label for="">Numero de telefono:</label>
        <input type="number" name="numTel" value="<?php echo $numTel;?>" id="numTel" required><br>
        <label for="">email:</label>
        <input type="text" name="email" value="<?php echo $email;?>" id="email" required><br>
        <label for="">Puesto:</label>
        <input type="text" name="nombrePuesto" value="<?php echo $nombrePuesto;?>" id="nombrePuesto" required><br>
        <button value="btnAgregar" type="submit" name="accion">Agregar</button>
        <button value="btnModificar" type="submit" name="accion">Modificar</button>
        <button value="btnEliminar" type="submit" name="accion">Eliminar</button>
        <button value="btnCancelar" type="submit" name="accion">Cancelar</button>
    </form> -->
    <table border="1px">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>email</th>
            <th>Tipo Puesto</th>
            <th>Area</th>
            <th>Acción</th>
        </tr>

        <?php 
          
          $sql = "SELECT empl.*, pto.nombrePuesto, are.nombreArea FROM empleado empl INNER JOIN puesto pto ON empl.idPuesto = pto.idPuesto INNER JOIN area are ON empl.idArea = are.idArea";
          //mysqli_query($conexion, "SET NAMES 'utf8'");
          //$query = mysqli_query($conexion,$sql);
        foreach(mysqli_query($conexion,$sql) as $fila){?>
        <tr>
            <td><?php echo $fila['idEmpleado'] ?></td>
            <td><?php echo $fila['nombre'] ?></td>
            <td><?php echo $fila['numTel'] ?></td>
            <td><?php echo $fila['email'] ?></td>
            <td><?php echo $fila['nombrePuesto'] ?></td>
            <td><?php echo $fila['nombreArea'] ?></td>
            <td>
            <form action="" method="post">
                
                <input type="hidden" name="idEmpleado" value="<?php echo $fila['idEmpleado'] ?>">
                <input type="hidden" name="nombre" value="<?php echo $fila['nombre'] ?>">
                <input type="hidden" name="numTel" value="<?php echo $fila['numTel'] ?>">
                <input type="hidden" name="email" value="<?php echo $fila['email'] ?>">
                <input type="hidden" name="nombrePuesto" value="<?php echo $fila['nombrePuesto'] ?>">
                <input type="hidden" name="nombreArea" value="<?php echo $fila['nombreArea'] ?>">
                <input type="submit" value="Modificar" name="accion">
                
            </form>
            </td>
        </tr>
        <?php 
            } 
        ?>
        </table>
</body>
</html>