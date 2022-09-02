<?php
require_once "./templates/header.php";
if (isset($_SESSION["user"]) || isset($_SESSION["user"]["id"])) {
  header("Location: http://localhost:8000/");
  die();
}
?>

<!--SIGN IN-->
<div>
  <form class="signIn container  d-flex flex-column align-items-center">
    <div class="bg-secondary d-flex p-3 flex-column align-items-center gap-3">
      <h2 class="text-center mb-3">User Login</h2>
      <div class="form-floating mb-2">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="login_email" />
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating mb-2">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="login_password" />
        <label for="floatingPassword">Password</label>
      </div>
      <button type="submit" class="btn btn-primary btn-lg">Log-in</button>
      <p>Don't have an account? <button id="signUpLink">Sign-up!</button></p>
    </div>
  </form>

  <!--SIGN UP-->

  <form class="signUp container  d-flex flex-column align-items-center visually-hidden">
    <div class="bg-secondary d-flex p-3 flex-column align-items-center gap-3">

      <h2 class="text-center mb-3">User registration</h2>

      <div class="form-floating mb-2">
        <input type="text" class="form-control" name="reg_firsname" placeholder="Jurijs" />
        <label for="floatingInput">Your name</label>
      </div>
      <div class="form-floating mb-2">
        <input type="text" class="form-control" name="reg_lastname" placeholder="Baranovskis" />
        <label for="floatingInput">Your surname</label>
      </div>
      <div class="form-floating mb-2">
        <input type="email" class="form-control" name="reg_email" placeholder="name@example.com" />
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating mb-2">
        <input class="form-control" placeholder="Street, city, zip-code" id="floatingTextarea2" name="reg_address"></input>
        <label for="floatingTextarea2">Street, city, zip-code</label>
      </div>
      <div class="form-floating mb-2">
        <input type="password" class="form-control" name="reg_pass" placeholder="Password" />
        <label for="floatingPassword">Password</label>
      </div>
      <div class="form-floating mb-2">
        <input type="password" class="form-control" name="reg_conf_pass" placeholder="Password" />
        <label for="floatingPassword">Repeat password</label>
      </div>

      <button type="submit" class="btn btn-primary btn-lg">Register</button>
      <p class="d-flex justify-content-center mb-2 ">Already have an account? <button id="signInLink">Log-in</button></p>
    </div>
  </form>
</div>

<?php
require_once "./templates/footer.php"
?>

<?php
require_once "./assets/scripts/auth.php"
?>

<?php
require_once "./templates/htmlEnd.php"
?>