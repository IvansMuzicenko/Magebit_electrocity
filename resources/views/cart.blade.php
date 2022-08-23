<?php
require_once "./templates/header.php"
?>

<div id="cart" class="container m-auto bg-secondary p-3 align-items-center rounded">
    <p class="h1 text-center mb-2">Cart</p>

    <div id="cartList" class="list-group d-flex m-auto">

        <a href="catalogue/1" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between" aria-current="true">
            <div id="cartItems" class="conatiner d-flex">
                <img id="cartImg" class="rounded" src="https://m.media-amazon.com/images/I/61BnR2NE4PL._AC_SX679_.jpg" alt="">
                <p id="cartBrand" class="fs-6 fw-bold mt-auto mb-auto p-1">Logitech</p>
                <p id="carkModel" class="fs-6 fw-light mt-auto mb-auto ">G201</p>
                <p id="cartPrice" class="fs-6 fw-bold mt-auto mb-auto p-3">20,99 €</p>
            </div>
            <i id="status" href="#" class="fs-5 fw-bold m-0"><img src="../assets/images/delete.svg" alt=""></i>
        </a>
        
        <a href="catalogue/1" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between" aria-current="true">
            <div id="cartItems" class="conatiner d-flex">
                <img id="cartImg" class="rounded" src="https://m.media-amazon.com/images/I/61BnR2NE4PL._AC_SX679_.jpg" alt="">
                <p id="cartBrand" class="fs-6 fw-bold mt-auto mb-auto p-1">Logitech</p>
                <p id="carkModel" class="fs-6 fw-light mt-auto mb-auto">G201</p>
                <p id="cartPrice" class="fs-6 fw-bold mt-auto mb-auto p-3">20,99 €</p>
            </div>
            <i id="status" href="#" class="fs-5 fw-bold m-0"><img src="../assets/images/delete.svg" alt=""></i>
        </a>
        <a href="catalogue/1" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between" aria-current="true">
            <div id="cartItems" class="conatiner d-flex">
                <img id="cartImg" class="rounded" src="https://m.media-amazon.com/images/I/61BnR2NE4PL._AC_SX679_.jpg" alt="">
                <p id="cartBrand" class="fs-6 fw-bold mt-auto mb-auto p-1">Logitech</p>
                <p id="carkModel" class="fs-6 fw-light mt-auto mb-auto">G201</p>
                <p id="cartPrice" class="fs-6 fw-bold mt-auto mb-auto p-3">20,99 €</p>
            </div>
            <i id="status" href="#" class="fs-5 fw-bold m-0"><img src="../assets/images/delete.svg" alt=""></i>
        </a>
    </div>

    <div class="btn d-grid gap-2 col-6 mx-auto m-3 fw-bold">purchase</div>
</div>

<?php
require_once "./templates/footer.php"
?>