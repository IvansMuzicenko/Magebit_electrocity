fetch("api/getAllProducts")
    .then((response) => response.json())
    .then((data) => {
        const catalogueIndex = document.querySelector(".catalogue-index");
        const catalogueItemTemplate = document.querySelector(
            ".catalogue-index-card-template"
        );
        let i = 0;
        for (let item of data.data) {
            i++;
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

            catalogueIndex.prepend(newItem);
            if (i == 10) {
                catalogueItemTemplate.remove();
                return;
            }
        }
    });
