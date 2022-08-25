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
  <div class="list-group history">

    <a href="" class="history-item-template list-group-item list-group-item-action d-flex align-items-center justify-content-between ">
      <div id="cartItems" class="container d-flex">
        <img id="cartImg" class="history-item-img rounded" src="" alt="">
        <p id="cartText" class="history-item-brand fs-5 fw-bold"></p>
        <p id="cartText" class="history-item-model fs-5 fw-bold"></p>
        <p id="cartText" class="history-item-price fs-5 fw-light"></p>
      </div>
      <p class="history-item-status fs-5 fw-bold m-0">Ready</p>
    </a>

  </div>
</div>

<script>
  //TODO history fetch and display data
</script>



<?php
require_once "./templates/footer.php"
?>