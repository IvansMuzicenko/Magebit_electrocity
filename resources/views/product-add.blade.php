<?php
require_once "./templates/header.php";
?>

<style>
  .add-container {
    width: 366px;
    border-radius: 20px;
  }
</style>

<div class="add-container bg-secondary d-flex justify-content-center container p-3 mt-3 mb-3 ">
  <form action="#" class="container flex-column d-flex align-items-center gap-3 ">

    <h2 class="d-flex justify-content-center ">Add new product</h2>

    <select name="product_type" id="add-type" style="width: 15rem;" class="form-select">
      <option selected>Product type</option>
      <option value="Mouse">Mouse</option>
      <option value="Keyboard">Keyboard</option>
      <option value="Headset">Headset</option>
    </select>

    <input type="text" name="product_brand" id="add-brand" style="width: 15rem;" class="form-control" placeholder="Brand name">

    <input type="text" name="product_model" id="add-model" style="width: 15rem;" class="form-control" placeholder="Model name">

    <input type="text" name="product_color" id="add-color" style="width: 15rem;" class="form-control" placeholder="Color">

    <select name="product_connection" id="add-connection" style="width: 15rem;" class="form-select">
      <option selected>Connection</option>
      <option value="Usb">USB</option>
      <option value="Wireless">Wireless</option>
      <option value="3.5mm">3.5mm</option>
    </select>

    <input type="number" name="product_price" id="add-price" style="width: 15rem;" class="form-control" placeholder="Price">

    <input type="text" name="product_img1" id="add-img_1" style="width: 15rem;" class="form-control" placeholder="Picture 1">
    <input type="text" name="product_img2" id="add-img_2" style="width: 15rem;" class="form-control" placeholder="Picture 2">
    <input type="text" name="product_img3" id="add-img_3" style="width: 15rem;" class="form-control" placeholder="Picture 3">
    <button type="submit" class="btn btn-primary btn-lg">Add product</button>

  </form>
</div>


<script>
  const userId =
    <?php
    if (isset($_SESSION["user"]) && isset($_SESSION["user"]["id"])) {
      echo $_SESSION["user"]["id"];
    } else echo 0
    ?>;
  if (userId != 1) {
    location.pathname = "/auth";
  }

  document.querySelector("form").onsubmit = function(event) {
    event.preventDefault();

    const data = new FormData();
    data.set("type", document.querySelector("[name='product_type']").value);
    data.set("brand", document.querySelector("[name='product_brand']").value);
    data.set("model", document.querySelector("[name='product_model']").value);
    data.set("color", document.querySelector("[name='product_color']").value);
    data.set("connection", document.querySelector("[name='product_connection']").value);
    data.set("price", document.querySelector("[name='product_price']").value);
    data.set("img1", document.querySelector("[name='product_img1']").value);
    data.set("img2", document.querySelector("[name='product_img2']").value);
    data.set("img3", document.querySelector("[name='product_img3']").value);
    fetch("api/addProduct", {
      method: "POST",
      body: data,
    }).then(response => response.json()).then(data => {
      if (data) {
        location.pathname = "";
      }
    })
  }
</script>



<?php
require_once "./templates/footer.php"
?>