<?php
require_once "./templates/header.php";
?>

<!-- BANNER -->

<div id="carouselBanner" class="carousel slide" data-bs-interval="3000" data-bs-ride="carousel">
    <div id="carouselIndicator" class="carousel-indicators">
        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="http://localhost:8000/catalogue">
                <img src="../assets/images/banner1.svg" class="img-fluid" style="width:100%; height:auto" alt="...">

                <div id="textBg" class="carousel-caption d-none d-md-block">
                    <p class="h1 fw-light">Welcome to ELECTROCITY</p>
                    <p class="fs-5">Best online shop in Europe</p>
                </div>
            </a>
        </div>
        <div class="carousel-item">
            <a href="http://localhost:8000/catalogue?brand=Logitech">
                <img src="../assets/images/banner2.svg" class="img-fluid" style="width:100%; height:auto" alt="...">

                <div class="carousel-caption d-none d-md-block">
                    <p class="h1 fw-light">logitech x electroCity</p>
                    <p>Best devices by logitech</p>
                </div>
            </a>
        </div>
        <div class="carousel-item">
            <a href="http://localhost:8000/catalogue?brand=Razer">
                <img src="../assets/images/banner3.svg" class="img-fluid" style="width:100%; height:auto" alt="...">

                <div class="carousel-caption d-none d-md-block">
                    <p class="h1 fw-light">razer x electroCity</p>
                    <p>"For gamers by gamers." devices can find in our e-shop</p>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- CATALOGUE -->

<div id="cardsIndexCatalogue" class="d-flex justify-content-center mt-5">
    <h3>Catalogue</h3>
</div>
<div class="catalogue-index row m-0 d-flex justify-content-center text-center gap-2 mb-5 pb-2">

    <a href="#" class="card catalogue-index-card-template" style="width: 18rem;">
        <div>
            <img src="" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text"></p>
            </div>
        </div>
    </a>
    <div class="d-flex justify-content-center mt-5">
        <a href="catalogue" type="submit" class="btn btn-primary btn-lg mb-5 catalogue-btn">Catalogue</a>
    </div>
</div>

<div class="categorie">
    <a href="http://localhost:8000/catalogue?type=Mouse">
        <img src="../assets/images/categorieMouses.svg" alt="">
    </a>
    <a href="http://localhost:8000/catalogue?type=Keyboard">
        <img src="../assets/images/categorieKeyboards.svg" alt="">
    </a>
    <a href="http://localhost:8000/catalogue?type=Headset">
        <img src="../assets/images/categorieHeadsets.svg" alt="">
    </a>
</div>




<script>
    fetch("api/getAllProducts")
        .then((response) => response.json())
        .then((data) => {
            const catalogueIndex = document.querySelector(".catalogue-index");
            const catalogueItemTemplate = document.querySelector(
                ".catalogue-index-card-template"
            );
            let i = 0;
            for (let item of data.data) {
                i++;
                const newItem = document.createElement("a");
                newItem.href = "catalogue/" + item.id;
                newItem.classList.add("card");
                newItem.style = "width: 20rem;";
                newItem.innerHTML = catalogueItemTemplate.innerHTML;
                newItem.querySelector("img").src = item.img1;
                newItem.querySelector("img").style =
                    "height:200px; object-fit:contain;";
                newItem.querySelector(".card-text").textContent =
                    item.brand + " " + item.model + " " + "€" + item.price;

                catalogueIndex.prepend(newItem);
                if (i == 10) {
                    catalogueItemTemplate.remove();
                    return;
                }
            }
        });
</script>

<?php
require_once "./templates/footer.php"
?>