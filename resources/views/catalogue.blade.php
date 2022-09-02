<?php
require_once "./templates/header.php"
?>

<div class="bg-secondary mt-5">
	<div class="d-flex justify-content-center p-3">
		<h3>Filter items</h3>
	</div>

	<form class="filter d-flex justify-content-center flex-wrap mt-1 pt-1 gap-2">
		<select class="form-select filter_select filter_type " style=" width:100%; max-width: 7rem; height:3rem;" aria-label="Default select example">
			<option value="*" selected>Product type</option>
		</select>
		<select class="form-select filter_select filter_brand" style="width:100%; max-width: 7rem; height:3rem;" aria-label="Default select example">
			<option value="*" selected>Brand</option>
		</select>
		<select class="form-select filter_select filter_color" style="width:100%; max-width: 7rem; height:3rem;" aria-label="Default select example">
			<option value="*" selected>Color</option>
		</select>
		<select class="form-select filter_select filter_connection" style="width:100%; max-width: 7rem; height:3rem;" aria-label="Default select example">
			<option value="*" selected>Connection</option>
		</select>
		<select class="form-select sort" name="sort" style="width:100%; max-width: 7rem; height:3rem;">
			<option value="" selected>Sort</option>
			<option value="asc">From lower to higher</option>
			<option value="desc">From higher to lower</option>
		</select>
		<button class="btn clear_filter" style="width:100%; max-width: 7rem; height:3rem;">Clear</button>
	</form>

	<p class="w-100 my-5 fs-5 text-center visually-hidden no-products">No products found</p>
	<div class="catalogue row m-0 d-flex justify-content-center gap-2 mb-5 pb-2 pt-5 mt-3">
		<div class="card catalogue-card-template" hidden style="width: 18rem;">
			<a class="card-link">
				<img src="" class="card-img-top" alt="...">
				<div class="card-body">
					<p class="card-text text-center"></p>
				</div>
			</a>
			<div class="d-flex flex-column align-items-center">
				<input type="number" min="1" value="1" class="add-to-cart-amount" placeholder="Amount" style="width: 3rem;">
				<button class="btn btn-primary mt-3 mb-3 add-to-cart-btn">Add to cart</button>
			</div>
		</div>
	</div>
</div>

<?php
require_once "./templates/footer.php"
?>

<?php
require_once "./assets/scripts/catalogue.php"
?>

<?php
require_once "./templates/htmlEnd.php"
?>