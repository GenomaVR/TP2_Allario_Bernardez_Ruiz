<?php
include './includes/404-section.php';

include 'config.php'; // Incluir el archivo de configuración

// Consulta de juegos desde la base de datos
$sql = "SELECT id, titulo, descripcion, lanzamiento, genero, precio, publisher, imagen FROM titulos";
$result = $conn->query($sql);

if (!$result) {
    mostrar_error(true);
    die("Error en la consulta: " . $conn->error);
}
?>
<body>

<div id="carouselExampleIndicators" class="carousel slide d-flex justify-content-center position-relative main-carousel" data-bs-interval="3000">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner container-fluid p-0">
    <div class="carousel-item active carousel-banner" id="index-banner1">
        <div class="banner-content text-center text-white fw-bold">
            <h1>VAPOR GAMES</h1>
            <p>Descubre los mejores juegos a precios increíbles</p>
            <a href="./commerce.php" class="btn btn-primary mt-3">Explorar Tienda</a>
        </div>
    </div>
    <div class="carousel-item carousel-banner" id="index-banner2">
        <div class="banner-content text-center text-white fw-bold">
        <h2>Call of Duty Blak Ops6</h2>
            <p>Descubre los mejores juegos a precios increíbles</p>
            <a href="./commerce.php" class="btn btn-primary mt-3">Explorar Tienda</a>
        </div>
    </div>
    <div class="carousel-item carousel-banner" id="index-banner3">
        <div class="banner-content text-center text-white fw-bold">
        <h1>WARHAMMER 40K: SPACE MARINE 2</h1>
            <p>Descubre los mejores juegos a precios increíbles</p>
            <a href="./commerce.php" class="btn btn-primary mt-3">Explorar Tienda</a>
        </div>
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


