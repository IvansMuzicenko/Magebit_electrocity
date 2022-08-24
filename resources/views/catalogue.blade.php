<?php
require_once "./templates/header.php"
?>

<div class="bg-secondary mt-5">
	<div class="d-flex justify-content-center p-3">
		<h3>Filter items</h3>
	</div>

	<form class="filter d-flex justify-content-center mt-1 pt-1 gap-2">
		<select class="form-select filter_select filter_type" style="width: 10rem;" aria-label="Default select example">
			<option value="*" selected>Product type</option>
			<option value="Mouse">Mouse</option>
			<option value="Keyboard">Keyboard</option>
			<option value="Headsets">Headsets</option>
		</select>
		<select class="form-select filter_select filter_brand" style="width: 10rem;" aria-label="Default select example">
			<option value="*" selected>Brand</option>
			<option value="Logitech">Logitech</option>
			<option value="Steel Series">Steel Series</option>
			<option value="Dell">Dell</option>
			<option value="Razer">Razer</option>
			<option value="Corsair">Corsair</option>
			<option value="Redragon">Redragon</option>
		</select>
		<select class="form-select filter_select filter_color" style="width: 10rem;" aria-label="Default select example">
			<option value="*" selected>Color</option>
			<option value="Black">Black</option>
			<option value="White">White</option>
			<option value="Colored">Colored</option>
		</select>
		<select class="form-select filter_select filter_connection" style="width: 10rem;" aria-label="Default select example">
			<option value="*" selected>Connection</option>
			<option value="USB">USB</option>
			<option value="Wireless">Wireless</option>
			<option value="3.5mm">3.5mm</option>
		</select>
		<button class="btn clear_filter">Clear filter</button>
		<select class="form-select sort" name="sort">
			<option value="asc">From lower to higher</option>
			<option value="desc" selected>From higher to lower</option>
		</select>
	</form>

	<div class="catalogue row m-0 d-flex justify-content-center gap-2 mb-5 pb-2 pt-5 mt-3">
		<a href="" class="card catalogue-card-template" hidden style="width: 18rem;">
			<div>
				<img src="..." class="card-img-top" alt="...">
				<div class="card-body">
					<p class="card-text"></p>
				</div>
			</div>
		</a>

	</div>
</div>

<script>
	const displayItems = function(items) {

		const catalogue = document.querySelector(".catalogue");
		const catalogueItemTemplate = document.querySelector(
			".catalogue-card-template"
		);
		catalogue.innerHTML = catalogueItemTemplate.outerHTML;
		for (let item of items) {
			const newItem = document.createElement("a");
			newItem.href = "catalogue/" + item.id;
			newItem.classList.add("card");
			newItem.style = "width: 18rem;";
			newItem.innerHTML = catalogueItemTemplate.innerHTML;
			newItem.querySelector("img").src = item.img1;
			newItem.querySelector("img").style =
				"height: 200px; object-fit:contain;";
			newItem.querySelector(".card-text").textContent =
				item.brand + " " + item.model + " " + "€" + item.price;

			catalogue.append(newItem);
		}

	}
	fetch("api/getAllProducts")
		.then((response) => response.json())
		.then((data) => {
			displayItems(data.data)
		});

	const filterFunction = function(event) {
		event.preventDefault();

		let data = new FormData();
		data.set("type", document.querySelector(".filter_type").value);
		data.set("brand", document.querySelector(".filter_brand").value);
		data.set("color", document.querySelector(".filter_color").value);
		data.set("connection", document.querySelector(".filter_connection").value);
		data.set("sort", document.querySelector(".sort").value);

		fetch("api/getFilteredProducts", {
			method: "POST",
			body: data,
		}).then(response => response.json()).then(data => {
			displayItems(data.data);
		})
	}

	document.querySelector(".clear_filter").onclick = function(event) {
		event.preventDefault();
		document.querySelector(".filter_type").value = "*";
		document.querySelector(".filter_brand").value = "*";
		document.querySelector(".filter_color").value = "*";
		document.querySelector(".filter_connection").value = "*";
		filterFunction(event);
	}

	document.querySelectorAll(".filter_select").forEach(select => {
		select.onchange = filterFunction;
	})
	document.querySelector(".sort").onchange = filterFunction;

	document.querySelector(".filter").onsubmit = (e) => e.preventDefault();
</script>


<?php
require_once "./templates/footer.php"
?>