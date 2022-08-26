<?php
require_once "./templates/header.php";
if (!isset($_SESSION["user"]) || !isset($_SESSION["user"]["id"])) {
    header("Location: http://localhost:8000/auth");
    die();
}
?>

<div class="cart container m-auto bg-secondary p-3 align-items-center rounded">
    <p class="h1 text-center mb-2">Cart</p>

    <div class="cart-list list-group d-flex m-auto">
    </div>

    <p class="w-100 text-center">Total: <span class="cart-total"></span></p>

    <div class="btn d-grid gap-2 col-6 mx-auto m-3 fw-bold purchase">Purchase</div>
</div>

<script>
    document.querySelector(".purchase").onclick = function() {
        const cart = JSON.parse(localStorage.getItem("cart"));

        for (let [productId, amount] of Object.entries(cart)) {
            const data = new FormData();
            data.set("product_id", productId);
            data.set("amount", amount);
            data.set("customer_id", <?php echo $_SESSION["user"]["id"] ?>);
            data.set("customer_email", "<?php echo $_SESSION["user"]["email"] ?>");
            data.set("customer_address", "<?php echo $_SESSION["user"]["address"] ?>");
            fetch("http://localhost:8000/api/orders/placeOrder", {
                method: "POST",
                body: data,
            }).then(response => response.json()).then(data => {
                if (data) {
                    let cart = JSON.parse(localStorage.getItem("cart"));
                    delete cart[productId];
                    localStorage.setItem("cart", JSON.stringify(cart));
                } else {
                    return alert("error: something went wrong");
                }
            })

        }
        alert("Order placed, thanks for purchases!");
        location.reload();
    }
</script>

<?php
require_once "./templates/footer.php"
?>