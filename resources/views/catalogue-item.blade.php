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


<script>
  const productId = location.pathname.split("/")[2];

  fetch("http://localhost:8000/api/getProductById/" + productId)
    .then(async response =>
      await response.json())
    .then((data) => {
      if (!data.data.length) {
        location.pathname = "404"
      }

      document.querySelector(".img1").src = data.data[0].img1;
      document.querySelector(".img2").src = data.data[0].img2;
      document.querySelector(".img3").src = data.data[0].img3;
      document.querySelectorAll(".brand").forEach(el => el.textContent = data.data[0].brand)
      document.querySelectorAll(".model").forEach(el => el.textContent = data.data[0].model)
      document.querySelector(".price").textContent = data.data[0].price;
      document.querySelector(".color").textContent = data.data[0].color;
      document.querySelector(".connection").textContent = data.data[0].connection;
      document.querySelector(".add-to-cart-btn").dataset['id'] = data.data[0].id;

      switch (data.data[0].brand) {
        case "Logitech":
          document.querySelector(".description").innerHTML = "A Swiss company focused on innovation and quality, Logitech designs products and experiences that have an everyday place in people's lives. Founded in 1981 in Lausanne, Switzerland, and quickly expanding to the Silicon Valley, Logitech started connecting people through innovative computer peripherals and many industry firsts, including the infrared cordless mouse, the thumb-operated trackball, the laser mouse, and more.";
          break;
        case "DELL":
          document.querySelector(".description").innerHTML = "Dell Technologies Inc (Dell) is a provider of desktop personal computers, software, and peripherals. The company designs, develops, manufactures, markets, sells, and supports information technology infrastructure such as laptops, desktops, mobiles, workstations, storage devices, software, cloud solutions and notebooks. ";
          break;
        case "Steelseries":
          document.querySelector(".description").innerHTML = "SteelSeries (styled as steelseries) is a Danish manufacturer of gaming peripherals and accessories, including headsets, keyboards, mice, controllers, and mousepads. SteelSeries was acquired by GN Store Nord in 2021."
          break;
        case "Razer":
          document.querySelector(".description").innerHTML = "The triple-headed snake trademark of Razer is one of the most recognized logos in the global gaming and esports communities. With a fan base that spans every continent, the company has designed and built the world’s largest gamer-focused ecosystem of hardware, software and services."
          break;
        default:
          document.querySelector(".description").innerHTML = "New product in e-store"

      }
      localStorage.setItem("loader", JSON.stringify(false))
    });
</script>



<?php
require_once "./templates/footer.php"
?>