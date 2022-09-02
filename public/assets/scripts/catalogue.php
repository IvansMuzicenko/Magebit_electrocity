<script>
    <?php require_once "./assets/script.js" ?>
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
            newItem.querySelector(".card-text").innerHTML =
                item.brand + " " + item.model + "<br>" + "€" + item.price;
            newItem.querySelector(".add-to-cart-btn").onclick = function() {
                addToCart(
                    item.id,
                    newItem.querySelector(".add-to-cart-amount").value
                )
                this.classList.add("added");
                document.querySelector(".cart-link").classList.add("added");
                setTimeout(() => {
                    this.classList.remove("added");
                    document
                        .querySelector(".cart-link")
                        .classList.remove("added");
                }, 1000);
            }

            catalogue.append(newItem);
        }
        localStorage.setItem("loader", JSON.stringify(false))

    }

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

    filterFunction();

    document.querySelector(".clear_filter").onclick = function(event) {
        event.preventDefault();
        document.querySelector(".filter_type").value = "*";
        document.querySelector(".filter_brand").value = "*";
        document.querySelector(".filter_color").value = "*";
        document.querySelector(".filter_connection").value = "*";
        document.querySelector(".sort").value = "";
        filterFunction();
    }

    document.querySelectorAll(".filter_select").forEach(select => {
        select.onchange = filterFunction;
    })
    document.querySelector(".sort").onchange = filterFunction;

    document.querySelector(".filter").onsubmit = (e) => e.preventDefault();
</script>