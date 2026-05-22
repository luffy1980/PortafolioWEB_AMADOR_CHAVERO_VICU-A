<?php
session_start();

// Seguridad: Si el usuario no ha iniciado sesión, lo mandamos al login 
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Citas - Sistema de Gestión</title>
    <link rel="stylesheet" href="../css/estilos.css"> </head>
<body>
    <div class="container">
        <header>
            <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['user_name']); ?></h1>
            <nav>
                <a href="../controllers/logout.php">Cerrar Sesión</a>
            </nav>
        </header>

        <main>
            <section>
                <h2>Menú Principal</h2>
                <p>Selecciona una opción para gestionar tus citas.</p>
                
                <div class="menu-opciones">
                    <ul>
                        <li><a href="crear_cita.php">📅 Programar Nueva Cita</a></li> <li><a href="ver_citas.php">📋 Ver y Gestionar Mis Citas</a></li> </ul>
                </div>
            </section>
        </main>

        <footer>
            <p>Ingeniería Informática - Desarrollo de Aplicaciones Web</p>
        </footer>
    </div>
</body>
</html>