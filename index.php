<?php

session_start();

if(isset($_SESSION['nombre_usuario'])){
    header('location: login/index.html');
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
    <center><h2>BIENVENIDO AL SISTEMA DE NOMINA</h2></center>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, expedita dolorem velit consequatur minima aspernatur reprehenderit excepturi dolorum pariatur beatae deserunt illum a cupiditate omnis voluptate odio harum sed ullam!
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum adipisci in blanditiis officiis repellat voluptatem voluptates, hic expedita distinctio rerum? Suscipit, laborum dolore quam quos quidem sed fugit accusamus eos!
    Lorem ipsum, dolor sit amet co  nsectetur adipisicing elit. Nihil facilis eveniet, ducimus corrupti, vel repudiandae deserunt fuga dolor ratione blanditiis iusto architecto sunt odio ullam minima dicta exercitationem, cupiditate eum.
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit debitis incidunt adipisci id maiores cumque obcaecati aliquam recusandae accusamus atque, at nisi unde, possimus vel in, iste voluptatibus hic soluta?
    Lorem ipsum dolor sit amet consectetur adipisicing elit. At, tenetur. Ex nostrum modi assumenda officia nulla sequi deserunt explicabo. Facere voluptatum repellat sapiente incidunt eos eveniet minima a rerum pariatur!
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero distinctio, nisi et illum, cupiditate sunt accusamus nihil temporibus perferendis harum iure quo placeat, porro quam ratione autem illo recusandae praesentium!
    
    <footer>
        <div class="infooter">
            <center>Todos los derechos reservados.</center>
        </div>
    </footer>
    
</body>
</html>