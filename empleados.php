<?php
    include "conexion.php";
    
    $nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";
    $sueldo = (isset($_POST['sueldo']))?$_POST['sueldo']:"";
    $depto = (isset($_POST['depto']))?$_POST['depto']:"";
    $seguro = (isset($_POST['seguro']))?$_POST['seguro']:"";
    $accion = (isset($_POST['accion']))?$_POST['accion']:"";

    switch ($accion) {
        case "btnAgregar":
            //Creamos el query para insertar un registro en MySql, y lo mandamos utilizando mysqli_query();
            $sql = "INSERT INTO prueba(nombre,sueldo,departamento,seguro) VALUES('$nombre',$sueldo,'$depto','$seguro')";
            $query = mysqli_query($conexion,$sql);
            //Validamos si mysqli_query(); retorna un true o un false para saber si pudo hacer la inserción
            if ($query) {
                // echo "archivo agregado con exito";
                // $success=sha1(md5("exito"));
                header("location: empleados.php?success");
            }else{
                // echo "no se pudo, subir hubo un error".mysqli_error($con)."<br>.".mysqli_errno($con);
                
                echo("Error description: " . mysqli_error($conexion));
            }
            /*echo $nombre;
            echo "Presionaste btnAgregar";*/
            break;
        case 'btnModificar':
            echo $nombre;
            echo "Presionaste btnModificar";
            break;
        case 'btnEliminar':
            echo $nombre;
            echo "Presionaste btnEliminar";
            break;
        case 'btnCancelar':
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
            <a href="index.html">Inicio</a>
            <a href="#news">Novedades</a>
            <div class="dropdown">
                <button class="dropbtn">Empleados</button>
                    <div class="dropdown-content">
                        <a href="empleados.php">Agregar</a>
                        <a href="mostrar.php">Mostrar</a>
                        <a href="#">Eliminar</a>
                    </div>
            </div> 
        </div>
</header>    
<body>
    <form action="" method="POST">
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
        <button value="btnCancelar" type="submit" name="accion">Cancelar</button>
    </form>
    <footer>
    </footer>
</body>
</html>