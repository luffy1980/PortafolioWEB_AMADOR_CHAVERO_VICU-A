<?php
session_start();
// Si YA está logueado, lo mandamos al panel directamente
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistema de Citas</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form action="../controllers/authController.php" method="POST">
        <input type="email" name="email" placeholder="Correo" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit" name="login">Entrar</button>
    </form>
</body>
</html>