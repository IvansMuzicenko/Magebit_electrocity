<?php
require_once "./templates/header.php";
?>

<!-- BANNER -->

<div id="carouselBanner" class="carousel slide" data-bs-ride="false">
    <div id="carouselIndicator" class="carousel-indicators">
        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../assets/images/banner1.svg" class="d-block w-100" style="object-fit:cover" alt="...">
            <div id="textBg" class="carousel-caption d-none d-md-block">
                <p class="h1 fw-light">Welcome to ELECTROCITY</p>
                <p class="fs-5">Best online shop in Europe</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../assets/images/banner2.svg" class="d-block w-100" style="object-fit:cover" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <p class="h1 fw-light">logitech x electroCity</p>
                <p>Best devices by logitech</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../assets/images/banner3.svg" class="d-block w-100" style="object-fit:cover" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <p class="h1 fw-light">razer x electroCity</p>
                <p>"For gamers by gamers." devices can find in our e-shop</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanner" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselBanner" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- CATALOGUE -->

<div id="cardsIndexCatalogue" class="d-flex justify-content-center mt-5">
    <h3>Catalogue</h3>
</div>
<div class="catalogue-index row m-0 d-flex justify-content-center gap-2 mb-5 pb-2">

    <a href="#" class="card catalogue-index-card-template" style="width: 18rem;">
        <div>
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text"></p>
            </div>
        </div>
    </a>
    <div class="d-flex justify-content-center mt-5">
        <a href="catalogue" type="submit" class="btn btn-primary btn-lg mb-5 catalogue-btn">Catalogue</a>
    </div>

</div>
</div>



<?php
require_once "./templates/footer.php"
?>