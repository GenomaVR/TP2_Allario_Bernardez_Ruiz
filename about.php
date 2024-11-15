<?php
include './Includes/header.php';
?>

<!-- BANNER GRID HECHO CON IMÁGENES-->
<!-- Se utiliza CSS Grid para la creación del banner y en Mobile se ajusta la imagen -->
<main class="banner-masonry">
    <div class="gridito1">
        <div class="gridito1-row1">
            <img class="griditoimg" src="./masonry/it.jpeg" alt="">
        </div>
        <div class="gridito1-row2">
            <div class="gridito1-row2-col1">
                <img class="griditoimg" src="./masonry/godfather.jpg" alt="">
            </div>
            <div class="gridito1-row2-col2">
                <img class="griditoimg" src="./masonry/john-wick-4.avif" alt="">
            </div>
        </div>
    </div>
    <div class="gridito2">
        <div class="gridito2-row1">
            <div class="gridito2-row1-col1">
                <img class="griditoimg1" src="./masonry/hunger-games.avif" alt="">
            </div>
            <div class="gridito2-row1-col2">
                <img class="griditoimg2" src="./masonry/Godzilla_kong.webp" alt="">
            </div>
        </div>
        <div class="gridito2-row2">
            <img class="griditoimg" src="./masonry/pulp-fiction.webp" alt="">
        </div>
    </div>
    <div class="gridito3">
        <div class="gridito3-col1">
            <div class="gridito3-col1-row1">
                <img class="griditoimg1" src="./masonry/9reinas.png" alt="">
            </div>
            <div class="gridito3-col1-row2">
                <img class="griditoimg2" src="./masonry/green-mile.webp" alt="">
            </div>
        </div>
        <div class="gridito3-col2">
            <div class="gridito3-col2-row1">
            <img class="griditoimg" src="./masonry/maldad3.avif" alt="">
            </div>
        </div>
    </div>
</main>




<article class="somos-container container text-white px-5 d-flex flex-column justify-content-center mx-auto p-5 rounded" >
    
    <div class="titulo container text-white text-center m-2">
        <h1>SOMOS EL CINEFILO</h1>
    </div>
    <div class="titulo container text-white text-center">
        <h2 class="px-5 text-center mb-3">
        Las historias nos conmueven.
Nos hacen sentir más emociones, nos muestran otros puntos de vista
y nos acercan a los demás.
        </h2>
    </div>
   <div class="row">
        <div class="col-sm">
            <p class="par">
                Bienvenidos a El Cinéfilo Argentino, el hogar del cine sin fronteras y la ventana digital que acerca el séptimo arte a cada rincón del mundo. Nos apasiona el cine en todas sus formas, géneros y estilos, y trabajamos cada día para ofrecer un catálogo diverso y curado con esmero que celebra la riqueza cultural de todas las cinematografías.
            </p>
            <p class="par">
                En nuestro catálogo tenemos películas de todos los países ya que en El Cinéfilo Argentino tenemos una misión clara: destacar y difundir el cine argentino y de todo el mundo, ese cine que nace de nuestra tierra y otras diversas, de nuestras historias y nuestra gente, pero tambièn sabiendo que todo el mundo nos puede ofrecer maravillas.
                Queremos que nuestros espectadores, tanto en Argentina como alrededor del mundo, descubran y disfruten las joyas del cine nacional, desde clásicos consagrados hasta las producciones más recientes e innovadoras.
            </p>
            <p class="par">
                Explora, descubre y sumérgete en el mejor cine de aquí y del mundo. ¡Gracias por acompañarnos en este viaje cinematográfico!
            </p>
        </div>
        <div class="side-img col-sm">
            <img src="./src/img/soldado_argentino.jpg" alt="" class="w-100 rounded">
        </div>
   </div>
</article>

<br>

<article class="historia-container container text-white px-5 d-flex flex-column justify-content-center mx-auto p-5 rounded">
    <div class="titulo  container text-white text-center">
        <h2>NUESTRA HISTORIA</h2>
    </div>
    <div class="row">
        <div class="side-img col-sm">
            <img src="./src/img/2440052.jfif" alt="" class="w-100 rounded">
        </div>
        <div class="col-sm">
            <p class="par">
                El Cinéfilo Argentino nació de una pasión por el cine y una ambiciosa visión: ofrecer el mejor cine del mundo desde la comodidad del hogar. Aunque el camino no fue fácil, el amor por el cine nos impulsó a superar cada obstáculo para crear esta plataforma de streaming.
            </p>
            <p class="par">
            Desde el principio, buscamos algo especial: no solo películas, sino una experiencia personalizada. Trabajamos arduamente seleccionando títulos y colaborando con productores para ofrecer una colección diversa y accesible.

            </p>
            <p class="par">
            Hoy, gracias a un equipo dedicado, El Cinéfilo Argentino es una realidad. Cada detalle, desde el diseño hasta las recomendaciones, está pensado para tu disfrute.

            </p>
            <p class="par">
            Gracias por ser parte de esta aventura cinematográfica que no deja de crecer.
            </p>
        </div>

    </div>
</article>

<section class="about-service">
    <div>

    </div>
    <div class="row">




    </div>
</section>


<div class="my-4 w-100 container p-0">
    <div class="text-white m-auto justify-content-center bento-container">
      <div class="bento-col1">
        <div class="item bento-item2 rounded">
            <h2>NUESTRO SERVICIO</h2>
            <p>En El Cinéfilo Argentino, nos esforzamos por ofrecer un servicio de streaming de calidad que se adapte a las necesidades y gustos de cada cinéfilo. </p>
            <p>
            Nuestra plataforma está diseñada para ser intuitiva, fácil de usar y accesible desde cualquier dispositivo, para que puedas disfrutar del mejor cine en cualquier momento y lugar.
            </p>
        </div>
      </div>
      <div class="bento-col2">
        <div class="item bento-item rounded">
            <div class="">
                <h3>Stream On Demand</h3>
            </div>
        </div>
        <div class="item bento-item rounded">
        <div class="">
            <h3>Recomendaciones y alertas</h3>
        </div>
        </div>
        <div class="item bento-item rounded ">
        <div class="">
            <h3>Merchandising</h3>
        </div>
        </div>
      </div>
    </div>
</div>

<?php
include './Includes/footer.php';
?>