<div class="mx-5">
    <div class="container-fluid mt-5 px-4 text-white fw-bold">
        <h3 class="fw-bold m-0">Pensados para vos</h3>
    </div>
    <!-- SLIDER CON IMAGENES DESDE LA BASE DE DATOS - VIEWPORTS GRANDES -->
    <div id="carouselExample2" class="container-fluid carousel slide d-flex position-relative d-none d-lg-flex align-items-center" data-bs-ride="carousel">
        <div class="d-flex justify-content-center">
            <div class="carousel-inner py-3">
                <?php
                if ($result->num_rows > 0) {
                    $active = true;
                    $counter = 0;
                    while($row = $result->fetch_assoc()) {
                        if ($counter % 6 == 0) {
                            if ($counter > 0) {
                                echo '</div></div>'; // CIERRA EL ULTIMO CAROUSEL ITEM
                            }
                            echo '<div class="carousel-item ' . ($active ? 'active' : '') . '">';
                            echo '<div class="d-flex gap-2">';
                            $active = false;
                        }
                        echo '<div class="card border-4 bg-light  main-cards" onclick="mostrarDetalleProducto(\'' . $row["id"] . '\', \'' . addslashes($row["titulo"]) . '\', \'' . addslashes($row["descripcion"]) . '\', \'' . addslashes($row["imagen"]) . '\', ' . ($row["precio"] ? $row["precio"] : 0) . ', \'' . addslashes($row["lanzamiento"]) . '\', \'' . addslashes($row["publisher"]) . '\', \'' . addslashes($row["genero"]) . '\')">';
                        echo '<div class="img-box p-0">';
                        echo '<img src="../../TP2_Allario_Bernardez_Ruiz/imagenes/' . $row["imagen"] . '" alt="' . $row["titulo"] . '">';
                        echo '</div>';
                        echo '</div>';
                        $counter++;
                    }
                    echo '</div></div>'; // CIERRA EL ULTIMO CAROUSEL ITEM
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

    <!-- SLIDER CON IMAGENES DESDE LA BASE DE DATOS - VIEWPORTS CHICO  -->
    <div id="carouselExample3" class="container carousel slide d-flex justify-content-center position-relative d-lg-none" data-bs-ride="carousel">
        <div class="d-flex justify-content-center">
            <div class="carousel-inner carousel-inner-container align-items-center p-2">
                <?php
                // Resetea y hace fetch para volver a recorrer los resultados en pantallas más chicas
                $result->data_seek(0);
                if ($result->num_rows > 0) {
                    $active = true;
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="carousel-item ' . ($active ? 'active' : '') . '">';
                        echo '<div class="d-flex">';
                        echo '<div class="card border-4 main-cards" onclick="mostrarDetalleProducto(\'' . $row["id"] . '\', \'' . addslashes($row["titulo"]) . '\', \'' . addslashes($row["descripcion"]) . '\', \'' . addslashes($row["imagen"]) . '\', ' . ($row["precio"] ? $row["precio"] : 0) . ', \'' . addslashes($row["lanzamiento"]) . '\', \'' . addslashes($row["publisher"]) . '\', \'' . addslashes($row["genero"]) . '\')">';
                        echo '<div class="img-box p-0">';
                        echo '<img src="../../TP2_Allario_Bernardez_Ruiz/imagenes/' . $row["imagen"] . '" alt="' . $row["titulo"] . '">';
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

<!-- Modal -->
<div class="modal fade" id="productoModal" tabindex="-1" aria-labelledby="productoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productoModalLabel">Detalle del Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="modalContent"></div>
            </div>
            <div class="modal-footer">
                <!-- Botón Cerrar -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                <!-- Botón dinámico -->
                <button type="button" class="btn btn-secondary" id="modalActionButton" data-bs-dismiss="modal">Acción</button>
            </div>
        </div>
    </div>
</div>

<script>
function mostrarDetalleProducto(id, titulo, descripcion, imagen, precio, lanzamiento, publisher, genero) {
    if (!imagen || imagen === 'null' || imagen === 'undefined') {
        imagen = 'ruta/a/imagen/predeterminada.jpg'; // Imagen predeterminada si no hay imagen
    }

    const modalContent = `
        <img src=".${imagen}" class="img-fluid mb-3" alt="${titulo}">
        <h4>${titulo}</h4>
        <p>${descripcion}</p>
        <p><strong>Precio:</strong> ${precio == 0 || precio === '' ? 'Gratis' : '$' + precio}</p>
        <p><strong>Lanzamiento:</strong> ${lanzamiento}</p>
        <p><strong>Publisher:</strong> ${publisher}</p>
    `;

    document.getElementById('modalContent').innerHTML = modalContent;

    const actionButton = document.getElementById('modalActionButton');

    // Acciones para productos gratis o de pago
    if (precio == 0 || genero === 'Free to Play') {
        actionButton.innerText = 'Descargar gratis';
        actionButton.onclick = function() {
            alert(`Iniciando descarga de ${titulo}...`);
        };
    } else {
        actionButton.innerText = 'Agregar al carrito';
        actionButton.onclick = function() {
            fetch('agregar_carrito.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id: id // Usar el ID correctamente para agregar al carrito
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const cartBadge = document.querySelector('.badge.bg-success');
                    if (cartBadge) {
                        cartBadge.textContent = data.totalItems;
                    }
                    alert('Producto agregado al carrito');
                } else {
                    alert('Error al agregar al carrito');
                }
            })
            .catch(error => {
                console.error('Error al agregar al carrito:', error);
                alert('Error al agregar al carrito');
            });
        };
    }

    // Mostrar el modal
    const productoModal = new bootstrap.Modal(document.getElementById('productoModal'));
    productoModal.show();
}
</script>



