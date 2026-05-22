<?php
session_start();
require_once __DIR__ . "/../config/database.php";

// REGISTRO
if (isset($_POST['register'])) {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $pass = $_POST['password'];

    $hash = password_hash($pass, PASSWORD_DEFAULT);
    try {
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$nombre, $email, $hash]);
        header("Location: ../views/login.php?reg=success");
    } catch (Exception $e) {
        die("Error al registrar: " . $e->getMessage());
    }
}

// LOGIN
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $pass = $_POST['password'];

    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nombre'];
        header("Location: ../views/dashboard.php");
    } else {
        header("Location: ../views/login.php?error=1");
    }
}
?>