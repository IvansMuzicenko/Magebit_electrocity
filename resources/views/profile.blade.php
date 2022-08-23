<?php
require_once "./templates/header.php"
?>


<div id="profile" class="container m-auto bg-secondary p-3 align-items-center rounded">
    <!-- PROFILE -->
    <p class="h1 text-center mb-2">Profile:</p>
    <table class="table text-center ">
        <tr class="row m-auto">
            <th class="col table-light fw-light">Name:</th>
            <td id="profileName" class="col table-light fw-bold">Ivans</td>
        </tr>
        <tr class="row m-auto">
            <th class="col table-light fw-light">Lastname:</th>
            <td id="profileLast" class="col table-light fw-bold">Ivanovs</td>
        </tr>
        <tr class="row m-auto ">
            <th class="col table-light  fw-light">Email:</th>
            <td id="profileEmail" class="col table-light fw-bold">ivans.ivanovs@gmail.com</td>
        </tr>
        <tr class="row m-auto ">
            <th class="col table-light  fw-light">Street:</th>
            <td id="profileStreet" class="col table-light fw-bold">Ivanova iela</td>
        </tr>
    </table>

    <!-- HISTORY -->
    <p class="h1 text-center m-5 mb-2">Purchases</p>
    <div class="list-group">

        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between" aria-current="true">
            <div id="cartItems" class="conatiner d-flex">
                <img id="cartImg" class="rounded" src="https://m.media-amazon.com/images/I/61BnR2NE4PL._AC_SX679_.jpg" alt="">
                <p id="cartText" class="fs-6 fw-bold">Logitech</p>
                <p id="cartText" class="fs-6 fw-bold">G201</p>
                <p id="cartText" class="fs-6 fw-light">20,99 €</p>
            </div>
            <p id="status" class="fs-5 fw-bold m-0">Ready</p>
        </a>


        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between" aria-current="true">
            <div id="cartItems" class="conatiner d-flex">
                <img id="cartImg" class="rounded" src="https://m.media-amazon.com/images/I/61BnR2NE4PL._AC_SX679_.jpg" alt="">
                <p id="cartText" class="fs-6 fw-bold">Logitech</p>
                <p id="cartText" class="fs-6 fw-bold">G201</p>
                <p id="cartText" class="fs-6 fw-light">20,99 €</p>
            </div>
            <p id="status" class="fs-5 fw-bold m-0">Ready</p>
        </a>

        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between" aria-current="true">
            <div id="cartItems" class="conatiner d-flex">
                <img id="cartImg" class="rounded" src="https://m.media-amazon.com/images/I/61BnR2NE4PL._AC_SX679_.jpg" alt="">
                <p id="cartText" class="fs-6 fw-bold">Logitech</p>
                <p id="cartText" class="fs-6 fw-bold">G201</p>
                <p id="cartText" class="fs-6 fw-light">20,99 €</p>
            </div>
            <p id="status" class="fs-5 fw-bold m-0">Ready</p>
        </a>

        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between" aria-current="true">
            <div id="cartItems" class="conatiner d-flex">
                <img id="cartImg" class="rounded" src="https://m.media-amazon.com/images/I/61BnR2NE4PL._AC_SX679_.jpg" alt="">
                <p id="cartText" class="fs-6 fw-bold">Logitech</p>
                <p id="cartText" class="fs-6 fw-bold">G201</p>
                <p id="cartText" class="fs-6 fw-light">20,99 €</p>
            </div>
            <p id="status" class="fs-5 fw-bold m-0">Ready</p>
        </a>
    </div>
</div>




<?php
require_once "./templates/footer.php"
?>