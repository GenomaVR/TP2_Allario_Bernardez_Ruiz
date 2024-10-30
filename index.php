<?php 

include './Includes/header.php'

?>


<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://disney.images.edge.bamgrid.com/ripcut-delivery/v2/variant/disney/7769eb95-3738-4630-bf37-967d43a1584a/compose?format=webp&label=hero_carousel_none_300&width=2880" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://disney.images.edge.bamgrid.com/ripcut-delivery/v2/variant/disney/e5374834-7e7b-4dad-bcfe-f2bf642d55f1/compose?format=webp&label=hero_carousel_none_300&width=2880" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://disney.images.edge.bamgrid.com/ripcut-delivery/v2/variant/disney/c7584e7d-40fd-4398-8c9b-d0a1be68cc30/compose?format=webp&label=hero_carousel_none_300&width=2880" class="d-block w-100" alt="...">
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

<main class="container">
    <div class="row justify-content-center m-5 d-flex justify-content-between">
        <div class="col-2">
            <div class="card p-3 border-4 bg-light main-cards">Column 1</div>
        </div>
        <div class="col-2">
            <div class="card p-3 border-4 bg-light main-cards">Column 2</div>
        </div>
        <div class="col-2">
            <div class="card p-3 border-4 bg-light main-cards">Column 3</div>
        </div>
        <div class="col-2">
            <div class="card p-3 border-4 bg-light main-cards">Column 4</div>
        </div>
        <div class="col-2">
            <div class="card p-3 border-4 bg-light main-cards">Column 5</div>
        </div>
    </div>
</main>


<?php

include './Includes/footer.php'

?>