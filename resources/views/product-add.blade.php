<?php
require_once "./templates/header.php"
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
      <option value="mouse">Mouse</option>
      <option value="keyboard">Keyboard</option>
      <option value="headset">Headset</option>
    </select>

    <input type="text" name="product_brand" id="add-brand" style="width: 15rem;" class="form-control" placeholder="Brand name">

    <input type="text" name="product_model" id="add-model" style="width: 15rem;" class="form-control" placeholder="Model name">

    <input type="text" name="product_color" id="add-color" style="width: 15rem;" class="form-control" placeholder="Color">

    <select name="product_connection" id="add-connection" style="width: 15rem;" class="form-select">
      <option selected>Connection</option>
      <option value="usb">USB</option>
      <option value="wireless">Wireless</option>
      <option value="3.5mm">3.5mm</option>
    </select>

    <input type="text" name="product_price" id="add-price" style="width: 15rem;" class="form-control" placeholder="Price">

    <input type="text" name="product_img1" id="add-img_1" style="width: 15rem;" class="form-control" placeholder="Picture 1">
    <input type="text" name="product_img2" id="add-img_2" style="width: 15rem;" class="form-control" placeholder="Picture 2">
    <input type="text" name="product_img3" id="add-img_3" style="width: 15rem;" class="form-control" placeholder="Picture 3">
    <button type="submit" class="btn btn-primary btn-lg">Add product</button>

  </form>
</div>






<?php
require_once "./templates/footer.php"
?>