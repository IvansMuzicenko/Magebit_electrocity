<?php
require_once "./templates/header.php";
?>

<!-- BANNER -->

<div id="carouselBanner" class="carousel slide" data-bs-interval="3000" data-bs-ride="carousel">
    <div id="carouselIndicator" class="carousel-indicators">
        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="http://localhost:8000/catalogue">
                <img src="http://localhost:8000/assets/images/banner1.svg" class="" style="width:100%; height:auto" alt="...">

                <div id="textBg" class="carousel-caption d-none d-md-block">
                    <p class="h1 fw-light">Welcome to ELECTROCITY</p>
                    <p class="fs-5">Best online shop in Europe</p>
                </div>
            </a>
        </div>
        <div class="carousel-item">
            <a href="http://localhost:8000/catalogue?brand=Logitech">
                <img src="http://localhost:8000/assets/images/banner2.svg" class="" style="width:100%; height:auto" alt="...">

                <div class="carousel-caption d-none d-md-block">
                    <p class="h1 fw-light">logitech x electroCity</p>
                    <p>Best devices by logitech</p>
                </div>
            </a>
        </div>
        <div class="carousel-item">
            <a href="http://localhost:8000/catalogue?brand=Razer">
                <img src="http://localhost:8000/assets/images/banner3.svg" class="" style="width:100%; height:auto" alt="...">

                <div class="carousel-caption d-none d-md-block">
                    <p class="h1 fw-light">razer x electroCity</p>
                    <p>"For gamers by gamers." devices can find in our e-shop</p>
                </div>
            </a>
        </div>
        <div class="carousel-item ">
            <a href="http://localhost:8000/catalogue?color=Black&type=Mouse">
                <img src="http://localhost:8000/assets/images/banner4.svg" class="" style="width:100%; height:auto" alt="...">

                <div id="textBg" class="carousel-caption d-none d-md-block">
                    <p class="h1 fw-light">Our choice</p>
                    <p class="fs-5">Black edition mouses</p>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- CATALOGUE -->

<div id="cardsIndexCatalogue" class="d-flex justify-content-center mt-5 ">
    <h3>Catalogue</h3>
</div>
<div class="catalogue-index row m-0 d-flex justify-content-center text-center gap-2 mb-5 pb-2">

</div>


<div id="carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false" data-bs-pause="hover">
    <div class="carousel-inner">
        <div class="carousel-item sanja active">
            <div class="carousel-item-wrapper d-flex">
                <a href="#" class="card catalogue-index-card-template">
                    <div class="m-auto" style="width: 100%;">
                        <img src="" class=" m-auto" alt="...">
                        <div class="card-body text-center">
                            <p class="card-text"></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="carousel-item sanja">
            <div class="carousel-item-wrapper d-flex">
            </div>
        </div>
        <div class="carousel-item sanja">
            <div class="carousel-item-wrapper d-flex">
            </div>
        </div>

    </div>
</div>
<div class="d-flex justify-content-center mt-3">
    <a href="http://localhost:8000/catalogue" type="submit" class="btn btn-primary btn-lg mb-5 catalogue-btn">Catalogue</a>
</div>

<!-- CATEGORY -->
<div class="categoryBrands d-flex justify-content-evenly flex-wrap ">
    <a href="http://localhost:8000/catalogue?brand=Razer" class="mb-1">
        <img src="http://localhost:8000/assets/images/cardRazer.svg" alt="">
    </a>
    <a href="http://localhost:8000/catalogue?brand=Logitech" class="mb-1">
        <img src="http://localhost:8000/assets/images/cardLogitech.svg" alt="">
    </a>
    <a href="http://localhost:8000/catalogue?brand=Steelseries" class="mb-1">
        <img src="http://localhost:8000/assets/images/cardSteel.svg" alt="">
    </a>
</div>


<div class="category">
    <a href="http://localhost:8000/catalogue?type=Mouse">
        <img src="http://localhost:8000/assets/images/categorieMouses.svg" alt="">
    </a>
    <a href="http://localhost:8000/catalogue?type=Keyboard">
        <img src="http://localhost:8000/assets/images/categorieKeyboards.svg" alt="">
    </a>
    <a href="http://localhost:8000/catalogue?type=Headset">
        <img src="http://localhost:8000/assets/images/categorieHeadsets.svg" class="mb-3" alt="">
    </a>
</div>

<?php
require_once "./templates/footer.php"
?>

<?php
require_once "./assets/scripts/index.php"
?>


<?php
require_once "./templates/htmlEnd.php"
?>