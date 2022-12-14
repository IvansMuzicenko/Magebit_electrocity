let addingProduct = document.querySelectorAll(".adding-product");
let totalPrice = 0;

if (document.querySelector(".logout-btn")) {
    document.querySelector(".logout-btn").onclick = function () {
        fetch("http://localhost:8000/api/auth/logout")
            .then((response) => response.json())
            .then((data) => {
                if (data) {
                    location.pathname = "/auth";
                }
            });
    };
}

localStorage.setItem("loader", JSON.stringify(true));
localStorage.setItem("cartLoader", JSON.stringify(true));

if (localStorage.getItem("cart") == null) {
    localStorage.setItem("cart", JSON.stringify({}));
}

// Total cart price calculations
const calcTotal = function (value) {
    totalPrice += value;
    setTotal(totalPrice);
    localStorage.setItem("cartLoader", JSON.stringify(false));
};

// Total cart price reset
const resetTotal = function () {
    totalPrice = 0;
};

//Total cart price display
const setTotal = function (totalPrice) {
    document.querySelectorAll(".cart-total").forEach((total) => {
        total.textContent = "€" + totalPrice;
    });
};

// Item delete from cart and refresh cart
const deleteFromCart = function (productId) {
    let cart = JSON.parse(localStorage.getItem("cart"));
    delete cart[productId];
    localStorage.setItem("cart", JSON.stringify(cart));
    resetTotal();
    fillCart();
};

// Item amount change in cart and refresh cart
const changeProductAmount = function (productId, newAmount) {
    let cart = JSON.parse(localStorage.getItem("cart"));
    cart[productId] = newAmount;
    localStorage.setItem("cart", JSON.stringify(cart));
    resetTotal();
    fillCart();
};

// Display cart items
const fillCart = function () {
    let cart = JSON.parse(localStorage.getItem("cart"));
    const cartField = document.querySelector(".small-cart-list");
    const cartItemTemplate = document.querySelector(".cart-item-template");
    const cartPageField = document.querySelector(".cart-list");

    cartField.innerHTML = cartItemTemplate.outerHTML;
    if (cartPageField) {
        cartPageField.innerHTML = cartItemTemplate.outerHTML;
    }

    for (let productId of Object.keys(cart)) {
        if (!productId) {
            localStorage.setItem("cartLoader", JSON.stringify(false));
            return;
        }
        fetch("http://localhost:8000/api/getProductById/" + productId)
            .then((response) => response.json())
            .then((data) => {
                const dbItem = data.data[0];
                let newItem = document.createElement("div");
                newItem.innerHTML = cartItemTemplate.innerHTML;
                newItem.className =
                    "cart-item-bg bg-secondary d-flex flex-lg-row flex-column mb-3 justify-content-center align-items-center";
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

                if (cartPageField) {
                    let cloneItem = newItem.cloneNode(true);
                    cloneItem.querySelector(".cart-item-amount").onchange =
                        () =>
                            changeProductAmount(
                                productId,
                                cloneItem.querySelector(".cart-item-amount")
                                    .value
                            );
                    cloneItem.querySelector(".cart-item-remove").onclick = () =>
                        deleteFromCart(productId);
                    if (
                        !cartPageField.innerHTML.includes(cloneItem.outerHTML)
                    ) {
                        cartPageField.append(cloneItem);
                    }
                }
                if (!cartField.innerHTML.includes(newItem.outerHTML)) {
                    cartField.append(newItem);
                }
                calcTotal(cart[productId] * dbItem["price"]);
            });
    }
    localStorage.setItem("cartLoader", JSON.stringify(false));
};
fillCart();

// Item add to cart and refresh cart
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

// Checking for loader disable
const loaderInterval = setInterval(() => {
    const loader = localStorage.getItem("loader");
    const cartLoader = localStorage.getItem("cartLoader");
    if (loader == "false" && cartLoader == "false") {
        clearInterval(loaderInterval);
        if (document.querySelector(".loader")) {
            document.querySelector(".loader").remove();
        }
    }
}, 500);
