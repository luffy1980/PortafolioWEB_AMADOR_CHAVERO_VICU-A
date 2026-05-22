<?php
$servidor = "localhost";
$usuario = "root";
$password = "123456";
$base_datos = "gestor_tareas";

$conexion = mysqli_connect($servidor, $usuario, $password, $base_datos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
