<?php

    include "conexion.php";

    //$idEmpleado = (isset($_POST['idEmpleado']))?$_POST['idEmpleado']:"";    
    $nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";
    $numTel = (isset($_POST['numTel']))?$_POST['numTel']:"";
    $email = (isset($_POST['email']))?$_POST['email']:"";
    $idPuesto = (isset($_POST['idPuesto']))?$_POST['idPuesto']:"";
    $idArea = (isset($_POST['idArea']))?$_POST['idArea']:"";    
    $tipoNomina = (isset($_POST['tipoNomina']))?$_POST['tipoNomina']:"";
    $direccion = (isset($_POST['direccion']))?$_POST['direccion']:"";
    $rfc = (isset($_POST['rfc']))?$_POST['rfc']:"";
    $nss = (isset($_POST['nss']))?$_POST['nss']:"";
    $genero = (isset($_POST['genero']))?$_POST['genero']:"";

    $accion = (isset($_POST['accion']))?$_POST['accion']:"";
    
    switch ($accion) {
        case "btnAgregar":
            //Creamos el query para insertar un registro en MySql, y lo mandamos utilizando mysqli_query();
            //mysqli_query($conexion,"SET FOREIGN_KEY_CHECKS=0");
            //$sql = "INSERT INTO empleado (nombre, numTel, email, idPuesto, idArea, tipoNomina, direccion, rfc, nss, genero, fechaIngreso, activo) VALUES ('$nombre', $numTel, '$email', $idPuesto, $idArea, $tipoNomina, '$direccion', '$rfc', '$nss', '$genero', CURDATE(), 1)";
            $agregarEmpleado = "INSERT INTO `empleado` (`idEmpleado`, `nombre`, `numTel`, `email`, `idPuesto`, `idArea`, 
                                            `tipoNomina`, `direccion`, `rfc`, `nss`, `genero`, `fechaIngreso`, 
                                            `activo`) 
                    VALUES (NULL, '$nombre', $numTel, '$email', '$idPuesto', '$idArea', '$tipoNomina', '$direccion',
                             '$rfc', '$nss', '$genero', CURDATE(), 1)";
            $query = mysqli_query($conexion,$agregarEmpleado) or die (mysqli_error($conexion));
            //Validamos si mysqli_query(); retorna un true o un false para saber si pudo hacer la inserción
            if ($query) {
                echo "<script>alert('Empleado agregado con éxito')</script>";
                header("location: empleados.php?success");
            }else{
                
                echo "No se pudo agregar empleado, error: ".mysqli_error($con)."<br>.".mysqli_errno($con);
                
                //echo("Error description: " . mysqli_error($conexion));
            }
            
            /*echo $nombre;
            echo "Presionaste btnAgregar";*/
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
    <form action="" method="POST">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre;?>" id="nombre" required ><br>
        <label for="">numTel:</label>
        <input type="number" name="numTel" value="<?php echo $numTel;?>" id="numTel" required><br>
        <label for="">email:</label>
        <input type="email" name="email" value="<?php echo $email;?>" id="email" required><br>
        Puesto: <select name="idPuesto">
            <?php
                $obteneridPuesto = "SELECT idPuesto, nombrePuesto,sueldoBase FROM puesto";
                foreach(mysqli_query($conexion,$obteneridPuesto) as $fila){
            ?>
                <option value="<?php echo $fila['idPuesto']?>"><?php echo $fila['nombrePuesto']?></option>
                
            <?php } ?>
            <input type="hidden" name="sueldoBase" value="<?php echo $fila['sueldoBase']?>">
        </select>
         Area: <select name="idArea">
            <?php
            
                $obteneridArea = "SELECT idArea, nombreArea FROM area";
                foreach(mysqli_query($conexion,$obteneridArea) as $fila){
            ?>
                <option value="<?php echo $fila['idArea']?>"><?php echo $fila['nombreArea']?></option>
            <?php } ?>
        </select>
        Tipo de Nomina: <select name="tipoNomina">
            <option value="Q">Quincenal</option>
            <option value="S">Semanal</option>
        </select><br>
        Dirección: <input type="textarea" name="direccion" id="direccion">
        RFC: <input type="text" name="rfc" id="rfc">
        NSS: <input type="text" name="nss" value="<?php echo $nss;?>" id="nss" required><br>
        Genero: <select name="genero">
                    <option value="H">Hombre</option>
                    <option value="M">Mujer</option>
                    <option value="O">Otro</option>
                </select>
        <button value="btnAgregar" type="submit" name="accion">Agregar</button>
    </form>
    <footer>
    </footer>
</body>
</html>