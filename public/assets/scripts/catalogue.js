fetch("api/getAllProducts")
    .then((response) => response.json())
    .then((data) => {
        const catalogue = document.querySelector(".catalogue");
        const catalogueItemTemplate = document.querySelector(
            ".catalogue-card-template"
        );
        for (let item of data.data) {
            const newItem = document.createElement("a");
            newItem.href = "catalogue/" + item.id;
            newItem.classList.add("card");
            newItem.style = "width: 18rem;";
            newItem.innerHTML = catalogueItemTemplate.innerHTML;
            newItem.querySelector("img").src = item.img1;
            newItem.querySelector("img").style =
                "height: 200px; object-fit:contain;";
            newItem.querySelector(".card-text").textContent =
                item.brand + " " + item.model + " " + item.price;

            catalogue.append(newItem);
        }
        catalogueItemTemplate.remove();
    });
