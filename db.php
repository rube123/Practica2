<?php
$host = "localhost";
$user = "root";
$pass = "1234";
$db   = "sakila";

// Crear conexión
$conn = new mysqli($host, $user, $pass, $db);

// Revisar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