<div class="container-fluid slider-medium-2col my-5 py-5 ">
        <div class="row container-columns d-flex md-flex-wrap">
            <div class="call-to-action d-flex flex-column justify-content-center align-items-center text-center col-xl-3">
                <h3 class="text-white">Los más populares</h3>
                <a href="index.php" class="btn godown-btn">Ver tienda completa</a>
            </div>
            <div class="slider-verticalcards container-fluid col-xl-9">
                <div class="carousel2" id="customCarousel">
                    <div class="carousel-inner2 p-4 gap-5">
                        <button class="button-card" data-id="7" onclick="dataId(this.getAttribute('data-id'))">
                            <div class="carousel-item2">
                                <div class="card-content">
                                    <img src="../../TP2_Allario_Bernardez_Ruiz/imagenes/slider2/cod6-slider.webp" alt="">
                                </div>
                            </div>
                        </button>

                        <button class="button-card" data-id="7" onclick="dataId(this.getAttribute('data-id'))">
                            <div class="carousel-item2">
                                <div class="card-content">
                                    <img src="../../TP2_Allario_Bernardez_Ruiz/imagenes/slider2/helldivers2-slider.webp" alt="">
                                </div>
                            </div>
                        </button>
                        <button class="button-card" data-id="7" onclick="dataId(this.getAttribute('data-id'))">
                            <div class="carousel-item2">
                                <div class="card-content">
                                    <img src="../../TP2_Allario_Bernardez_Ruiz/imagenes/slider2/metro_awakening-slider.webp" alt="">
                                </div>
                            </div>
                        </button>
                        <button class="button-card" data-id="7" onclick="dataId(this.getAttribute('data-id'))">
                            <div class="carousel-item2">
                                <div class="card-content">
                                    <img src="../../TP2_Allario_Bernardez_Ruiz/imagenes/slider2/silent-hill2-slider.webp" alt="">
                                </div>
                            </div>
                        </button>
                        <button class="button-card" data-id="7" onclick="dataId(this.getAttribute('data-id'))">
                            <div class="carousel-item2">
                                <div class="card-content">
                                    <img src="../../TP2_Allario_Bernardez_Ruiz/imagenes/slider2/space-marine2-slider.webp" alt="">
                                </div>
                            </div>
                        </button>
                        <button class="button-card" data-id="7" onclick="dataId(this.getAttribute('data-id'))">
                            <div class="carousel-item2">
                                <div class="card-content">
                                    <img src="../../TP2_Allario_Bernardez_Ruiz/imagenes/slider2/farming-slider.webp" alt="">
                                </div>
                            </div>
                        </button>
                        <button class="button-card" data-id="7" onclick="dataId(this.getAttribute('data-id'))">
                        <div class="carousel-item2">
                            <div class="card-content">
                                <img src="../../TP2_Allario_Bernardez_Ruiz/imagenes/slider2/tlou1.webp" alt="">
                            </div>
                        </div>
                        </button>
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


    <script>
