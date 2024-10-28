<?php
include 'template (layout)/cabecera.php';
 
?>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    header {
        background-color: #333;
        color: #fff;
        padding: 5px 20px;
        text-align: center;
        height: 50px;
    }

    header h1 {
        font-size: 18px;
        margin: 10px;
    }

    .hero {
        display: flex;
        background-image: url('img/gafas.jpg');
        background-size: cover;
        background-position: center;
        height: 550px;
        color: white;
        padding: 0;
        align-items: flex-start;
    }

    .hero .hero-image {
        flex: 1;
        height: 100%;
    }

    .hero .hero-text {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-end;
        padding: 176px;
        text-align: right;
    }

    .hero h1 {
        font-size: 50px;
        margin: 0;
    }

    .hero p {
        font-size: 24px;
        margin: 20px 0;
    }

    section {
        padding: 40px;
        text-align: center;
    }

    section h2 {
        font-size: 36px;
        color: #333;
    }

    section p {
        font-size: 18px;
        color: #666;
        margin: 20px auto;
        max-width: 600px;
    }

    .service {
        display: flex;
        justify-content: space-around;
        margin: 40px 0;
    }

    .service div {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 30%;
    }

    .service img {
        width: 100%;
        border-radius: 5px;
    }

    /* Carousel de Empresas Aliadas con 3 cartas */
    .carousel .carousel-item {
        display: flex;
    }

    .carousel-item>div {
        flex: 1;
        padding: 15px;
    }

    .carousel .carousel-inner {
        display: flex;
    }

    .carousel img {
        width: 100%;
        border-radius: 10px;
    }

    /* Estilos adicionales para el formulario */
    .fondo-oscuro {
        background-color: #001f3f; /* Azul oscuro */
        padding: 60px 0;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .formulario-contacto {
        width: 50%;
        background-color: #fff;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 60px;
    }

    /* Icono de WhatsApp flotante */
    .whatsapp-float {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #25d366;
        color: white;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 1000;
    }

    .whatsapp-float:hover {
        background-color: #128c7e;
    }

    .whatsapp-float i {
        font-size: 30px;
    }
</style>
</head>
<body>
    <header>
        <h1>CompuPrice, Tu mejor Aliado Tecnológico</h1>
    </header>

    <div class="hero">
        <div class="hero-image"></div>
        <div class="hero-text">
            <h1>Potencia tu negocio con la tecnología del futuro</h1>
            <p>Descubre cómo nuestras soluciones innovadoras pueden transformar tu empresa.</p>
        </div>
    </div>

    <section id="services">
        <h2>Nuestros Servicios</h2>
        <p>Ofrecemos soluciones personalizadas para llevar tu negocio al siguiente nivel.</p>

        <div class="service">
            <div>
                <img src="https://itelco.com.co/wp-content/uploads/2021/09/consultoria-tecnologica-empresarial.jpeg" alt="Consultoría">
                <h3>Consultoría Tecnológica</h3>
                <p>Asesoramos a las empresas en la optimización de sus recursos tecnológicos.</p>
            </div>
            <div>
                <img src="https://images.pexels.com/photos/1181260/pexels-photo-1181260.jpeg" alt="Desarrollo de Software">
                <h3>Desarrollo de Software</h3>
                <p>Desarrollamos soluciones a medida, desde aplicaciones móviles hasta plataformas web.</p>
            </div>
            <div>
                <img src="https://cursos.djuvana.com/wp-content/uploads/2020/07/800_imagen.jpg" alt="Soporte y Mantenimiento">
                <h3>Soporte y Mantenimiento</h3>
                <p>Brindamos soporte continuo para asegurar el funcionamiento óptimo de tus sistemas.</p>
            </div>
        </div>
    </section>

    <!-- Carousel de empresas aliadas -->
    <section id="carousel-empresas">
        <h2>Empresas Aliadas</h2>
        <div id="carouselEmpresas" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div><img src="img/ep3.png" alt="Empresa 1"></div>
                    <div><img src="img/ep4.png" alt="Empresa 2"></div>
                    <div><img src="img/ep7.png" alt="Empresa 3"></div>
                    <div><img src="img/ep5.png" alt="Empresa 4"></div> 
                </div>
               
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselEmpresas" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselEmpresas" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </section>

    <!-- Sección con fondo azul oscuro -->
    <section class="fondo-oscuro">
        <!-- Formulario de contacto -->
        <div class="formulario-contacto">
            <h2>Contacto con la Empresa</h2>
            <form>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Introduce tu nombre">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" placeholder="nombre@ejemplo.com">
                </div>
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea class="form-control" id="mensaje" rows="3" placeholder="Escribe tu mensaje"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </section>

    <!-- Icono de WhatsApp flotante -->
    <a href="https://wa.me/1234567890" class="whatsapp-float" target="_blank">
        <i class="bi bi-whatsapp"></i>
    </a>

    <?php include('template (layout)/pie.php'); ?>

    <!-- Bootstrap 5 JS -->
    
</body>
</html>
