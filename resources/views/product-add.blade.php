<?php
require_once "./templates/header.php";
if (!isset($_SESSION["user"]) || !isset($_SESSION["user"]["id"]) || $_SESSION["user"]["id"] != 1) {
  header("Location: http://localhost:8000/");
  die();
}
?>

<style>
  .add-container {
    max-width: 366px;
    width: 100%;
    border-radius: 20px;
  }
</style>

<div class="add-container bg-secondary d-flex justify-content-center container p-3 mt-3 mb-3 ">
  <form action="#" class="container flex-column d-flex align-items-center gap-3 ">

    <h2 class="d-flex justify-content-center ">Add new product</h2>

    <select name="product_type" id="add-type" style="max-width: 15rem; width:100%" class="form-select">
      <option selected>Product type</option>
      <option value="Mouse">Mouse</option>
      <option value="Keyboard">Keyboard</option>
      <option value="Headset">Headset</option>
    </select>

    <input type="text" name="product_brand" id="add-brand" style="max-width: 15rem; width:100%" class="form-control" placeholder="Brand name">

    <input type="text" name="product_model" id="add-model" style="max-width: 15rem; width:100%" class="form-control" placeholder="Model name">

    <input type="text" name="product_color" id="add-color" style="max-width: 15rem; width:100%;" class="form-control" placeholder="Color">

    <select name="product_connection" id="add-connection" style="max-width: 15rem; width:100%" class="form-select">
      <option selected>Connection</option>
      <option value="Usb">USB</option>
      <option value="Wireless">Wireless</option>
      <option value="3.5mm">3.5mm</option>
    </select>

    <input type="number" name="product_price" id="add-price" style="max-width: 15rem; width:100%" class="form-control" placeholder="Price">

    <div class="d-flex w-100 justify-content-evenly method-select">
      <div>
        <input type="radio" checked id="url-add" name="image_type" value="url">
        <label for="url-add">URL</label><br>
      </div>
      <div>
        <input type="radio" id="file-add" name="image_type" value="file">
        <label for="file-add">File</label><br>
      </div>
    </div>

    <div class="url-images">
      <input type="text" name="product_img1" id="add-img_1" style="max-width: 15rem; width:100%" class="form-control" placeholder="Picture 1">
      <input type="text" name="product_img2" id="add-img_2" style="max-width: 15rem; width:100%" class="form-control" placeholder="Picture 2">
      <input type="text" name="product_img3" id="add-img_3" style="max-width: 15rem; width:100%" class="form-control" placeholder="Picture 3">
    </div>

    <div class="file-images visually-hidden">
      <input type="file" id="fileImages" name="product_images[]" multiple style="max-width: 15rem; width:100%" class="form-control" placeholder="Pictures">
    </div>

    <button type="submit" class="btn btn-primary btn-lg">Add product</button>

  </form>
</div>


<script>
  window.onload = () => {
    localStorage.setItem("loader", JSON.stringify(false));
  }

  document.querySelector(".method-select").onchange = function() {
    const urlChecked = document.querySelector("#url-add").checked;
    const fileChecked = document.querySelector("#file-add").checked;
    const fileBlock = document.querySelector(".file-images")
    const urlBlock = document.querySelector(".url-images")
    if (urlChecked) {
      fileBlock.classList.add("visually-hidden")
      urlBlock.classList.remove("visually-hidden")
      fileBlock.querySelector("#fileImages").disabled = true;
      urlBlock.querySelectorAll("input").forEach(el => el.disabled = false)
    } else {
      urlBlock.classList.add("visually-hidden")
      fileBlock.classList.remove("visually-hidden")
      urlBlock.querySelectorAll("input").forEach(el => el.disabled = true)
      fileBlock.querySelector("#fileImages").disabled = false;
    }

  }





  document.querySelector("form").onsubmit = function(event) {
    event.preventDefault();

    const data = new FormData(this);

    if (document.querySelector("#fileImages").files.length > 3) {
      return
    }

    fetch("http://localhost:8000/api/addProduct", {
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