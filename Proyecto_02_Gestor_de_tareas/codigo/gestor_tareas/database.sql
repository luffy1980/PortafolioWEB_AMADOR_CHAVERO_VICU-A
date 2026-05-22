CREATE DATABASE IF NOT EXISTS gestor_tareas CHARACTER SET utf8 COLLATE utf8_spanish_ci;

USE gestor_tareas;

CREATE TABLE IF NOT EXISTS tareas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    completada TINYINT(1) DEFAULT 0,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO tareas (titulo, descripcion, completada)
VALUES ('Hacer tarea', 'Completar proyecto de PHP', 0);