function dataId(id) {
    console.log("ID:", id);
    fetch(`./Includes/get_product_details.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error('Error fetching product details:', data.error);
            } else {
                mostrarDetalleProducto(data.id, data.titulo, data.descripcion, data.imagen, data.precio, data.lanzamiento, data.publisher, data.genero);
            }
        })
        .catch(error => {
            console.error('Error fetching product details:', error);
        });
}

function mostrarDetalleProducto(id, titulo, descripcion, imagen, precio, lanzamiento, publisher, genero) {
    if (!imagen || imagen === 'null' || imagen === 'undefined') {
        imagen = 'ruta/a/imagen/predeterminada.jpg'; // Imagen predeterminada si no hay imagen
    }

    const modalContent = `
        <img src=".${imagen}" class="img-fluid mb-3" alt="${titulo}">
        <h4>${titulo}</h4>
        <p>${descripcion}</p>
        <p><strong>Precio:</strong> ${precio == 0 || precio === '' ? 'Gratis' : '$' + precio}</p>
        <p><strong>Lanzamiento:</strong> ${lanzamiento}</p>
        <p><strong>Publisher:</strong> ${publisher}</p>
    `;

    document.getElementById('modalContent').innerHTML = modalContent;

    const actionButton = document.getElementById('modalActionButton');

    // Acciones para productos gratis o de pago
    if (precio == 0 || genero === 'Free to Play') {
        actionButton.innerText = 'Descargar gratis';
        actionButton.onclick = function() {
            alert(`Iniciando descarga de ${titulo}...`);
        };
    } else {
        actionButton.innerText = 'Agregar al carrito';
        actionButton.onclick = function() {
            fetch('./Includes/agregar_carrito.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id: id // Usar el ID correctamente para agregar al carrito
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const cartBadge = document.querySelector('.badge.bg-success');
                    if (cartBadge) {
                        cartBadge.textContent = data.totalItems;
                    }
                    alert('Producto agregado al carrito');
                } else {
                    alert('Error al agregar al carrito');
                }
            })
            .catch(error => {
                console.error('Error al agregar al carrito:', error);
                alert('Error al agregar al carrito');
            });
        };
    }

    // Mostrar el modal
    const productoModal = new bootstrap.Modal(document.getElementById('productoModal'));
    productoModal.show();
}
</script>


<section class="container mt-5">
    <div class="row justify-content-center gap-3">
        <div class="container-store rounded bg-dark col-12 col-md-6 col-lg-4 p-4 d-flex flex-column">
            <div class="text-white text-center mb-3">
                <h2>RECORRE NUESTRO STORE</h2>
            </div>
            <div class="card-body about-info rounded d-flex flex-column flex-grow-1 justify-content-center accesos-img">
                <img src="../../TP2_Allario_Bernardez_Ruiz/imagenes/img/store.jpg" alt="" class="rounded mb-4 accesos-img">
                <p class="flex-grow-1 mb-3">Encuentra los mejores juegos a los mejores precios tan buenos que podríamos quebrar mañana.</p>
                <a href="./commerce.php" class="btn godown-btn mt-auto align-self-center">Ir a la tienda</a>
            </div>
        </div>
        <div class="container-store rounded bg-dark col-12 col-md-6 col-lg-4 p-4 d-flex flex-column">
            <div class="text-white text-center mb-3">
                <h2>UNITE A NUESTRO DISCORD</h2>
            </div>
            <div class="card-body about-info rounded d-flex flex-column flex-grow-1 justify-content-center accesos-img">
                <img src="../../TP2_Allario_Bernardez_Ruiz/imagenes/img/discord.jpg" alt="" class="rounded mb-4 ">
                <p class="flex-grow-1 mb-3">Tenemos servidores personalizados para divertirte al máximo con tu Team.</p>
                <a href="./404.php" class="btn godown-btn mt-auto align-self-center">Ir al Server</a>
            </div>
        </div>
    </div>
</section>



<section class="mx-5">
    <div class="container-fluid mt-5 px-5 text-white ">
        <h3>Principales Publishers</h3>
    </div>
    <div class="container-fluid px-5 d-flex justify-content-center">
        <div class="d-flex justify-content-between gap-3 card-rows w-100">
        <a href="./includes/commerce.php" class="card p-2 border-4 bg-light main-cards mx-sm-auto mx-md-0" id="publisher1">
                <div class="img-box">
                    <img src="./logo/publisher/blizzard-logo.avif" alt="">
                </div>
            </a>
            <a href="./includes/commerce.php" class="card p-2 border-4 bg-light main-cards mx-sm-auto mx-md-0" id="publisher3">
                <div class="img-box">
                    <img src="./logo/publisher/konami-logo.png" alt="">
                </div>
            </a>
            <a href="./includes/commerce.php"  class="card p-2 border-4 bg-light main-cards mx-sm-auto mx-md-0" id="publisher2">

                <div class="img-box">
                    <img src="./logo/publisher/valve_logo.svg" alt="">
                </div>

            </a>
            <a href="./includes/commerce.php"class="card p-2 border-4 bg-light main-cards mx-sm-auto mx-md-0" id="publisher4" >

                <div class="img-box">
                    <img src="./logo/publisher/ubi-logo.png" alt="">
                </div>

            </a>

        </div>
    </div>
</section>





<section class="container-fluid mt-5 tga2024">
    <div class="row justify-content-start gap-3 tga2024 align-items-center">
        <div class="container col-12 col-md-12 col-lg-6 p-4 align-items-center">
            <div class="text-white text-center">
                <h2>YA VOTASTE PARA EL GOTY?</h2>
            </div>
            <div class="text-white fw-bold text-center">
                <p>Vota a tus juegos favoritos en THE GAMES AWARDS 2024 y, por supuesto, a VAPOR en la cateogría mejor Store</p>
                <a href="./404.php" class="btn godown-btn mt-4">Votar ahora</a>
            </div>
        </div>
    </div>
</section>


    <script> //SCRIPT para Carrousel con imágenes verticales
        /*test*/

        /*test*/

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

<?php
$conn->close();
?>
</body>