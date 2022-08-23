if (window.location.pathname == "/auth") {
    const signUpLink = document.querySelector("#signUpLink");
    const signInLink = document.querySelector("#signInLink");

    const signIn = document.querySelector(".signIn");
    const signUp = document.querySelector(".signUp");

    signUpLink.onclick = function (e) {
        e.preventDefault();
        signIn.classList.add("visually-hidden");
        signUp.classList.remove("visually-hidden");
    };

    signInLink.onclick = function (e) {
        e.preventDefault();
        signIn.classList.remove("visually-hidden");
        signUp.classList.add("visually-hidden");
    };
}
