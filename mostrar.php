<?php
        include "conexion.php";

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
            <div class="dropdown">
                <button class="dropbtn">Empleados</button>
                    <div class="dropdown-content">
                        <a href="empleados.php">Agregar</a>
                        <a href="mostrar.php">Mostrar</a>
                        <a href="#">Eliminar</a>
                    </div>
            </div> 
        </div>
        <!-- <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="novedades.html">Novedades</a></li>
                <li><a href="empleados.php">Consultar</a></li>
                <li><a href="ayuda.html">Ayuda</a></li>
            </ul>
        </nav> -->
</header>    
<body>
    <table border="1px">
        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Sueldo</td>
            <td>Departamento</td>
            <td>Seguro</td>
        </tr>
        <?php foreach($conexion->query($sql) as $fila){?>
        <tr>
            <td><?php echo $fila['id'] ?></td>
            <td><?php echo $fila['nombre'] ?></td>
            <td><?php echo $fila['sueldo'] ?></td>
            <td><?php echo $fila['departamento'] ?></td>
            <td><?php echo $fila['seguro'] ?></td>
        </tr>
        <?php } ?>

    <footer>
    
    </footer>
</body>
</html>