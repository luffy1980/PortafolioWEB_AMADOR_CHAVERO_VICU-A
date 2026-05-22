<?php
include("./conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];

    $sql = "INSERT INTO tareas (titulo, descripcion, completada) VALUES (?, ?, 0)";
    $stmt = mysqli_prepare($conexion, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $titulo, $descripcion);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error al ejecutar: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la preparación: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>
