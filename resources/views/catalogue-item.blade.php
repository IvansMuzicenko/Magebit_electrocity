<?php
require_once "./templates/header.php"
?>


<div class="container  d-flex bg-secondary rounded mt-5">
    <div id="carouselExampleControls" class="carousel carousel-dark  slide m-auto" data-bs-ride="carousel" style="width: 500px; height: 500px; background: #fff;">
        <div class="carousel-inner ">
            <div class="carousel-item active ">
                <img src="https://m.media-amazon.com/images/I/61BnR2NE4PL._AC_SX679_.jpg" class="d-block" style=" object-fit:contain;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://images.1a.lv/display/aikido/store/d0c195dba74d40b9ca74217ef16b1dae.jpg?h=742&w=816" class="d-block" style=" object-fit: contain;" alt="...">
            </div>
            <div class="carousel-item ">
                <img src="https://images.1a.lv/display/aikido/store/b9c609996e2660635b608e2c2032850c.jpg?h=742&w=816" class="d-block" style=" object-fit: contain;" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container">
        <div class="display-3 text-center">Logitech</div>
        <p class="text-uppercase text-center">G201</p>
        <div class="lead text-center">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis, aperiam. Ex non explicabo nam totam veniam, provident repellendus deserunt exercitationem doloribus? Quibusdam quia minus, possimus consequatur neque sequi tenetur maiores.
        </div>
        <p class="fs-2 text-center mt-3">Price: <span class="fs-2 ">20,99 €</span></p>

        <table class="table table-hover table-striped text-center">
            <tr class="row m-auto">
                <th class="col">Brand</th>
                <td class="col">Logitech</td>
            </tr>
            <tr class="row m-auto">
                <th class="col">Model</th>
                <td class="col">G201</td>
            </tr>
            <tr class="row m-auto">
                <th class="col">Color</th>
                <td class="col">Blue</td>
            </tr>
            <tr class="row m-auto">
                <th class="col">Connection</th>
                <td class="col">USB</td>
            </tr>
        </table>
        <div class="btn d-grid gap-2 col-6 mx-auto m-3">Add</div>
    </div>

</div>


<?php
require_once "./templates/footer.php"
?>