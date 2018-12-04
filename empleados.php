<?php

    include "conexion.php";
    
    $accion = (isset($_POST['accion']))?$_POST['accion']:"";
   
    $sql = "";
    switch ($accion) {
        case "btnAgregar":
            //Creamos el query para insertar un registro en MySql, y lo mandamos utilizando mysqli_query();
            $sql = "INSERT INTO empleado(nombre,sueldo,departamento,seguro) VALUES('$nombre',$sueldo,'$depto','$seguro')";
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
            $sql = "UPDATE empleado SET nombre='$nombre',sueldo='$sueldo',departamento='$depto',seguro='$seguro' WHERE id=$id";
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
            $sql = "DELETE empleado WHERE id = $id";
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
            <a href="index.php">Inicio</a>
            <a href="nomina.php">Nomina</a>
            <a href="empleados.php">Empleados</a>
        </div>
</header>   
<body>
    <div class="contenedor">
        <a href="agregarEmpleado.php">
        <div class="carta">
            <img src="imagenes/agregarEmpleado.png">
            <a href="agregarEmpleado.php">Agregar</a>
        </div>
        </a>
        <!-- <div class="carta">
            <img src="imagenes/eliminarEmpleado.png">
            <a href="#">Eliminar</a>
        </div> -->
        <a href="mostrar.php">
        <div class="carta">
            <img src="imagenes/modificarEmpleado.png">
            <a href="mostrar.php">Mostrar</a>
        </div>
        </a>
    </div>
    <footer>
    </footer>
</body>
</html>