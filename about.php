<?php include './includes/header.php'; ?>

<main class="container-fluid banner-about p-0">
  <div class="img-about d-flex flex-column justify-content-center align-items-center text-center animate-on-scroll">
    <h1 class="text-white mb-1">VAPOR GAMES ARGENTINA</h1>
    <p class="text-white fs-5">Miles de universos al alcance de tu mano.</p>
    <a href="#explore" class="btn godown-btn mt-4">Explorar</a>
  </div>
</main>

<section class="container mt-5">
  <div class="row align-items-start mb-5 section-hover">
    <div class="col-md-6 order-md-2 animate-on-scroll">
      <div class="about-info about-text py-4 px-4 rounded">
        <h2>Nuestra Historia</h2>
        <p>Somos una tienda de videojuegos fundada en 2020 con la misión de ofrecer los mejores juegos a los precios más competitivos. Desde nuestros humildes comienzos, hemos crecido para convertirnos en uno de los principales minoristas de videojuegos en línea.</p>
      </div>
    </div>
    <div class="col-md-6 fade-in">
      <div class="about-info rounded">
        <img src="../TP2_Allario_Bernardez_Ruiz/imagenes/about-img/elden-ring.jpg" alt="Nuestra Historia" class="img-fluid rounded">
      </div>
    </div>
  </div>
</section>


<section class="container mt-5">
  <div class="row align-items-start mb-5 section-hover">
    <div class="col-md-6 animate-on-scroll">
      <div class="about-info about-text py-4 px-4  rounded">
        <h2>Nuestro Equipo</h2>
        <p>Contamos con un equipo apasionado de jugadores y expertos en la industria que trabajan incansablemente para asegurarse de que nuestros clientes tengan acceso a los últimos lanzamientos y a los clásicos más queridos.</p>
      </div>
    </div>
    <div class="col-md-6 animate-on-scroll rounded">
      <div class="about-info rounded">
        <img src="../TP2_Allario_Bernardez_Ruiz/imagenes/about-img/party-animals.png" alt="Nuestro Equipo" class="img-fluid rounded">
      </div>
    </div>
  </div>
</section>

<section class="container mt-5">
  <div class="row align-items-start mb-5 section-hover">
    <div class="col-md-6 order-md-2 animate-on-scroll">
      <div class="about-info about-text py-4 px-4  rounded">
        <h2>Nuestra Misión</h2>
        <p>Nuestra misión es proporcionar una experiencia de compra inigualable para los amantes de los videojuegos. Nos esforzamos por ofrecer una amplia selección de juegos, consolas y accesorios, junto con un servicio al cliente excepcional.</p>
        <a href="./commerce.php" class="btn godown-btn mt-4">Ir a la tienda</a>
      </div>
    </div>
    <div class="col-md-6 order-md-1 animate-on-scroll">
      <div class="about-info rounded">
        <img src="../TP2_Allario_Bernardez_Ruiz/imagenes/about-img/metro-snow.jpg" alt="Nuestra Misión" class="img-fluid rounded">
      </div>
    </div>
  </div>
</section>



<section class="container mt-5">
  <div class="row align-items-start mb-5 section-hover">
    <div class="col-md-6 animate-on-scroll">
    <div class="about-info about-text py-4 px-4  rounded">
        <h2>Contáctanos</h2>
        <p>¿Tienes alguna pregunta o necesitas ayuda? No dudes en ponerte en contacto con nosotros. Nuestro equipo de atención al cliente está aquí para ayudarte.</p>
        <ul>
          <li>Email: soporte@videogamesecommerce.com</li>
          <li>Teléfono: +123 456 7890</li>
          <li>Dirección: Calle Falsa 123, Ciudad, País</li>
        </ul>
      </div>
    </div>
    <div class="col-md-6 animate-on-scroll rounded">
      <div class="about-info rounded">
        <img src="../TP2_Allario_Bernardez_Ruiz/imagenes/about-img/lethal.png" alt="Nuestro Equipo" class="img-fluid rounded">
      </div>
    </div>
  </div>
</section>


<article class="container-fluid p-0">

<div class="animate-on-scroll">
      <div class="about-info about-text px-4 py-4">
        <h2>Unite a nosotros</h2>
        <p>Explora las oportunidades que VAPOR tiene para ser parte de nuestra misión por llevar el Gaming a cada rincón del planeta.</p>
        <a href="./commerce.php" class="btn godown-btn mt-4">Ver empleos


</article>



<script>
  document.addEventListener('DOMContentLoaded', function() {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, { threshold: 0.1 });

    document.querySelectorAll('.animate-on-scroll').forEach(element => {
      observer.observe(element);
    });

    document.querySelectorAll('.section-hover').forEach(section => {
      section.addEventListener('mouseenter', () => {
        section.querySelector('img').classList.add('hover-shadow');
      });
      section.addEventListener('mouseleave', () => {
        section.querySelector('img').classList.remove('hover-shadow');
      });
    });
  });
</script>

<?php include '../TP2_Allario_Bernardez_Ruiz/includes/footer.php'; ?>