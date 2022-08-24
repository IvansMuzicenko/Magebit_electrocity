<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Electrocity</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/style.css">
</head>

<body>
  <nav class=" navbar navbar-expand-lg bg-main text-white">
    <div class="container-fluid">
      <a class="navbar-brand p-0 d-flex align-center" href="/">
        <img src="../assets/images/logoW.svg" alt="" width="" height="40" class="d-inline-block align-text-top">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/catalogue">Catalogue</a>
        </li>
        <li class="nav-item">
          <!--OFFCANVAS-->
          <a class="nav-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Cart</a>
          <!--/OFFCANVAS-->
        </li>
        <?php if (isset($_SESSION["user"])) :; ?>
          <li class="nav-item">
            <a class="nav-link" href="/profile"><?php echo $_SESSION["user"]["firstname"] . " " . $_SESSION["user"]["lastname"]; ?></a>
          </li>
        <?php endif; ?>

        <?php if (!isset($_SESSION["user"])) :; ?>
          <li class="nav-item">
            <a class="nav-link" href="/auth">Login</a>
          </li>
        <?php endif; ?>
        <?php if (isset($_SESSION["user"])) :; ?>
          <li class="nav-item">
            <a class="nav-link" onclick="fetch('api/auth/logout').then(location.pathname = '/auth')">Logout</a>
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

    <div class="offcanvas-body">
      <div class="cart-item-bg bg-secondary d-flex justify-content-between align-items-center">
        <a href="/catalogue/1" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between" aria-current="true">
          <div id="cartItems" class="container d-flex justify-content-between align-items-center">
            <img id="cartImg" class="rounded" src="https://m.media-amazon.com/images/I/61BnR2NE4PL._AC_SX679_.jpg" alt="">
            <p id="cartBrand" class="fs-6 fw-bold mt-auto mb-auto p-1">Logitech</p>
            <p id="carkModel" class="fs-6 fw-light mt-auto mb-auto">G201</p>
            <p id="cartPrice" class="fs-6 fw-bold mt-auto mb-auto p-3">20,99 €</p>
          </div>
        </a>
        <input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text text-center" size="4">
        <button id="cart-item-remove" href="#" class="fs-5 fw-bold ms-5 me-3"><img src="../assets/images/delete.svg" alt=""></button>
      </div>
    </div>


    <a href="cart" class="d-flex justify-content-center mt-5 mb-5" style="text-decoration:none">
      <button class="btn btn-primary btn-lg">View your cart</button>
    </a>
  </div>
  <!--/OFFCANVAS BODY-->

  <!-- todo main block height to maximum -->
  <main class="wrapper">