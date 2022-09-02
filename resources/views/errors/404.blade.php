<?php
require_once "./templates/header.php"
?>

<div class="page d-flex flex-column justify-content-center">
  <h2 class="mt-3 text-center fs-3"> ERROR 404 !! Your page could not be loaded! Play a game meanwhile?!</h2>
  <div class="game">
    <h1 class="game__results"></h1>
    <h1>Player <span class="game__turn">1</span> turn</h1>
    <div class="game__area">

    </div>

    <button class="game__reset">
      Reset
    </button>
    <p>Player 1 (X) | Player 2 (O)</p>
  </div>
</div>

<?php
require_once "./templates/footer.php"
?>

<?php
require_once "./assets/scripts/404.php"
?>

<?php
require_once "./templates/htmlEnd.php"
?>