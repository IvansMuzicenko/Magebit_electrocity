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

<script>
  const signUpLink = document.querySelector("#signUpLink");
  const signInLink = document.querySelector("#signInLink");

  const signIn = document.querySelector(".signIn");
  const signUp = document.querySelector(".signUp");
  window.onload = () => {
    localStorage.setItem("loader", JSON.stringify(false));
  }

  signUpLink.onclick = function(e) {
    e.preventDefault();
    signIn.classList.add("visually-hidden");
    signUp.classList.remove("visually-hidden");
  };

  signInLink.onclick = function(e) {
    e.preventDefault();
    signIn.classList.remove("visually-hidden");
    signUp.classList.add("visually-hidden");
  };

  signUp.onsubmit = function(event) {
    event.preventDefault();

    const firstnameValue = document.querySelector(
      "[name='reg_firsname']"
    ).value;
    const lastnameValue = document.querySelector(
      "[name='reg_lastname']"
    ).value;
    const addressValue = document.querySelector(
      "[name='reg_address']"
    ).value;
    const emailValue = document.querySelector(
      "[name='reg_email']"
    ).value;
    const passValue = document.querySelector(
      "[name='reg_pass']"
    ).value;
    const confirmPassValue = document.querySelector(
      "[name='reg_conf_pass']"
    ).value;
    if (!firstnameValue || !lastnameValue || !addressValue || !emailValue || !passValue || !confirmPassValue) {
      return alert("Please fill all fields")
    }
    if (!emailValue.includes("@") || !emailValue.includes(".")) {
      return alert("Provide a correct email")
    }
    if (passValue.length < 6) {
      return alert("Password must contain at least 6 symbols")
    }
    if (passValue != confirmPassValue) {
      return alert("Password do not match")
    }

    const data = new FormData();
    data.set("firstname", firstnameValue);
    data.set("lastname", lastnameValue);
    data.set("address", addressValue);
    data.set("email", emailValue);
    data.set("password", passValue);
    data.set("confirmPassword", confirmPassValue);
    fetch("http://localhost:8000/api/auth/register", {
      method: "POST",
      body: data,
    }).then(response => response.json()).then(data => {
      if (data) {
        location.pathname = "";
      }
    })

  }
  signIn.onsubmit = function(event) {
    event.preventDefault();
    const emailValue = document.querySelector(
      "[name='login_email']"
    ).value;
    const passValue = document.querySelector(
      "[name='login_password']"
    ).value;

    const data = new FormData();
    data.set("email", emailValue);
    data.set("password", passValue);
    fetch("http://localhost:8000/api/auth/login", {
      method: "POST",
      body: data,
    }).then(response => response.json()).then(data => {
      if (data) {
        location.pathname = "";
      }
    })

  }
</script>




<?php
require_once "./templates/footer.php"
?>