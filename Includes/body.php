<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "juegos"; // Nombre de la base de datos correcta

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta de películas
$sql = "SELECT titulo, imagen FROM titulos";
$result = $conn->query($sql);

if (!$result) {
    // Mostrar mensaje de error si la consulta falla
    die("Error en la consulta: " . $conn->error);
}

if ($result->num_rows > 0) {
    // Salida de datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "<div class='pelicula'>";
        echo "<h2>" . $row["titulo"] . "</h2>";
        echo "<img src='." . $row["imagen"] . "' alt='" . $row["titulo"] . "'>";
        echo "</div>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>







<body>



    <div id="carouselExample" class="carousel slide d-flex justify-content-center position-relative m-3 main-carousel" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="container p-3">
            <div class="carousel-inner">
                <div class="carousel-item carousel-banner">
                    <img src="../../TP2_Allario_Bernardez_Ruiz/src/Slider/1.png" class="d-block w-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item carousel-banner active">
                    <img src="../../TP2_Allario_Bernardez_Ruiz/src/Slider/2.png" class="d-block w-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item carousel-banner">
                    <img src="../../TP2_Allario_Bernardez_Ruiz/src/Slider/3.png" class="d-block w-100 img-fluid" alt="...">
                </div>
            </div>
        </div>

    </div>


    <main class="my-5">
        <div class="container  mt-5 text-white">
            <h3>Nuevo en TBD</h3>
        </div>
        <div class="container d-flex justify-content-center">
            <div class="d-flex justify-content-center gap-3 card-rows row">
                <div class="card p-2 border-4 bg-light main-cards col-2">
                    <div class="img-box">
                        <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                    </div>
                </div>
                <div class="card p-2 border-4 bg-light main-cards col-2">
                    <div class="img-box">
                        <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                    </div>
                </div>
                <div class="card p-2 border-4 bg-light main-cards col-2">
                    <div class="img-box">
                        <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                    </div>
                </div>
                <div class="card p-2 border-4 bg-light main-cards col-2">
                    <div class="img-box">
                        <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                    </div>
                </div>
                <div class="card p-2 border-4 bg-light main-cards col-2">
                    <div class="img-box">
                        <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div>
        <div class="container mt-5 text-white">
            <h3>Para ver ahora mismo</h3>
        </div>
        <div id="carouselExample2" class="container carousel slide d-flex justify-content-center position-relative" data-bs-ride="carousel">
            <div class="d-flex justify-content-center">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex justify-content-center gap-3 card-rows row">
                            <div class="card p-2 border-4 bg-light main-cards col-2">
                                <div class="img-box">
                                    <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                                </div>
                            </div>
                            <div class="card p-2 border-4 bg-light main-cards col-2">
                                <div class="img-box">
                                    <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                                </div>
                            </div>
                            <div class="card p-2 border-4 bg-light main-cards col-2">
                                <div class="img-box">
                                    <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                                </div>
                            </div>
                            <div class="card p-2 border-4 bg-light main-cards col-2">
                                <div class="img-box">
                                    <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                                </div>
                            </div>
                            <div class="card p-2 border-4 bg-light main-cards col-2">
                                <div class="img-box">
                                    <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex justify-content-center gap-3 card-rows row">
                            <div class="card p-2 border-4 bg-light main-cards col-2">
                                <div class="img-box">
                                    <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                                </div>
                            </div>
                            <div class="card p-2 border-4 bg-light main-cards col-2">
                                <div class="img-box">
                                    <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                                </div>
                            </div>
                            <div class="card p-2 border-4 bg-light main-cards col-2">
                                <div class="img-box">
                                    <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                                </div>
                            </div>
                            <div class="card p-2 border-4 bg-light main-cards col-2">
                                <div class="img-box">
                                    <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                                </div>
                            </div>
                            <div class="card p-2 border-4 bg-light main-cards col-2">
                                <div class="img-box">
                                    <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
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
    </div>



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
                                <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62d28d2f683aff27688f2f7e_freeguy-p-500.jpg" alt="">
                            </div>
                        </div>
                        <div class="carousel-item2">
                            <div class="card-content">
                                <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62d025ce78d11b309d63b7cf_dollface-p-500.jpg" alt="">
                            </div>
                        </div>
                        <div class="carousel-item2">
                            <div class="card-content">
                                <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62d025b5a482d939fd8813c5_prisonbreak-p-500.jpg" alt="">
                            </div>
                        </div>
                        <div class="carousel-item2">
                            <div class="card-content">
                                <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62d025a88fcf241e91b16829_captive-p-500.jpg" alt="">
                            </div>
                        </div>
                        <div class="carousel-item2">
                            <div class="card-content">
                                <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62d28d2f683aff27688f2f7e_freeguy-p-500.jpg" alt="">
                            </div>
                        </div>
                        <div class="carousel-item2">
                            <div class="card-content">
                                <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62d28cd5683aff357f8f2b13_pistol-p-500.jpg" alt="">
                            </div>
                        </div>
                        <div class="carousel-item2">
                            <div class="card-content">
                                <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62d28d2f683aff27688f2f7e_freeguy-p-500.jpg" alt="">
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



    <!-- <div class="container mt-5 text-white">
        <h3>Para ver ahora mismo</h3>
    </div>
    <div id="carouselExample4" class="container carousel slide d-flex justify-content-center position-relative" data-bs-ride="carousel">
        <div class="d-flex justify-content-center">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex justify-content-center gap-3 card-rows row">
                        <div class="card p-2 border-4 bg-light main-cards col-2">
                            <div class="img-box">
                                <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                            </div>
                        </div>
                        <div class="card p-2 border-4 bg-light main-cards col-2">
                            <div class="img-box">
                                <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                            </div>
                        </div>
                        <div class="card p-2 border-4 bg-light main-cards col-2">
                            <div class="img-box">
                                <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                            </div>
                        </div>
                        <div class="card p-2 border-4 bg-light main-cards col-2">
                            <div class="img-box">
                                <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                            </div>
                        </div>
                        <div class="card p-2 border-4 bg-light main-cards col-2">
                            <div class="img-box">
                                <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex justify-content-center gap-3 card-rows row">
                        <div class="card p-2 border-4 bg-light main-cards col-2">
                            <div class="img-box">
                                <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                            </div>
                        </div>
                        <div class="card p-2 border-4 bg-light main-cards col-2">
                            <div class="img-box">
                                <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                            </div>
                        </div>
                        <div class="card p-2 border-4 bg-light main-cards col-2">
                            <div class="img-box">
                                <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                            </div>
                        </div>
                        <div class="card p-2 border-4 bg-light main-cards col-2">
                            <div class="img-box">
                                <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                            </div>
                        </div>
                        <div class="card p-2 border-4 bg-light main-cards col-2">
                            <div class="img-box">
                                <img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample4" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample4" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div> -->

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