<?php
    require_once "conexion.php";
    
    $nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
    $sueldo=(isset($_POST['sueldo']))?$_POST['sueldo']:"";
    $depto=(isset($_POST['depto']))?$_POST['depto']:"";
    $seguro=(isset($_POST['seguro']))?$_POST['seguro']:"";
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    switch ($accion) {
        case "btnAgregar":
            echo $nombre;
            echo "Presionaste btnAgregar";
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
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Open+Sans" rel="stylesheet"> 
    <script src="main.js"></script>
</head>
<header>
        <h1>Nómina</h1>
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="novedades.html">Novedades</a></li>
                <li><a href="empleados.php">Consultar</a></li>
                <li><a href="ayuda.html">Ayuda</a></li>
            </ul>
        </nav>
</header>    
<body>
    <form action="" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre;?>" placeholder="" id="nombre" require=""><br>
        <label for="">Sueldo:</label>
        <input type="number" name="sueldo" value="<?php echo $sueldo;?>" placeholder="" id="sueldo" require=""><br>
        <label for="">Departamento:</label>
        <input type="text" name="depto" value="<?php echo $depto;?>" placeholder="" id="depto" require=""><br>
        <label for="">NSS:</label>
        <input type="text" name="seguro" value="<?php echo $seguro;?>" placeholder="" id="seguro" require=""><br>

        <button value="btnAgregar" type="submit" name="accion">Agregar</button>
        <button value="btnModificar" type="submit" name="accion">Modificar</button>
        <button value="btnEliminar" type="submit" name="accion">Eliminar</button>
        <button value="btnCancelar" type="submit" name="accion">Cancelar</button>
    </form>
</body>
</html>