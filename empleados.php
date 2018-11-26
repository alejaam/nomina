<?php

    function agregarEmpleado($nombre,$sueldo,$depto,$seguro){

    }

    include "conexion.php";
    
    $id = (isset($_POST['id']))?$_POST['id']:"";    
    $nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";
    $sueldo = (isset($_POST['sueldo']))?$_POST['sueldo']:"";
    $depto = (isset($_POST['depto']))?$_POST['depto']:"";
    $seguro = (isset($_POST['seguro']))?$_POST['seguro']:"";

    $accion = (isset($_POST['accion']))?$_POST['accion']:"";
    $sql = "";
    switch ($accion) {
        case "btnAgregar":
            //Creamos el query para insertar un registro en MySql, y lo mandamos utilizando mysqli_query();
            $sql = "INSERT INTO prueba(nombre,sueldo,departamento,seguro) VALUES('$nombre',$sueldo,'$depto','$seguro')";
            $query = mysqli_query($conexion,$sql) or die (mysqli_error($conexion));
            //Validamos si mysqli_query(); retorna un true o un false para saber si pudo hacer la inserción
            if ($query) {
                echo "Empleado agregado con éxito";
                header("location: empleados.php?success");
            }else{
                
                echo "No se pudo agregar empleado, error: ".mysqli_error($con)."<br>.".mysqli_errno($con);
                
                //echo("Error description: " . mysqli_error($conexion));
            }
            /*echo $nombre;
            echo "Presionaste btnAgregar";*/
            break;
        case "btnModificar":
            //Creamos el query para modificar un registro en MySql, y lo mandamos utilizando mysqli_query();
            $sql = "UPDATE prueba SET nombre='$nombre',sueldo='$sueldo',departamento='$depto',seguro='$seguro' WHERE id=$id";
            $query = mysqli_query($conexion,$sql) or die (mysqli_error($conexion));
            //Validamos si mysqli_query(); retorna un true o un false para saber si pudo hacer la inserción
            if ($query) {
                echo "Empleado modificado con éxito";
                header("location: empleados.php?success"); 
            }else{
                
                echo "No se pudo agregar empleado, error: ".mysqli_error($con)."<br>.".mysqli_errno($con);
                
                //echo("Error description: " . mysqli_error($conexion));
            }

            
            echo "Presionaste btnModificar";
            break;
        case "btnEliminar":

            //Creamos el query para eliminar un registro en MySql, y lo mandamos utilizando mysqli_query();
            $sql = "DELETE FROM prueba WHERE id = $id";
            $query = mysqli_query($conexion,$sql) or die (mysqli_error($conexion));
            //Validamos si mysqli_query(); retorna un true o un false para saber si pudo hacer la inserción
            if ($query) {
                echo "Empleado modificado con éxito";
                header("location: empleados.php?success"); 
            }else{
                
                echo "No se pudo agregar empleado, error: ".mysqli_error($con)."<br>.".mysqli_errno($con);
                
                //echo("Error description: " . mysqli_error($conexion));
            }

            echo $nombre;
            echo "Presionaste btnEliminar";
            break;
        case "btnCancelar":
            echo $nombre;
            echo "Presionaste btnCancelar";
            break;
        default:
            # code...
            break;
    }
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
</head>
<header>
        <h1>Nómina</h1>
        <div class="navbar">
            <a href="index.html">Inicio</a>
            <a href="#news">Novedades</a>
            <a href="empleados.php">Empleados</a>
        </div>
</header>   
<body>
    <!--<div class="contenedor">
        <a href="agregarEmpleado.php">
        <div class="carta">
            <img src="imagenes/agregarEmpleado.png">
            <a href="agregarEmpleado.php">Agregar</a>
        </div>
        </a>
        <div class="carta">
            <img src="imagenes/eliminarEmpleado.png">
            <a href="#">Eliminar</a>
        </div>
        <div class="carta">
            <img src="imagenes/modificarEmpleado.png">
            
            <a href="mostrar.php">Mostrar</a>
        </div>
    </div>-->
    <form action="" method="post">
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre;?>" id="nombre" required><br>
        <label for="">Sueldo:</label>
        <input type="number" name="sueldo" value="<?php echo $sueldo;?>" id="sueldo" required><br>
        <label for="">Departamento:</label>
        <input type="text" name="depto" value="<?php echo $depto;?>" id="depto" required><br>
        <label for="">NSS:</label>
        <input type="text" name="seguro" value="<?php echo $seguro;?>" id="seguro" required><br>
        <button value="btnAgregar" type="submit" name="accion">Agregar</button>
        <button value="btnModificar" type="submit" name="accion">Modificar</button>
        <button value="btnEliminar" type="submit" name="accion">Eliminar</button>
        <button value="btnCancelar" type="clean" name="accion">Cancelar</button>
    </form>
    <table border="1px">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Sueldo</th>
            <th>Departamento</th>
            <th>Seguro</th>
            <th>Acción</th>
        </tr>
        <?php
            
            $sql = "SELECT * FROM empleado";

            foreach(mysqli_query($conexion,$sql) as $fila){
        ?>
        <tr>
            <td><?php echo $fila['id'] ?></td>
            <td><?php echo $fila['nombre'] ?></td>
            <td><?php echo $fila['sueldo'] ?></td>
            <td><?php echo $fila['departamento'] ?></td>
            <td><?php echo $fila['seguro'] ?></td>
            <td>
            <form action="" method="post">
                
                <input type="hidden" name="id" value="<?php echo $fila['id'] ?>">
                <input type="hidden" name="nombre" value="<?php echo $fila['nombre'] ?>">
                <input type="hidden" name="sueldo" value="<?php echo $fila['sueldo'] ?>">
                <input type="hidden" name="depto" value="<?php echo $fila['departamento'] ?>">
                <input type="hidden" name="seguro" value="<?php echo $fila['seguro'] ?>">

                <input type="submit" value="Seleccionar" name="accion">
            </form>
            </td>
           
        </tr>
        <?php } ?>
    <footer>
    </footer>
</body>
</html>