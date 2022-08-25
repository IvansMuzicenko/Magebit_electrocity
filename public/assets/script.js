const productId = location.pathname.split("/")[2];

if (localStorage.getItem("cart") == null) {
    localStorage.setItem("cart", JSON.stringify({}));
}

const deleteFromCart = function (productId) {
    let cart = JSON.parse(localStorage.getItem("cart"));
    delete cart[productId];
    localStorage.setItem("cart", JSON.stringify(cart));
    fillCart();
};
const changeProductAmount = function (productId, newAmount) {
    let cart = JSON.parse(localStorage.getItem("cart"));
    cart[productId] = newAmount;
    localStorage.setItem("cart", JSON.stringify(cart));
};
const fillCart = function () {
    let cart = JSON.parse(localStorage.getItem("cart"));
    const cartField = document.querySelector(".small-cart-items");
    const cartItemTemplate = document.querySelector(".cart-item-template");

    cartField.innerHTML = cartItemTemplate.outerHTML;
    //fill cart after cart change

    for (let productId of Object.keys(cart)) {
        fetch("http://localhost:8000/api/getProductById/" + productId)
            .then((response) => response.json())
            .then((data) => {
                const dbItem = data.data[0];
                let newItem = document.createElement("div");
                newItem.innerHTML = cartItemTemplate.innerHTML;
                newItem.className =
                    "cart-item-bg bg-secondary d-flex mb-3 justify-content-between align-items-center";
                newItem.querySelector(".cart-item-link").href =
                    "/catalogue/" + productId;
                newItem.querySelector(".cart-item-img").src = dbItem["img1"];
                newItem.querySelector(".cart-item-brand").textContent =
                    dbItem["brand"];
                newItem.querySelector(".cart-item-model").textContent =
                    dbItem["model"];
                newItem.querySelector(".cart-item-price").textContent =
                    "€" + dbItem["price"];
                newItem.querySelector(".cart-item-amount").value =
                    cart[productId];
                newItem.querySelector(".cart-item-amount").onchange = () =>
                    changeProductAmount(
                        productId,
                        newItem.querySelector(".cart-item-amount").value
                    );

                newItem.querySelector(".cart-item-remove").onclick = () =>
                    deleteFromCart(productId);
                cartField.append(newItem);
            });
    }
};
fillCart();

//from product-item page

const addToCart = function (event, productId) {
    const amount = document.querySelector(".amount").value;

    let cart = JSON.parse(localStorage.getItem("cart"));

    cart[productId] = cart[productId]
        ? Number(cart[productId]) + Number(amount)
        : Number(amount);
    localStorage.setItem("cart", JSON.stringify(cart));
    fillCart();
};
document.querySelector(".add-to-cart").onclick = () =>
    addToCart(event, productId);
