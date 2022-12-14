<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Electrocity</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="http://localhost:8000/assets/style.css">
</head>
<div class="loader">
  <div class="loader-wrapper">
    <img src="http://localhost:8000/assets/images/logoW.svg" alt="">
  </div>
</div>

<body>
  <nav class=" navbar navbar-expand-lg bg-main text-white">
    <div class="container-fluid ms-1">
      <a class="navbar-brand p-0 d-flex align-center" href="http://localhost:8000/">
        <img src="http://localhost:8000/assets/images/logoW.svg" alt="" width="" height="64" class="d-inline-block align-text-top" style="max-width: 10rem;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse me-3" id="navbarNavDropdown">
      <ul class="navbar-nav text-center d-flex gap-3 justify-content-center align-items-center">
        <?php if (isset($_SESSION["user"]) && isset($_SESSION["user"]['id']) && $_SESSION["user"]["id"] == 1) :; ?>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost:8000/product-add">Add product</a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost:8000/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost:8000/catalogue">Catalogue</a>
        </li>
        <li class="nav-item">
          <!--OFFCANVAS-->
          <a class="nav-link cart-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Cart</a>
          <!--/OFFCANVAS-->
        </li>
        <?php if (isset($_SESSION["user"])) :; ?>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost:8000/profile"><?php echo $_SESSION["user"]["firstname"] . " " . $_SESSION["user"]["lastname"]; ?></a>
          </li>
        <?php endif; ?>

        <?php if (!isset($_SESSION["user"])) :; ?>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost:8000/auth">Login</a>
          </li>
        <?php endif; ?>
        <?php if (isset($_SESSION["user"])) :; ?>
          <li class="nav-item">
            <a class="nav-link logout-btn">Logout</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>


  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasRightLabel">Your cart</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body small-cart-list">
      <div class="cart-item-template visually-hidden ">
        <a href="" class="cart-item-link w-100 d-flex  justify-content-between align-items-center" aria-current="true">
          <div class="cart-item container d-flex flex-lg-row flex-column justify-content-between align-items-center">
            <img class="cart-item-img rounded" style="object-fit:contain; max-width:5rem; width:100%; max-height:5rem; " src="" alt="">
            <p class="cart-item-brand fs-6 fw-bold mt-auto mb-auto p-1"></p>
            <p class="cart-item-model fs-6 fw-light mt-auto mb-auto"></p>
            <p class="cart-item-price fs-6 fw-bold mt-auto mb-auto p-3"></p>
          </div>
        </a>
        <div class="d-flex flex-lg-row flex-column ">
          <input type="number" step="1" min="1" value="1" class="cart-item-amount input-text qty text text-center" size="4">
          <button class="fs-5 fw-bold mx-2 cart-item-remove"><img src="http://localhost:8000/assets/images/delete.svg" alt=""></button>
        </div>
      </div>
    </div>


    <p class="w-100 text-center">
      Total: <span class="cart-total"></span>
    </p>
    <a href="http://localhost:8000/cart" class="d-flex justify-content-center mt-2 mb-5" style="text-decoration:none">
      <button class="btn btn-primary btn-lg">View your cart</button>
    </a>
  </div>
  <!--/OFFCANVAS BODY-->

  <main class="wrapper">