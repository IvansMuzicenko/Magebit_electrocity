const productId = location.pathname.split("/")[2];
let addingProduct = document.querySelectorAll(".adding-product");

let totalPrice = 0;

if (localStorage.getItem("cart") == null) {
    localStorage.setItem("cart", JSON.stringify({}));
}

const calcTotal = function (value) {
    totalPrice += value;
    getTotal(totalPrice);
};

const resetTotal = function () {
    totalPrice = 0;
};
const getTotal = function (totalPrice) {
    document.querySelectorAll(".cart-total").forEach((total) => {
        total.textContent = "€" + totalPrice;
    });
};

const deleteFromCart = function (productId) {
    let cart = JSON.parse(localStorage.getItem("cart"));
    delete cart[productId];
    localStorage.setItem("cart", JSON.stringify(cart));
    resetTotal();
    fillCart();
};
const changeProductAmount = function (productId, newAmount) {
    let cart = JSON.parse(localStorage.getItem("cart"));
    cart[productId] = newAmount;
    localStorage.setItem("cart", JSON.stringify(cart));
    resetTotal();
    fillCart();
};
const fillCart = function () {
    let cart = JSON.parse(localStorage.getItem("cart"));
    const cartField = document.querySelector(".small-cart-items");
    const cartItemTemplate = document.querySelector(".cart-item-template");
    const cartPageField = document.querySelector(".cart-list");

    cartField.innerHTML = cartItemTemplate.outerHTML;
    if (cartPageField) {
        cartPageField.innerHTML = cartItemTemplate.outerHTML;
    }

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
                    "http://localhost:8000/catalogue/" + productId;
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

                let newItemCopy = document.createElement("div");
                newItemCopy.innerHTML = newItem.innerHTML;
                newItemCopy.className =
                    "cart-item-bg bg-secondary d-flex mb-3 justify-content-between align-items-center";
                cartField.append(newItem);
                if (cartPageField) {
                    cartPageField.append(newItemCopy);
                }
                calcTotal(cart[productId] * dbItem["price"]);
            });
    }
};
fillCart();

//from product-item page

const addToCart = function (productId, amount) {
    let cart = JSON.parse(localStorage.getItem("cart"));

    cart[productId] = cart[productId]
        ? Number(cart[productId]) + Number(amount)
        : Number(amount);
    if (Number(amount) < 1) {
        return;
    }
    localStorage.setItem("cart", JSON.stringify(cart));
    resetTotal();
    fillCart();
};

const interval = setInterval(() => {
    addingProduct = document.querySelectorAll(".adding-product");
    if (addingProduct.length) {
        clearInterval(interval);
        for (let product of addingProduct) {
            const addBtn = product.querySelector(".add-to-cart-btn");
            const productId = addBtn.dataset["id"];
            addBtn.onclick = () =>
                addToCart(
                    productId,
                    product.querySelector(".add-to-cart-amount").value
                );
        }
    }
}, 500);
