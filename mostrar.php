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
                        <!-- <a href="empleados.php">Agregar</a> -->
                        <a href="#">Pagar</a>
                        <!-- <a href="#">Eliminar</a> -->
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
            <th>ID</th>
            <th>Nombre</th>
            <th>Sueldo</th>
            <th>Departamento</th>
            <th>Seguro</th>
            <th><a href="agregarEmpleado.php"><button type="button">Nuevo</button></a></th>
        </tr>
        <?php foreach($conexion->query($sql) as $fila){?>
        <tr>
            <td><?php echo $fila['id'] ?></td>
            <td><?php echo $fila['nombre'] ?></td>
            <td><?php echo $fila['sueldo'] ?></td>
            <td><?php echo $fila['departamento'] ?></td>
            <td><?php echo $fila['seguro'] ?></td>
            <td><a href="modificarEmpleado.php"><button type="button">Modificar</button></a></td>
            <td><a href="eliminarEmpleado.php"><button type="button">Eliminar</button></a></td>
        </tr>
        <?php } ?>
</body>
    <footer>
    </footer>
</html>