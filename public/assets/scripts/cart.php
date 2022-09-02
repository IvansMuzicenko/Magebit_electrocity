<script>
    window.onload = () => {
        localStorage.setItem("loader", JSON.stringify(false));
    }
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