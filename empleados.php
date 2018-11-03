<?php
    require_once "conexion.php";
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
    <form action="empleados.php" method="POST">
        <select name="empleado" onchange="">
            <option value="2"><?php echo $_POST['id'] ?></option>
        </select>
        <button type="submit">Buscar</button>
    </form>
</body>
</html>