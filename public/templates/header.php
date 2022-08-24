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
                    <a class="nav-link" href="/cart">Cart</a>
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
    <!-- todo main block height to maximum -->
    <main class="wrapper">