<?php
require_once "./templates/header.php"
?>

<div class="cart container m-auto bg-secondary p-3 align-items-center rounded">
    <p class="h1 text-center mb-2">Cart</p>

    <div class="cart-list list-group d-flex m-auto">
    </div>

    <p class="w-100 text-center">Total: <span class="cart-total"></span></p>

    <div class="btn d-grid gap-2 col-6 mx-auto m-3 fw-bold">Purchase</div>
</div>

<?php
require_once "./templates/footer.php"
?>