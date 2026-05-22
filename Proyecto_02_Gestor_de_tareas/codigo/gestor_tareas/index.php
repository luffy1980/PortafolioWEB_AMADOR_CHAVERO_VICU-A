<?php
include("./conexion.php");

$sql = "SELECT * FROM tareas ORDER BY id DESC";
$resultado = mysqli_query($conexion, $sql);

if (!$resultado) {
    die("Error en la consulta SQL: " . mysqli_error($conexion));
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Tareas</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <h1>Gestor de Tareas</h1>

        <a href="crear_tarea.php" class="btn-nueva">Crear Nueva Tarea</a>

        <?php
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<div class='tarea'>";
                echo "<h2>" . htmlspecialchars($fila['titulo']) . "</h2>";
                echo "<p>" . htmlspecialchars($fila['descripcion']) . "</p>";

                $estado = ($fila['completada'] == 1) ? "Completada" : "Pendiente";
                echo "<p><strong>Estado:</strong> " . $estado . "</p>";

                echo "<div class='acciones'>";
                if ($fila['completada'] == 0) {
                    echo "<a href='marcar_como_completada.php?id=" . $fila['id'] . "'>Completar</a> | ";
                }
                echo "<a href='editar_tarea.php?id=" . $fila['id'] . "'>Editar</a> | ";
                echo "<a href='eliminar_tarea.php?id=" . $fila['id'] . "' onclick='return confirm(\"¿Seguro que deseas eliminar esta tarea?\")'>Eliminar</a>";
                echo "</div>";

                echo "</div>";
            }
        } else {
            echo "<p>No hay tareas registradas.</p>";
        }

        mysqli_close($conexion);
        ?>
    </div>
</body>
</html>
