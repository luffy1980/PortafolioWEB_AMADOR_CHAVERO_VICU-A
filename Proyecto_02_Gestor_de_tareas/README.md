# Proyecto 02 — Gestor de tareas

## Objetivo del proyecto

Desarrollar una aplicación web para gestionar tareas, permitiendo crear, editar, eliminar y marcar tareas como completadas.

## Problema que resuelve

Este proyecto permite organizar actividades mediante una aplicación web sencilla, utilizando una base de datos para almacenar la información de las tareas.

## Tecnologías utilizadas

- HTML
- CSS
- PHP
- MySQL
- Git
- GitHub
- Navegador web

## Conceptos aplicados

- Conexión a base de datos.
- Operaciones CRUD.
- Formularios web.
- Manejo de tareas.
- Organización de archivos.
- Control de versiones con GitHub.

## Explicación del funcionamiento

El gestor de tareas funciona mediante archivos PHP conectados a una base de datos MySQL. El sistema permite registrar nuevas tareas, mostrar la lista de tareas guardadas, editar la información, eliminar registros y marcar tareas como completadas.

El archivo `index.php` muestra la interfaz principal del sistema. El archivo `crear_tarea.php` permite registrar una nueva tarea. Los archivos `editar_tarea.php`, `eliminar_tarea.php` y `marcar_como_completada.php` permiten modificar el estado o la información de las tareas. La conexión con la base de datos se realiza mediante el archivo `conexion.php`.

## Estructura del proyecto

```text
Proyecto_02_Gestor_de_tareas/
├── codigo/
│   └── gestor_tareas/
│       ├── conexion.php
│       ├── crear_tarea.php
│       ├── database.sql
│       ├── editar_tarea.php
│       ├── eliminar_tarea.php
│       ├── estilos.css
│       ├── index.php
│       ├── marcar_como_completada.php
│       └── procesar_creacion_tarea.php
├── capturas/
└── README.md
