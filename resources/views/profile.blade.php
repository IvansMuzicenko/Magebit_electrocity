<?php
require_once "./templates/header.php"
?>


<div id="profile" class="container m-auto bg-secondary p-3 rounded mt-3 mb-3">
  <!-- PROFILE -->
  <p class="h1 text-center mb-2 text-start">Profile</p>

  <table class="table text-center d-flex flex-column align-items-center">
    <tbody class="w-100 ms-4">
      <tr class="row w-100 ">
        <th class="col table-light fw-light text-start">Name:</th>
        <td id="profileName" class="col table-light fw-bold text-break text-start"><?php echo $_SESSION["user"]["firstname"] ?></td>
      </tr>
      <tr class="row w-100 ">
        <th class="col table-light fw-light text-start">Lastname:</th>
        <td id="profileLast" class="col table-light fw-bold text-break text-start"><?php echo $_SESSION["user"]["lastname"] ?></td>
      </tr>
      <tr class="row w-100 ">
        <th class="col table-light fw-light text-start  ">Email:</th>
        <td id="profileEmail" class="col table-light fw-bold text-break text-start"><?php echo $_SESSION["user"]["email"] ?></td>
      </tr>
      <tr class="row w-100 ">
        <th class="col  table-light fw-light text-start">Street:</th>
        <td id="profileStreet" class="col table-light fw-bold text-break text-start"><?php echo $_SESSION["user"]["address"] ?></td>
      </tr>
    </tbody>
  </table>

  <!-- HISTORY -->
  <p class="h1 text-center m-5 mb-2">Purchases</p>
  <div class="list-group ">

    <a href="catalogue/1" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between " aria-current="true">
      <div id="cartItems" class="container d-flex">
        <img id="cartImg" class="rounded" src="https://m.media-amazon.com/images/I/61BnR2NE4PL._AC_SX679_.jpg" alt="">
        <p id="cartText" class="fs-5 fw-bold">Logitech</p>
        <p id="cartText" class="fs-5 fw-bold">G201</p>
        <p id="cartText" class="fs-5 fw-light">20,99 €</p>
      </div>
      <p id="status" class="fs-5 fw-bold m-0">Ready</p>
    </a>


    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between " aria-current="true">
      <div id="cartItems" class="container d-flex">
        <img id="cartImg" class="rounded" src="https://m.media-amazon.com/images/I/61BnR2NE4PL._AC_SX679_.jpg" alt="">
        <p id="cartText" class="fs-5 fw-bold">Logitech</p>
        <p id="cartText" class="fs-5 fw-bold">G201</p>
        <p id="cartText" class="fs-5 fw-light">20,99 €</p>
      </div>
      <p id="status" class="fs-5 fw-bold m-0">Ready</p>
    </a>

    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between " aria-current="true">
      <div id="cartItems" class="container d-flex">
        <img id="cartImg" class="rounded" src="https://m.media-amazon.com/images/I/61BnR2NE4PL._AC_SX679_.jpg" alt="">
        <p id="cartText" class="fs-5 fw-bold">Logitech</p>
        <p id="cartText" class="fs-5 fw-bold">G201</p>
        <p id="cartText" class="fs-5 fw-light">20,99 €</p>
      </div>
      <p id="status" class="fs-5 fw-bold m-0">Ready</p>
    </a>

    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between " aria-current="true">
      <div id="cartItems" class="container d-flex">
        <img id="cartImg" class="rounded" src="https://m.media-amazon.com/images/I/61BnR2NE4PL._AC_SX679_.jpg" alt="">
        <p id="cartText" class="fs-5 fw-bold">Logitech</p>
        <p id="cartText" class="fs-5 fw-bold">G201</p>
        <p id="cartText" class="fs-5 fw-light">20,99 €</p>
      </div>
      <p id="status" class="fs-5 fw-bold m-0">Ready</p>
    </a>
  </div>
</div>




<?php
require_once "./templates/footer.php"
?>