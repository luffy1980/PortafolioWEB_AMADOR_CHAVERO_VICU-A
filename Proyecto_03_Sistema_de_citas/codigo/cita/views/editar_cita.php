<?php
session_start();
require_once __DIR__ . "/../config/database.php";
$stmt = $conexion->prepare("SELECT * FROM citas WHERE id = ? AND usuario_id = ?");
$stmt->execute([$_GET['id'], $_SESSION['user_id']]);
$cita = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div class="container">
        <form action="../controllers/citaController.php" method="POST">
            <input type="hidden" name="id" value="<?= $cita['id'] ?>">
            <input type="text" name="motivo" value="<?= $cita['motivo'] ?>" required>
            <input type="date" name="fecha" value="<?= $cita['fecha'] ?>" required>
            <input type="time" name="hora" value="<?= $cita['hora'] ?>" required>
            <button type="submit" name="actualizar_cita">Actualizar</button>
        </form>
    </div>
</body>
</html>