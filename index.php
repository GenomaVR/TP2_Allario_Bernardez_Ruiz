<?php 
include './Includes/header.php';
?>

<div id="carouselExample" class="carousel slide d-flex justify-content-center position-relative m-3">
    <div class="container">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://disney.images.edge.bamgrid.com/ripcut-delivery/v2/variant/disney/7769eb95-3738-4630-bf37-967d43a1584a/compose?format=webp&label=hero_carousel_none_300&width=2880" class="d-block w-100 img-fluid" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://disney.images.edge.bamgrid.com/ripcut-delivery/v2/variant/disney/e5374834-7e7b-4dad-bcfe-f2bf642d55f1/compose?format=webp&label=hero_carousel_none_300&width=2880" class="d-block w-100 img-fluid" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://disney.images.edge.bamgrid.com/ripcut-delivery/v2/variant/disney/c7584e7d-40fd-4398-8c9b-d0a1be68cc30/compose?format=webp&label=hero_carousel_none_300&width=2880" class="d-block w-100 img-fluid" alt="...">
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<main class="my-5">
<div class="container  mt-5 text-white">
  <h3>Nuevo en TBD</h3>
</div>
<div class="container-fluid d-flex justify-content-center">
    <div class="d-flex justify-content-center gap-4 card-rows">
        <div class="card p-2 border-4 bg-light main-cards mx-4"><img src="https://assets.website-files.com/62cd5c6f4947cd559a9cc4de/62cd64e5e1c3b915971ba8f8_marvel_logo.png" alt=""></div>
        <div class="card p-2 border-4 bg-light main-cards mx-4">Cartita2</div>
        <div class="card p-2 border-4 bg-light main-cards mx-4">Cartita3</div>
        <div class="card p-2 border-4 bg-light main-cards mx-4">Cartita4</div>
        <div class="card p-2 border-4 bg-light main-cards mx-4">Cartita5</div>
    </div>
</div>
</main>

<div>
<div class="container mt-5 text-white">
  <h3>Para ver ahora mismo</h3>
</div>
<div id="carouselExample2" class="carousel slide d-flex justify-content-center position-relative m-3" data-bs-ride="carousel">
    <div class="container">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-flex justify-content-between">
                    <div class="card p-2 border-4 bg-light main-cards mx-5 second-slider-card">Cartita2 1</div>
                    <div class="card p-2 border-4 bg-light main-cards mx-5 second-slider-card">Cartita2 2</div>
                    <div class="card p-2 border-4 bg-light main-cards mx-5 second-slider-card">Cartita2 3</div>
                    <div class="card p-2 border-4 bg-light main-cards mx-5 second-slider-card">Cartita2 4</div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex justify-content-between">
                    <div class="card p-2 border-4 bg-light main-cards mx-5 second-slider-card">Cartita2 5</div>
                    <div class="card p-2 border-4 bg-light main-cards mx-5 second-slider-card">Cartita2 6</div>
                    <div class="card p-2 border-4 bg-light main-cards mx-5 second-slider-card">Cartita2 7</div>
                    <div class="card p-2 border-4 bg-light main-cards mx-5 second-slider-card">Cartita2 8</div>
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

<?php 
include './Includes/footer.php';
?>