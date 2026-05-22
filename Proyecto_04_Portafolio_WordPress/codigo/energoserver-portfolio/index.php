<?php get_header(); ?>

<section class="hero">
    <h1>Portafolio EnergoServer</h1>
    <p>Sistema de monitoreo de consumo eléctrico en tiempo real, diseñado para visualizar datos, detectar consumo innecesario y apoyar la optimización energética.</p>
    <a href="#portafolio" class="btn">Ver proyecto</a>
</section>

<main class="contenedor">
    <section id="sobre-mi">
        <h2>Sobre mí</h2>
        <p>
            Estudiante de Ingeniería Informática con interés en desarrollo web,
            bases de datos, sistemas Linux, redes y ciberseguridad.
            Este portafolio presenta proyectos tecnológicos desarrollados durante la formación académica.
        </p>
    </section>

    <section id="servicios">
        <h2>Servicios Profesionales</h2>

        <div class="tarjetas">
            <div class="tarjeta">
                <h3>Desarrollo Web</h3>
                <p>Creación de sitios web, portafolios y aplicaciones con tecnologías modernas.</p>
            </div>

            <div class="tarjeta">
                <h3>Monitoreo Energético</h3>
                <p>Propuestas para visualizar consumo eléctrico y detectar consumo vampiro.</p>
            </div>

            <div class="tarjeta">
                <h3>Optimización de Sistemas</h3>
                <p>Configuración y mejora de sistemas operativos, servidores y bases de datos.</p>
            </div>
        </div>
    </section>

    <section id="portafolio">
        <h2>Portafolio EnergoServer</h2>

        <div class="tarjetas">
            <div class="tarjeta">
                <h3>EnergoServer</h3>
                <p>
                    Plataforma enfocada en el monitoreo del consumo eléctrico en tiempo real.
                    Permite analizar dispositivos, consultar datos mediante dashboard y apoyar el ahorro energético.
                </p>
            </div>

            <div class="tarjeta">
                <h3>Sistema CRUD de Trabajadores</h3>
                <p>Sistema web para la gestión de empleados, desarrollado con backend y base de datos.</p>
            </div>

            <div class="tarjeta">
                <h3>Gestor de Tareas</h3>
                <p>Aplicación CRUD para crear, editar, marcar como completadas y eliminar tareas.</p>
            </div>
        </div>
    </section>

    <section id="contacto">
        <h2>Contacto</h2>
        <p>Correo: leonvicuna986@gmail.com</p>
        <p>Ubicación: Gómez Palacio, Durango</p>
        <p>Horario de atención: Lunes a viernes</p>

        <form>
            <input type="text" placeholder="Nombre">
            <input type="email" placeholder="Correo electrónico">
            <textarea placeholder="Mensaje"></textarea>
            <button type="submit">Enviar mensaje</button>
        </form>
    </section>
</main>

<?php get_footer(); ?>
