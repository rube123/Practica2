<?php
$host = "localhost";
$user = "21030305";
$pass = "21030305";
$db   = "sakila";

// Crear conexión
$conn = new mysqli($host, $user, $pass, $db);

// Revisar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
