<script>
    <?php require_once "./assets/script.js" ?>
    const productId = location.pathname.split("/")[2];

    // Displaying product data
    fetch("http://localhost:8000/api/getProductById/" + productId)
        .then(async response =>
            await response.json())
        .then((data) => {
            if (!data.data.length) {
                location.pathname = "404"
            }

            document.querySelector(".img1").src = data.data[0].img1;
            document.querySelector(".img2").src = data.data[0].img2;
            document.querySelector(".img3").src = data.data[0].img3;
            document.querySelectorAll(".brand").forEach(el => el.textContent = data.data[0].brand)
            document.querySelectorAll(".model").forEach(el => el.textContent = data.data[0].model)
            document.querySelector(".price").textContent = data.data[0].price;
            document.querySelector(".color").textContent = data.data[0].color;
            document.querySelector(".connection").textContent = data.data[0].connection;
            document.querySelector(".add-to-cart-btn").dataset['id'] = data.data[0].id;

            document.querySelector(".add-to-cart-btn").onclick = function() {
                addToCart(
                    data.data[0].id,
                    document.querySelector(".add-to-cart-amount").value
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

            switch (data.data[0].brand) {
                case "Logitech":
                    document.querySelector(".description").innerHTML = "A Swiss company focused on innovation and quality, Logitech designs products and experiences that have an everyday place in people's lives. Founded in 1981 in Lausanne, Switzerland, and quickly expanding to the Silicon Valley, Logitech started connecting people through innovative computer peripherals and many industry firsts, including the infrared cordless mouse, the thumb-operated trackball, the laser mouse, and more.";
                    break;
                case "DELL":
                    document.querySelector(".description").innerHTML = "Dell Technologies Inc (Dell) is a provider of desktop personal computers, software, and peripherals. The company designs, develops, manufactures, markets, sells, and supports information technology infrastructure such as laptops, desktops, mobiles, workstations, storage devices, software, cloud solutions and notebooks. ";
                    break;
                case "Steelseries":
                    document.querySelector(".description").innerHTML = "SteelSeries (styled as steelseries) is a Danish manufacturer of gaming peripherals and accessories, including headsets, keyboards, mice, controllers, and mousepads. SteelSeries was acquired by GN Store Nord in 2021."
                    break;
                case "Razer":
                    document.querySelector(".description").innerHTML = "The triple-headed snake trademark of Razer is one of the most recognized logos in the global gaming and esports communities. With a fan base that spans every continent, the company has designed and built the world’s largest gamer-focused ecosystem of hardware, software and services."
                    break;
                default:
                    document.querySelector(".description").innerHTML = "New product in e-store"

            }
            localStorage.setItem("loader", JSON.stringify(false))
        });
</script>