<?php
require_once "./templates/header.php"
?>

<div class="bg-secondary mt-5">
	<div class="d-flex justify-content-center p-3">
		<h3>Filter items</h3>
	</div>

	<form class="filter d-flex justify-content-center mt-1 pt-1 gap-2">
		<select class="form-select filter_select filter_type " style="width: 10rem; height:3rem;" aria-label="Default select example">
			<option value="*" selected>Product type</option>
		</select>
		<select class="form-select filter_select filter_brand" style="width: 7rem; height:3rem;" aria-label="Default select example">
			<option value="*" selected>Brand</option>
		</select>
		<select class="form-select filter_select filter_color" style="width: 7rem; height:3rem;" aria-label="Default select example">
			<option value="*" selected>Color</option>
		</select>
		<select class="form-select filter_select filter_connection" style="width: 10rem; height:3rem;" aria-label="Default select example">
			<option value="*" selected>Connection</option>
		</select>
		<button class="btn clear_filter" style="width: 7rem; height:3rem;">Clear</button>
		<select class="form-select sort" name="sort" style="width: 8rem; height:3rem;">
			<option value="" selected>Sort</option>
			<option value="asc">From lower to higher</option>
			<option value="desc">From higher to lower</option>
		</select>
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


<script>
	fetch("http://localhost:8000/api/getAllProducts")
		.then(async (response) => await response.json())
		.then((data) => {
			let res = data.data;
			let brandArray = [];
			let typeArray = [];
			let colorArray = [];
			let connArray = [];
			for (let product of res) {
				brandArray.push(product["brand"]);
				typeArray.push(product["type"]);
				colorArray.push(product["color"]);
				connArray.push(product["connection"]);
			}
			brandArray = Array.from(new Set(brandArray));
			typeArray = Array.from(new Set(typeArray));
			colorArray = Array.from(new Set(colorArray));
			connArray = Array.from(new Set(connArray));

			const brandSelect = document.querySelector(".filter_brand");
			const typeSelect = document.querySelector(".filter_type");
			const colorSelect = document.querySelector(".filter_color");
			const connSelect = document.querySelector(".filter_connection");


			for (let brand of brandArray) {
				const newOption = document.createElement("option");
				newOption.value = brand;
				newOption.textContent = brand;
				brandSelect.append(newOption)
			}
			for (let type of typeArray) {
				const newOption = document.createElement("option");
				newOption.value = type;
				newOption.textContent = type;
				typeSelect.append(newOption)
			}
			for (let color of colorArray) {
				const newOption = document.createElement("option");
				newOption.value = color;
				newOption.textContent = color;
				colorSelect.append(newOption)
			}
			for (let conn of connArray) {
				const newOption = document.createElement("option");
				newOption.value = conn;
				newOption.textContent = conn;
				connSelect.append(newOption)
			}
			if (location.search.length) {
				let query = location.search;
				query = query.replace("?", "");
				let queryArr = query.split("&");
				let queryFilters = {};
				queryArr.forEach(el => {
					let splitEl = el.split("=");
					queryFilters[splitEl[0]] = splitEl[1];
				})
				for (let [filter, value] of Object.entries(queryFilters)) {
					document.querySelector(`.filter_${filter}`).value = value;
				}
				filterFunction();
			}

		});

	const displayItems = function(items) {
		const catalogue = document.querySelector(".catalogue");
		const catalogueItemTemplate = document.querySelector(
			".catalogue-card-template"
		);
		catalogue.innerHTML = catalogueItemTemplate.outerHTML;
		if (!items.length) {
			document.querySelector(".no-products").classList.remove("visually-hidden");
			return;
		} else {
			document.querySelector(".no-products").classList.add("visually-hidden")
		}
		for (let item of items) {
			const newItem = document.createElement("div");
			newItem.className = "card adding-product";
			newItem.style = "width: 18rem;";
			newItem.innerHTML = catalogueItemTemplate.innerHTML;
			newItem.querySelector(".card-link").href = "http://localhost:8000/catalogue/" + item.id;
			newItem.querySelector("img").src = item.img1;
			newItem.querySelector("img").style =
				"height: 200px; object-fit:contain;";
			newItem.querySelector(".add-to-cart-btn").dataset['id'] = item.id;
			newItem.querySelector(".card-text").textContent =
				item.brand + " " + item.model + " " + "€" + item.price;

			catalogue.append(newItem);
		}

	}
	const getAll = function() {
		fetch("http://localhost:8000/api/getAllProducts")
			.then((response) => response.json())
			.then((data) => {
				displayItems(data.data)
			});

		document.querySelector(".no-products").classList.add("visually-hidden")
	}
	getAll();


	const filterFunction = function() {
		let data = new FormData();
		data.set("type", document.querySelector(".filter_type").value);
		data.set("brand", document.querySelector(".filter_brand").value);
		data.set("color", document.querySelector(".filter_color").value);
		data.set("connection", document.querySelector(".filter_connection").value);
		data.set("sort", document.querySelector(".sort").value);

		fetch("http://localhost:8000/api/getFilteredProducts", {
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
		document.querySelector(".sort").value = "";
		getAll(event);
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