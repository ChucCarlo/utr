<?php
$host = 'localhost';  // Tu host (generalmente 'localhost')
$usuario = 'root';    // Tu usuario de base de datos
$contraseña = '';     // Tu contraseña de base de datos
$base_de_datos = 'leyendas_db';  // El nombre de tu base de datos

// Crear conexión
$conn = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
