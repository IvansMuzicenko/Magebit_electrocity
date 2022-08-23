<?php
require_once "./templates/header.php"
?>

<style>
	.add-container {
		width: 366px;
		border-radius: 20px;
	}
</style>

<h2 class="d-flex justify-content-center mb-4">Add new product</h2>
<div class="add-container bg-secondary d-flex justify-content-center container p-3">
	<form action="#">
		<div class="container flex-column d-flex justify-content-between gap-3">

			<select id="add-type" name="product_type" class="form-select" style="width: 10rem;">
				<option selected>Product type</option>
				<option value="mouse">Mouse</option>
				<option value="keyboard">Keyboard</option>
				<option value="headset">Headset</option>
			</select>

			<input type="text" name="product_brand" id="add-brand" placeholder="Brand name" style="width: 10rem;" class="form-control">

			<input type="text" name="product_model" id="add-model" placeholder="Model name" style="width: 10rem;" class="form-control">

			<input type="text" name="product_color" id="add-color" placeholder="Color" style="width: 10rem;" class="form-control">

			<select id="add-connection" class="form-select" name="product_connection" style="width: 10rem;">
				<option selected>Connection</option>
				<option value="usb">USB</option>
				<option value="wireless">Wireless</option>
				<option value="3.5mm">3.5mm</option>
			</select>

			<input type="text" name="product_price" id="add-price" placeholder="Price" style="width: 10rem;" class="form-control">



			<input type="text" name="product_img1" id="add-img_1" style="width: 10rem;" class="form-control" placeholder="Picture 1">
			<input type="text" name="product_img2" id="add-img_2" style="width: 10rem;" class="form-control" placeholder="Picture 2">
			<input type="text" name="product_img3" id="add-img_3" style="width: 10rem;" class="form-control" placeholder="Picture 3">
		</div>
		<div class="d-flex justify-content-center mb-3 mt-3">
			<button type="submit" class="btn btn-primary btn-lg">Add product</button>
		</div>
	</form>
</div>






<?php
require_once "./templates/footer.php"
?>