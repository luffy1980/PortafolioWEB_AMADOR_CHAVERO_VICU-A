<?php
$host = "127.0.0.1";
$port = "3308"; // Tu puerto específico
$db   = "cita";
$user = "root";
$pass = "abcd1234"; // Tu contraseña real

try {
    $conexion = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error crítico de conexión: " . $e->getMessage());
}
?>