<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Programar Cita</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div class="container">
        <h2>Programar Nueva Cita</h2>
        <form action="../controllers/citaController.php" method="POST">
            <label>Fecha:</label>
            <input type="date" name="fecha" required>

            <label>Hora:</label>
            <input type="time" name="hora" required>

            <label>Asunto / Motivo:</label>
            <input type="text" name="motivo" placeholder="Ej: Revisión de sistema" required>

            <button type="submit" name="guardar_cita">Guardar Cita</button>
            
            <br><br>
            <a href="dashboard.php">Volver al Panel</a>
        </form>
    </div>
</body>
</html>