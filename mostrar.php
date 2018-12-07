<?php
        include "conexion.php";
        
        $idEmpleado = (isset($_POST['idEmpleado']))?$_POST['idEmpleado']:"";
        $nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";
        $numTel = (isset($_POST['numTel']))?$_POST['numTel']:"";
        $email = (isset($_POST['email']))?$_POST['email']:"";
        $idPuesto = (isset($_POST['idPuesto']))?$_POST['idPuesto']:"";
        $idArea = (isset($_POST['idArea']))?$_POST['idArea']:"";
        $tipoNomina = (isset($_POST['tipoNomina']))?$_POST['tipoNomina']:"";
        $genero = (isset($_POST['Genero']))?$_POST['Genero']:"";

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
            $sqlModificar = "UPDATE `empleado` SET `nombre` = '$nombre', `numTel` = '$numTel', `email` = '$email', `idPuesto` = '$idPuesto',`idArea` = '$idArea',`tipoNomina` = '$tipoNomina',`genero` = '$genero'  WHERE `empleado`.`idEmpleado` = $idEmpleado";
            $query = mysqli_query($conexion,$sqlModificar) or die (mysqli_error($conexion));
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
            $sql = "DELETE FROM `empleado` WHERE `empleado`.`idEmpleado` = '$idEmpleado'";
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
        <input type="hidden" name="idEmpleado" value="<?php echo $idEmpleado ?>" id="idEmpleado">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre;?>" id="nombre" required><br>
        <label for="">Numero de telefono:</label>
        <input type="number" name="numTel" value="<?php echo $numTel;?>" id="numTel" required><br>
        <label for="">email:</label>
        <input type="text" name="email" value="<?php echo $email;?>" id="email" required><br>
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
        Genero: <select name="genero">
                    <option value="H">Hombre</option>
                    <option value="M">Mujer</option>
                    <option value="O">Otro</option>
                </select>
        <!-- <label for="">Puesto:</label> -->
        <!-- <input type="text" name="nombrePuesto" value="<?php echo $nombrePuesto;?>" id="nombrePuesto" required><br> -->
        <!-- <button value="btnAgregar" type="submit" name="accion">Agregar</button> -->
        <button value="btnModificar" type="submit" name="accion">Modificar</button>
        <button value="btnEliminar" type="submit" name="accion">Eliminar</button>
        <!-- <button value="btnCancelar" type="reset" name="accion">Cancelar</button> -->
    </form>
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
          
          $sql = "SELECT empl.*, pto.*, are.* FROM empleado empl INNER JOIN puesto pto ON empl.idPuesto = pto.idPuesto INNER JOIN area are ON empl.idArea = are.idArea WHERE activo= 1";
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
                <input type="hidden" name="idPuesto" value="<?php echo $fila['nombrePuesto']?>">
                <input type="hidden" name="idArea" value="<?php echo $fila['nombreArea'] ?>">
                <input type="hidden" name="tipoNomina" value="<?php echo $fila['tipoNomina'] ?>">
                <input type="hidden" name="genero" value="<?php echo $fila['genero'] ?>">
                
                <input type="submit" value="Modificar" name="accion">
                
            </form>
            </td>
        </tr>
        <?php 
            } 
        ?>
        </table>
<footer>
</footer>
</body>
</html>