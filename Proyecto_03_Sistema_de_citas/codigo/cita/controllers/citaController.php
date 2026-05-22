<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once __DIR__ . "/../config/database.php";

// Seguridad: Si no hay sesión, al login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../views/login.php");
    exit();
}

$u_id = $_SESSION['user_id'];

// --- CASO 1: GUARDAR (POST) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guardar_cita'])) {
    $motivo = $_POST['motivo'];
    $fecha  = $_POST['fecha'];
    $hora   = $_POST['hora'];

    try {
        $stmt = $conexion->prepare("INSERT INTO citas (usuario_id, motivo, fecha, hora) VALUES (?, ?, ?, ?)");
        $stmt->execute([$u_id, $motivo, $fecha, $hora]);
        header("Location: ../views/ver_citas.php");
        exit();
    } catch (PDOException $e) {
        die("Error al guardar: " . $e->getMessage());
    }
} 

// --- CASO 2: ELIMINAR (GET) ---
elseif (isset($_GET['delete_id'])) {
    $id_cita = $_GET['delete_id'];

    try {
        // Solo eliminamos si la cita pertenece al usuario logueado (Seguridad)
        $stmt = $conexion->prepare("DELETE FROM citas WHERE id = ? AND usuario_id = ?");
        $stmt->execute([$id_cita, $u_id]);
        
        header("Location: ../views/ver_citas.php");
        exit();
    } catch (PDOException $e) {
        die("Error al eliminar: " . $e->getMessage());
    }
}

// --- CASO 3: ACCESO DIRECTO NO PERMITIDO ---
else {
    echo "<h2>Error de acceso</h2>";
    echo "No se ha enviado ninguna acción válida (guardar o eliminar).";
    echo "<br><a href='../views/dashboard.php'>Volver al inicio</a>";
}

ob_end_flush();
?>