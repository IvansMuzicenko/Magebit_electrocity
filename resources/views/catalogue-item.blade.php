<?php
require_once "./templates/header.php"
?>

<div id="productCard" class="card d-flex adding-product mt-3 mb-3">
  <div id="productCarousel" class="carousel slide" data-bs-interval="3000" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="" class="img1 img-fluid" alt="...">
      </div>
      <div class="carousel-item">
        <img src="" class="img2 img-fluid" alt="...">
      </div>
      <div class="carousel-item">
        <img src="" class="img3 img-fluid" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="card-body text-center">
    <p class="card-title fs-2 fw-bold brand"></p>
    <p class="card-title fs-4 fw-light model"></p>
    <p class="card-text description"></p>
    <h3 class="card-title"><span class="price"></span>€</h3>

  </div>
  <ul class="list-group list-group-flush text-center">
    <li class="list-group-item">Brand: <span class="brand fw-bold"></span></li>
    <li class="list-group-item">Model: <span class="model fw-bold"></span></li>
    <li class="list-group-item">Color: <span class="color fw-bold"></span></li>
    <li class="list-group-item">Connection type: <span class="connection fw-bold"></span></li>
  </ul>
  <div class="card-body d-flex flex-column align-items-center">
    <input type="number" min="1" value="1" class="add-to-cart-amount" placeholder="qty" style="width: 3rem;">
    <a id="add" class="card-link btn btn-primary btn-lg add-to-cart-btn mt-3">Add to cart</a>
  </div>
</div>

<?php
require_once "./templates/footer.php"
?>

<?php
require_once "./assets/scripts/catalogueItem.php"
?>

<?php
require_once "./templates/htmlEnd.php"
?>