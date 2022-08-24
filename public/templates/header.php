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

    <div class="offcanvas-body small-cart-items">
      <div class="cart-item-template visually-hidden">
        <a href="" class="cart-item-link w-100 d-flex align-items-center" aria-current="true">
          <div class="cart-item container d-flex justify-content-between align-items-center">
            <img class="cart-item-img rounded" src="" alt="">
            <p class="cart-item-brand fs-6 fw-bold mt-auto mb-auto p-1"></p>
            <p class="cart-item-model fs-6 fw-light mt-auto mb-auto"></p>
            <p class="cart-item-price fs-6 fw-bold mt-auto mb-auto p-3"></p>
          </div>
        </a>
        <div class="d-flex">
          <input type="number" step="1" min="1" value="1" class="cart-item-amount input-text qty text text-center" size="4">
          <button href="#" class="fs-5 fw-bold mx-2 cart-item-remove"><img src="../assets/images/delete.svg" alt=""></button>
        </div>
      </div>
    </div>


    <a href="cart" class="d-flex justify-content-center mt-5 mb-5" style="text-decoration:none">
      <button class="btn btn-primary btn-lg">View your cart</button>
    </a>
  </div>
  <!--/OFFCANVAS BODY-->

  <!-- todo main block height to maximum -->
  <main class="wrapper">