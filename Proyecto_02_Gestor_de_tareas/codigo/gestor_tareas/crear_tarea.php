<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Nueva Tarea</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <h1>Crear Nueva Tarea</h1>

        <form action="procesar_creacion_tarea.php" method="POST">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" required>

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" required></textarea>

            <button type="submit">Crear Tarea</button>
        </form>

        <br>
        <a href="index.php">Volver al inicio</a>
    </div>
</body>
</html>
