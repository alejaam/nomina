<?php
$servidor = "localhost";
$baseDatos = "nomina";
$nombreUsuario = "root";
$contraseña = "acatucontraseña";

// Creando la conexión 

$conexion = mysqli_connect($servidor,$nombreUsuario,$contraseña,$baseDatos);

// Checando la conexión

if(!$conexion){
    die("Conexión fallida: ".mysqli_connect_error());
}

echo "Conexión exitosa";
mysqli_close($conexion);
?>