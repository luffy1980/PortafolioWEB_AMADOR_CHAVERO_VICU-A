<?php
$host = "127.0.0.1";
$port = "3307";
$db   = "cita";

$pruebas = [
    ['user' => 'root', 'pass' => 'abcd1234', 'desc' => 'Clave del archivo config'],
    ['user' => 'root', 'pass' => '',         'desc' => 'Sin clave (estándar)'],
    ['user' => 'root', 'pass' => 'root',     'desc' => 'Clave "root"'],
];

echo "<h2>Iniciando diagnóstico de conexión...</h2>";

foreach ($pruebas as $p) {
    try {
        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";
        $con = new PDO($dsn, $p['user'], $p['pass']);
        echo "<p style='color:green'>✅ <b>ÉXITO:</b> Conectado con {$p['desc']} (Clave: '{$p['pass']}')</p>";
        exit; // Si una funciona, paramos.
    } catch (PDOException $e) {
        echo "<p style='color:red'>❌ <b>FALLÓ:</b> {$p['desc']} - Error: {$e->getCode()}</p>";
    }
}

echo "<h3>Ninguna funcionó. Intentando sin puerto (3306)...</h3>";
// Prueba final por si el puerto 3307 es solo para phpMyAdmin y no para MySQL
try {
    $con = new PDO("mysql:host=127.0.0.1;dbname=$db", "root", "abcd1234");
    echo "<p style='color:green'>✅ <b>ÉXITO:</b> Era el puerto estándar 3306.</p>";
} catch (Exception $e) {
    echo "<p style='color:red'>❌ También falló en puerto 3306.</p>";
}
?>