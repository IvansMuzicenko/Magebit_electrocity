<?php
require_once "./templates/header.php";
if (!isset($_SESSION["user"]) || !isset($_SESSION["user"]["id"])) {
  header("Location: http://localhost:8000/auth");
  die();
}
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
  <p class="h1 text-center m-5 mb-2">History</p>
  <div class="list-group history">

    <a href="" class="history-item-template">
      <div id="cartItems" class="container d-flex flex-lg-row flex-column align-items-center justify-content-lg-between">
        <img id="cartImg" class="history-item-img rounded" style="object-fit:contain;" src="">
        <p id="cartText" class="history-item-brand fs-5 fw-bold"></p>
        <p id="cartText" class="history-item-price fs-5 fw-light"></p>
        <p id="cartText" class="history-item-total fs-5 fw-light"></p>
      </div>
      <p id="cartText" class="history-item-date fs-5 fw-light mx-2"></p>
      <p class="history-item-status fs-5 fw-bold m-0"></p>
    </a>

  </div>
</div>

<script>
  fetch("http://localhost:8000/api/orders/getOrdersById/" + <?php echo $_SESSION["user"]["id"] ?>).then(response => response.json()).then(data => {
    const itemTemplate = document.querySelector(".history-item-template");
    const historyField = document.querySelector(".history");
    const statuses = ["Pending", "Completed", "Shipped", "Cancelled", "Refunded"];
    for (let item of data.data) {

      let newItem = document.createElement("a");
      newItem.innerHTML = itemTemplate.innerHTML;
      newItem.className = "list-group-item list-group-item-action d-flex flex-lg-row flex-column align-items-center justify-content-lg-between";
      newItem.href = "http://localhost:8000/catalogue/" + item.product_id;
      newItem.querySelector(".history-item-img").src = item.img1;
      newItem.querySelector(".history-item-brand").textContent = item.brand + " " + item.model;
      newItem.querySelector(".history-item-price").textContent = "€" + item.price + " x " + item.amount;
      newItem.querySelector(".history-item-date").textContent = item.order_date;
      newItem.querySelector(".history-item-status").textContent = statuses[Math.floor(Math.random() * 5)];

      const total = newItem.querySelector(".history-item-total");
      if (item.amount < 2) {
        total.remove();

      } else {
        total.textContent = "Total: €" + (Number(item.price) * Number(item.amount))
      }
      historyField.append(newItem);
    }
    itemTemplate.remove();
    localStorage.setItem("loader", JSON.stringify(false))
  })
</script>



<?php
require_once "./templates/footer.php"
?>