<?php
require_once "./templates/header.php"
?>

<div class="product-item-template">
    <div id="productItem" class="container  d-flex bg-secondary rounded mt-5">
        <div id="itemsCarousel" class="carousel carousel-dark  slide m-auto" data-bs-ride="carousel" style="width: 500px; height: 500px; background: #fff;">
            <div class="carousel-inner ">
                <div class="carousel-item active">
                    <img src="" class="d-block img1" style=" object-fit:contain;" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="" class="d-block img2" style=" object-fit: contain;" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="" class="d-block img3" style=" object-fit: contain;" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#itemsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#itemsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container">
            <div class="display-3 text-center brand"></div>
            <p class="text-uppercase text-center model"></p>
            <div class="description text-center">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis, aperiam. Ex non explicabo nam totam veniam, provident repellendus deserunt exercitationem doloribus? Quibusdam quia minus, possimus consequatur neque sequi tenetur maiores.
            </div>
            <p class="fs-2 text-center mt-3 ">Price: <span class="fs-2 price"></span></p>

            <table class="table table-hover table-striped text-center">
                <tr class="row m-auto">
                    <th class="col">Brand</th>
                    <td class="col brand"></td>
                </tr>
                <tr class="row m-auto">
                    <th class="col">Model</th>
                    <td class="col model"></td>
                </tr>
                <tr class="row m-auto">
                    <th class="col">Color</th>
                    <td class="col color"></td>
                </tr>
                <tr class="row m-auto">
                    <th class="col">Connection</th>
                    <td class="col connection"></td>
                </tr>
            </table>
            <div class="btn d-grid gap-2 col-6 mx-auto m-3">Add</div>
        </div>
    </div>
</div>



<script>
    fetch("/api/getProductById/" + location.pathname.split("/")[2])
        .then(async response => await response.json())
        .then((data) => {
            console.log(data);
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
        });
</script>

<?php
require_once "./templates/footer.php"
?>