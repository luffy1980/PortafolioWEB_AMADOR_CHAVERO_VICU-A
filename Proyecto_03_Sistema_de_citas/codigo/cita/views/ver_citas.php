<?php
session_start();
require_once __DIR__ . "/../config/database.php";

// 1. Añadimos el exit() para evitar ejecuciones fantasma
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit(); 
}

// 2. Traemos las citas (Tu consulta está perfecta)
$stmt = $conexion->prepare("SELECT * FROM citas WHERE usuario_id = ? ORDER BY fecha ASC");
$stmt->execute([$_SESSION['user_id']]);
$citas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Citas</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div class="container">
        <h2>Mis Citas Programadas</h2>
        
        <?php if (count($citas) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Asunto</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($citas as $c): ?>
                    <tr>
                        <td><?= htmlspecialchars($c['motivo']) ?></td>
                        <td><?= date("d/m/Y", strtotime($c['fecha'])) ?></td>
                        <td><?= date("h:i a", strtotime($c['hora'])) ?></td>
                        <td>
                            <a href="../controllers/citaController.php?delete_id=<?= $c['id'] ?>" 
                               class="btn-eliminar"
                               onclick="return confirm('¿Seguro que quieres borrar esta cita?')">
                               Eliminar
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No tienes citas programadas actualmente.</p>
        <?php endif; ?>

        <br>
        <a href="dashboard.php" class="btn-volver">Volver al Panel</a>
        <a href="crear_cita.php" class="btn-nueva">Programar Nueva Cita</a>
    </div>
</body>
</html>