import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

let names = document.querySelectorAll('.name');
let submit = document.getElementById("signupBtn");
let email = document.getElementById("loginEmail");
let password = document.getElementById("loginPassword");
let confirmPass = document.getElementById("confirmPassword");
let form = document.forms['signup'];

submit.addEventListener('click', (e) => {
    checkForm();
})

function checkForm() {

    let namePattern = /^[a-z ,.'-]+$/i;
    let emailPattern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
    let passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[_@./#&$+A-Za-z\d]{8,}$/;

    names.forEach((name) => {
        let nameMsg = name.parentNode.lastElementChild;
        let desc = name.getAttribute('data-type');
        if (namePattern.test(name.value) == false) {
            nameMsg.classList.remove
            ('msg-inactive');
            name.parentNode.lastElementChild.lastElementChild.textContent = `Invalid ${desc}`;
        } else {
            nameMsg.classList.add
            ('msg-inactive');
        }
    });

    let emailMsg = email.parentNode.lastElementChild;

    if (emailPattern.test(email.value) == false) {
        emailMsg.classList.remove('msg-inactive');
        email.parentNode.lastElementChild.lastElementChild.textContent = `Invalid Email`;
    } else {
        emailMsg.classList.add('msg-inactive');
    }

    let passwordMsg = password.parentNode.lastElementChild;

    if (passwordPattern.test(password.value) == false) {
        passwordMsg.classList.remove('msg-inactive');
        password.parentNode.lastElementChild.lastElementChild.textContent = `Invalid Password`;
    } else {
        passwordMsg.classList.add('msg-inactive');
    }

    let confirmPassMsg = confirmPass.parentNode.lastElementChild;

    if (confirmPass.value != password.value) {
        confirmPass.setCustomValidity("Password Mismatch");
        confirmPassMsg.classList.remove('msg-inactive');
        confirmPass.parentNode.lastElementChild.lastElementChild.textContent = `Password Mismatch`;
    } else {
        confirmPassMsg.classList.add('msg-inactive');
    }


}

