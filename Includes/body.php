<?php
// Incluir la conexión a la base de datos
require './Includes/dbcon.php';
?>

<body>

<div id="carouselExampleIndicators" class="carousel slide d-flex justify-content-center position-relative main-carousel" data-bs-interval="3000">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner container-fluid p-0">
    <div class="carousel-item active carousel-banner"  id="index-banner1">
        <a href="">a</a>
    </div>
    <div class="carousel-item carousel-banner"  id="index-banner2">
        <a href="">a</a>
    </div>
    <div class="carousel-item carousel-banner"  id="index-banner3">
        <a href="">a</a>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>





<main class="my-5">
    <div class="container mt-5 text-white">
        <h3>Nuevo en TBD</h3>
    </div>
    <div class="container d-flex justify-content-center">
        <div class="d-flex justify-content-center gap-3 card-rows row">
            <div class="card p-2 border-4 bg-light main-cards col-2" id="publisher1">
                <div class="img-box">
                    <img src="./logo/publisher/blizzard-logo.avif" alt="">
                </div>
            </div>
            <div class="card p-2 border-4 bg-light main-cards col-2" id="publisher2">
                <div class="img-box">
                    <img src="./logo/publisher/valve_logo.svg" alt="">
                </div>
            </div>
            <div class="card p-2 border-4 bg-light main-cards col-2" id="publisher3">
                <div class="img-box">
                    <img src="./logo/publisher/konami-logo.png" alt="">
                </div>
            </div>
            <div class="card p-2 border-4 bg-light main-cards col-2" id="publisher4">
                <div class="img-box">
                    <img src="./logo/publisher/ubi-logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
</main>

<div>
    <div class="container mt-5 text-white">
        <h3>Para ver ahora mismo</h3>
    </div>
    <!-- Carousel for larger screens -->
    <div id="carouselExample2" class="container carousel slide d-flex justify-content-center position-relative d-none d-lg-flex" data-bs-ride="carousel">
        <div class="d-flex justify-content-center">
            <div class="carousel-inner overflow-visible">
                <?php
                if ($result->num_rows > 0) {
                    $active = true;
                    $counter = 0;
                    while($row = $result->fetch_assoc()) {
                        if ($counter % 4 == 0) {
                            if ($counter > 0) {
                                echo '</div></div>'; // Close previous carousel-item and row
                            }
                            echo '<div class="carousel-item ' . ($active ? 'active' : '') . '">';
                            echo '<div class="d-flex justify-content-center gap-3 card-rows row">';
                            $active = false;
                        }
                        echo '<div class="card cards-juegos border-4 bg-light main-cards col-2 p-0">';
                        echo '<div class="img-box p-0">';
                        echo '<img src=".' . $row["imagen"] . '" alt="' . $row["titulo"] . '">';
                        echo '</div>';
                        echo '</div>';
                        $counter++;
                    }
                    echo '</div></div>'; // Close the last carousel-item and row
                } else {
                    echo "0 resultados";
                }
                ?>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample2" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample2" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Carousel for smaller screens -->
    <div id="carouselExample3" class="container carousel slide d-flex justify-content-center position-relative d-lg-none" data-bs-ride="carousel">
        <div class="d-flex justify-content-center">
            <div class="carousel-inner overflow-visible">
                <?php
                // Reset the result pointer and fetch data again for the smaller carousel
                $result->data_seek(0);
                if ($result->num_rows > 0) {
                    $active = true;
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="carousel-item ' . ($active ? 'active' : '') . '">';
                        echo '<div class="d-flex justify-content-center gap-3 card-rows row">';
                        echo '<div class="card cards-juegos border-4 bg-light main-cards col-12 p-0">';
                        echo '<div class="img-box p-0">';
                        echo '<img src=".' . $row["imagen"] . '" alt="' . $row["titulo"] . '">';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        $active = false;
                    }
                } else {
                    echo "0 resultados";
                }
                ?>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample3" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample3" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


    <section class="container mt-5">
    <div class="row justify-content-center gap-3">
        <div class="container-store rounded bg-dark col-12 col-md-6 col-lg-4 p-4">
            <div class="text-white text-center">
                <h2>RECORRE NUESTRO STORE</h2>
            </div>
            <div class="card-body about-info rounded">
                <img src="./src/img/store.jpg" alt="" class="rounded mb-4 img-fluid">
                <p>Encuentra los mejores juegos a los mejores precios tan buenos que podríamos quebrar mañana.</p>
                <a href="./commerce.php" class="btn godown-btn mt-4">Ir a la tienda</a>
            </div>
        </div>
        <div class="container-store rounded bg-dark col-12 col-md-6 col-lg-4 p-4">
            <div class="text-white text-center">
                <h2>UNITE A NUESTRO DISCORD</h2>
            </div>
            <div class="card-body about-info rounded">
                <img src="./src/img/discord.jpg" alt="" class="rounded mb-4 img-fluid">
                <p>Tenemos servidores personalizados para divertirte al máximo con tu Team.</p>
                <a href="./commerce.php" class="btn godown-btn mt-4">Ir al Server</a>
            </div>
        </div>
    </div>
