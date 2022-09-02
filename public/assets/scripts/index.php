<script>
    fetch("http://localhost:8000/api/getAllProducts")
        .then((response) => response.json())
        .then((data) => {
            const catalogueIndex = document.querySelector(".catalogue-index");
            const catalogueItemTemplate = document.querySelector(
                ".catalogue-index-card-template"
            );

            let i = 0;
            let appendTarget


            if (window.innerWidth > 1000) {
                appendTarget = document.querySelectorAll('.carousel-item-wrapper');

            } else {
                appendTarget = document.querySelectorAll('.catalogue-index')
            }

            for (let item of data.data) {
                i++;
                const newItem = document.createElement("a");
                newItem.href = "catalogue/" + item.id;
                newItem.classList.add("card");
                newItem.style = "width: 20rem; height: 20rem;";
                newItem.innerHTML = catalogueItemTemplate.innerHTML;
                newItem.querySelector("img").src = item.img1;
                newItem.querySelector("img").style =
                    "max-width: 20rem; width: 100%; height: 10rem; object-fit:contain;";
                newItem.querySelector(".card-text").innerHTML =
                    item.brand + " " + item.model + "<br>" + "€" + item.price;


                let n = 0;
                if (appendTarget.length > 1) {
                    if (i > 5) {
                        n = 1
                        if (i > 10) {
                            n = 2
                        }
                    }
                }
                appendTarget[n].append(newItem);
                if (i > 15) {
                    catalogueItemTemplate.remove()
                    localStorage.setItem("loader", JSON.stringify(false));
                    return;
                }
            }

        });
</script>