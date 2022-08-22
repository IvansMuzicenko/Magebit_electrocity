<?php
require_once "./templates/header.php"
?>


<div class="container">
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between" aria-current="true">
            <div id="cartItems" class="conatiner d-flex">
                <img id="cartImg" class="rounded" src="https://m.media-amazon.com/images/I/61BnR2NE4PL._AC_SX679_.jpg" alt="">
                <p id="cartText" class="fs-6 fw-bold">Logitech</p>
                <p id="cartText" class="fs-6 fw-bold">G201</p>
                <p id="cartText" class="fs-6 fw-light">20,99 €</p>
            </div>
            <p id="status" class="fs-5 fw-bold">Ready</p> 
        </a>
        <a href="#" class="list-group-item list-group-item-action">A second link item</a>
        <a href="#" class="list-group-item list-group-item-action">A third link item</a>
        <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
    </div>
</div>


<?php
require_once "./templates/footer.php"
?>