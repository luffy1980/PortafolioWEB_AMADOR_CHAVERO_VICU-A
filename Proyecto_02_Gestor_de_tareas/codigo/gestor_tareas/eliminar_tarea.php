<?php
if (isset($_GET["id"])) {
    $id_tarea = $_GET["id"];

    include("./conexion.php");

    $sql = "DELETE FROM tareas WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_tarea);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    mysqli_close($conexion);

    header("Location: index.php");
    exit();
} else {
    echo "Error: ID de tarea no proporcionado.";
}
?>
