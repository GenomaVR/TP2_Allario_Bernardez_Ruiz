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




<?php 
include './Includes/footer.php';
?>