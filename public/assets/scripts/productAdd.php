<script>
    window.onload = () => {
        localStorage.setItem("loader", JSON.stringify(false));
    }

    // Image select method switch
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

    // Sending new product validated data to api
    document.querySelector("form").onsubmit = function(event) {
        event.preventDefault();

        const data = new FormData(this);
        let brand = document.querySelector(".product_brand").value;
        let model = document.querySelector(".product_model").value;
        let color = document.querySelector(".product_color").value;
        let connection = document.querySelector(".product_connection").value;
        let price = document.querySelector(".product_price").value;
        let img1 = document.querySelector(".product_img1").value;
        let img2 = document.querySelector(".product_img2").value;
        let img3 = document.querySelector(".product_img3").value;
        let file_images = document.querySelector(".product_file_images");

        if (!brand || !model || !color || !connection || !price) {
            return alert("Please fill all fields")
        }
        if ((!img1 || !img2 || !img3) && document.querySelector("#url-add").checked) {
            return alert("Please provide 3 images")
        }

        if (file_images.files.length != 3 && document.querySelector("#file-add").checked) {
            return alert("Please provide 3 images")
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