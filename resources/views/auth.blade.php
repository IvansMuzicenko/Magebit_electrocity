<?php
require_once "./templates/header.php"
?>

<!--SIGN IN-->

<div class="container d-flex justify-content-around mt-5">
  <div class="signIn bg-secondary p-3 visually-hidden">
    <h2 class="d-flex justify-content-center mb-5">User Login</h2>
    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" />
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" />
      <label for="floatingPassword">Password</label>
    </div>
    <div class="d-flex justify-content-center mb-3">
      <button type="submit" class="btn btn-primary btn-lg">Log-in</button>
    </div>
    <p>Don't have an account? <a href="">Sign-up!</a></p>
  </div>

  <!--SIGN UP-->

  <form class="signUp bg-secondary p-3 ">
    <h2 class="d-flex justify-content-center mb-5">User registration</h2>
    <div class="reg-container-main d-flex gap-3">
      <div class="reg-container-1">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="reg-name" placeholder="Jurijs" />
          <label for="floatingInput">Your name</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="reg-surname" placeholder="Baranovskis" />
          <label for="floatingInput">Your surname</label>
        </div>
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="reg-email" placeholder="name@example.com" />
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="reg-pw-1" placeholder="Password" />
          <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="reg-pw-2" placeholder="Password" />
          <label for="floatingPassword">Repeat password</label>
        </div>
      </div>
      <div class="reg-container-2 ">
        <div class="form-floating">
          <input class="form-control" placeholder="Street, city, zip-code" id="floatingTextarea2" style="height: 250px"></input>
          <label for="floatingTextarea2">Street, city, zip-code</label>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center mb-5 mt-5">
      <button type="submit" class="btn btn-primary btn-lg">Register</button>
    </div>
    <p class="d-flex justify-content-center mb-3 ">Already have an account? <a href="">Log-in</a></p>
  </form>
</div>




<?php
require_once "./templates/footer.php"
?>