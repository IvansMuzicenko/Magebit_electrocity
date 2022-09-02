<script>
  fetch("http://localhost:8000/api/orders/getOrdersById/" + <?php echo $_SESSION["user"]["id"] ?>).then(response => response.json()).then(data => {
    const itemTemplate = document.querySelector(".history-item-template");
    const historyField = document.querySelector(".history");
    const statuses = ["Pending", "Completed", "Shipped", "Cancelled", "Refunded"];
    for (let item of data.data) {

      let newItem = document.createElement("a");
      newItem.innerHTML = itemTemplate.innerHTML;
      newItem.className = "list-group-item list-group-item-action d-flex flex-lg-row flex-column align-items-center justify-content-lg-between";
      newItem.href = "http://localhost:8000/catalogue/" + item.product_id;
      newItem.querySelector(".history-item-img").src = item.img1;
      newItem.querySelector(".history-item-brand").textContent = item.brand + " " + item.model;
      newItem.querySelector(".history-item-price").textContent = "€" + item.price + " x " + item.amount;
      newItem.querySelector(".history-item-date").textContent = item.order_date;
      newItem.querySelector(".history-item-status").textContent = statuses[Math.floor(Math.random() * 5)];

      const total = newItem.querySelector(".history-item-total");
      if (item.amount < 2) {
        total.remove();

      } else {
        total.textContent = "Total: €" + (Number(item.price) * Number(item.amount))
      }
      historyField.append(newItem);
    }
    itemTemplate.remove();
    localStorage.setItem("loader", JSON.stringify(false))
  })
</script>