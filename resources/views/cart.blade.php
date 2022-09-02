<?php
require_once "./templates/header.php";
if (!isset($_SESSION["user"]) || !isset($_SESSION["user"]["id"])) {
    header("Location: http://localhost:8000/auth");
    die();
}
?>

<div class="cart container  align-items-center ">
    <p class="h1 text-center mb-2">Cart</p>

    <div class="cart-list list-group d-flex w-100 justify-content-center align-items-center">
    </div>

    <p class="w-100 text-center">Total: <span class="cart-total"></span></p>

    <div class="btn d-grid gap-2 col-6 mx-auto m-3 fw-bold purchase">Purchase</div>
</div>

<?php
require_once "./templates/footer.php"
?>

<?php
require_once "./assets/scripts/cart.php"
?>

<?php
require_once "./templates/htmlEnd.php"
?>