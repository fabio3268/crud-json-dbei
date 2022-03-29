var email = document.querySelector("#email");
var senha = document.querySelector("#senha");

email.addEventListener('focus',() => {
    email.style.borderColor = "#4A5F6A";
});

email.addEventListener('blur',() => {
    email.style.borderColor = "#ccc";
});

senha.addEventListener('focus',() => {
    senha.style.borderColor = "#4A5F6A";
});

senha.addEventListener('blur',() => {
    senha.style.borderColor = "#ccc";
});

let btn = document.querySelector("#btn");