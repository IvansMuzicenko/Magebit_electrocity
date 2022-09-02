<script>
    const signUpLink = document.querySelector("#signUpLink");
    const signInLink = document.querySelector("#signInLink");

    const signIn = document.querySelector(".signIn");
    const signUp = document.querySelector(".signUp");
    window.onload = () => {
        localStorage.setItem("loader", JSON.stringify(false));
    }

    // Switch auth form to sign-up
    signUpLink.onclick = function(e) {
        e.preventDefault();
        signIn.classList.add("visually-hidden");
        signUp.classList.remove("visually-hidden");
    };

    // Switch auth form to sign-in
    signInLink.onclick = function(e) {
        e.preventDefault();
        signIn.classList.remove("visually-hidden");
        signUp.classList.add("visually-hidden");
    };

    // Sign-up validated data sending to api
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

    // Sign-in validated data sending to api
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