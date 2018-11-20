<?php
        include "conexion.php";
    
        $nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";
        $sueldo = (isset($_POST['sueldo']))?$_POST['sueldo']:"";
        $depto = (isset($_POST['depto']))?$_POST['depto']:"";
        $seguro = (isset($_POST['seguro']))?$_POST['seguro']:"";
        $accion = (isset($_POST['accion']))?$_POST['accion']:"";
        
        $sql = "SELECT * FROM prueba";
        $query = mysqli_query($conexion,$sql);
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
            <a href="empleados.php">Empleados</a>
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
    <table border="1px">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Sueldo</th>
            <th>Departamento</th>
            <th>Seguro</th>
            <th><a href="agregarEmpleado.php"><button type="button">Nuevo</button></a></th>
        </tr>
        <?php foreach(mysqli_query($conexion,$sql) as $fila){?>
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
</body>
    <footer>
    </footer>
</html>