</section>




<div class="container-fluid slider-medium-2col my-5 py-5 ">
        <div class="row container-columns d-flex md-flex-wrap">
            <div class="call-to-action d-flex flex-column justify-content-center align-items-center text-center col-xl-3">
                <h3 class="text-white">PROXIMAMENTE</h3>
                <a href="index.php" class="btn btn-dark w-50">MIRA MAS DIJE</a>
            </div>
            <div class="slider-verticalcards container-fluid col-xl-9">
                <div class="carousel2" id="customCarousel">
                    <div class="carousel-inner2 p-4 gap-5">
                        <div class="carousel-item2">
                            <div class="card-content">
                                <img src="./slider-img/cod6-slider.webp" alt="">
                            </div>
                        </div>
                        <div class="carousel-item2">
                            <div class="card-content">
                                <img src="./slider-img/helldivers2-slider.webp" alt="">
                            </div>
                        </div>
                        <div class="carousel-item2">
                            <div class="card-content">
                                <img src="./slider-img/metro_awakening-slider.webp" alt="">
                            </div>
                        </div>
                        <div class="carousel-item2">
                            <div class="card-content">
                                <img src="./slider-img/silent-hill2-slider.webp" alt="">
                            </div>
                        </div>
                        <div class="carousel-item2">
                            <div class="card-content">
                                <img src="./slider-img/space-marine2-slider.webp" alt="">
                            </div>
                        </div>
                        <div class="carousel-item2">
                            <div class="card-content">
                                <img src="./slider-img/farming-slider.webp" alt="">
                            </div>
                        </div>
                        <div class="carousel-item2">
                            <div class="card-content">
                                <img src="./slider-img/tlou1.webp" alt="">
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" id="prevBtn">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" id="nextBtn">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

<section class="container-fluid mt-5 tga2024">
    <div class="row justify-content-start gap-3 tga2024 align-items-center">
        <div class="container col-12 col-md-12 col-lg-6 p-4 align-items-center">
            <div class="text-white text-center">
                <h2>YA VOTASTE PARA EL GOTY?</h2>
            </div>
            <div class="text-white fw-bold text-center">
                <p>Vota a tus juegos favoritos en THE GAMES AWARDS 2024 y, por supuesto, a VAPOR en la cateogría mejor Store</p>
                <a href="./commerce.php" class="btn godown-btn mt-4">Votar ahora</a>
            </div>
        </div>
    </div>
</section>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.querySelector('#customCarousel .carousel-inner2');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            let currentIndex = 0;
            const itemsPerSlide = 4;
            const totalItems = document.querySelectorAll('#customCarousel .carousel-item2').length;

            function updateCarousel() {
                const offset = -currentIndex * (100 / itemsPerSlide);
                carousel.style.transform = `translateX(${offset}%)`;
            }

            prevBtn.addEventListener('click', function() {
                if (currentIndex > 0) {
                    currentIndex--;
                } else {
                    currentIndex = totalItems - itemsPerSlide;
                }
                updateCarousel();
            });

            nextBtn.addEventListener('click', function() {
                if (currentIndex < totalItems - itemsPerSlide) {
                    currentIndex++;
                } else {
                    currentIndex = 0;
                }
                updateCarousel();
            });

            updateCarousel();
        }); //end
    </script>


</body>