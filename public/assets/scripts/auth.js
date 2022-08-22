const signUpLink = document.getElementById("signUpLink");
const signInLink = document.getElementById("signInLink");

const signIn = document.querySelector(".signIn");
const signUp = document.querySelector(".signUp");

signUpLink.addEventListener("click", function (e) {
    e.preventDefault();
    signIn.classList.add("visually-hidden");
    signUp.classList.remove("visually-hidden");
});

signInLink.addEventListener("click", function (e) {
    e.preventDefault();
    signIn.classList.remove("visually-hidden");
    signUp.classList.add("visually-hidden");
});
