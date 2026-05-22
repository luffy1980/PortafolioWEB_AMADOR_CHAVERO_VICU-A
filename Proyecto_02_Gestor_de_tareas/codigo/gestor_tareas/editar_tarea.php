<?php
include("./conexion.php");

if (!isset($_GET["id"])) {
    die("Error: ID de tarea no proporcionado.");
}

$id_tarea = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevo_titulo = $_POST["nuevo_titulo"];
    $nueva_descripcion = $_POST["nueva_descripcion"];

    $sql = "UPDATE tareas SET titulo = ?, descripcion = ? WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssi", $nuevo_titulo, $nueva_descripcion, $id_tarea);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    mysqli_close($conexion);

    header("Location: index.php");
    exit();
}

$sql_select = "SELECT * FROM tareas WHERE id = ?";
$stmt_select = mysqli_prepare($conexion, $sql_select);

if ($stmt_select) {
    mysqli_stmt_bind_param($stmt_select, "i", $id_tarea);
    mysqli_stmt_execute($stmt_select);
    $resultado = mysqli_stmt_get_result($stmt_select);
    $fila = mysqli_fetch_assoc($resultado);

    if (!$fila) {
        die("Error: No se encontró ninguna tarea con ese ID.");
    }

    mysqli_stmt_close($stmt_select);
} else {
    die("Error en la consulta: " . mysqli_error($conexion));
}

mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarea</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <h1>Editar Tarea</h1>

        <form action="editar_tarea.php?id=<?php echo $id_tarea; ?>" method="POST">
            <label for="nuevo_titulo">Nuevo Título:</label>
            <input type="text" name="nuevo_titulo" id="nuevo_titulo" value="<?php echo htmlspecialchars($fila['titulo']); ?>" required>

            <label for="nueva_descripcion">Nueva Descripción:</label>
            <textarea name="nueva_descripcion" id="nueva_descripcion" required><?php echo htmlspecialchars($fila['descripcion']); ?></textarea>

            <button type="submit">Guardar Cambios</button>
        </form>

        <br>
        <a href="index.php">Volver al inicio</a>
    </div>
</body>
</html>
