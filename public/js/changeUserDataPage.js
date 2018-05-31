var defaultClick;
var login, password, name, email = '';

function validate_form(defaultClick) {
    var valid = true;
    if (defaultClick === 1) {
        var enteredLog = testLogin(returnElement('enteredLogin').value);
        if (!enteredLog) {
            shakeInput("enteredLogin", "change_login");
            valid = false;
        }
    }
    if (defaultClick === 2) {
        var enteredPass = testPasswords();
        var comparedPass = comparePasswords();
        if (!enteredPass || !comparedPass) {
            shakeInput("enteredPass", "change_pass");
            shakeInput("enteredRepass", "change_pass");
            valid = false;
        }
    }
    if (defaultClick === 3) {
        var enteredName = testName(returnElement('enteredName').value);
        if (!enteredName) {
            shakeInput("enteredName", "change_name");
            valid = false;
        }
    }
    if (defaultClick === 4) {
        var enteredMail = testMail();
        if (!enteredMail) {
            shakeInput("enteredMail", "change_mail");
            valid = false;
        }
    }
    return valid;
}

function returnElement(id) {
    return document.getElementById(id);
}


function getNameOfField(id) {
    defaultClick = (id === "change_login" ? 1 : defaultClick);
    defaultClick = (id === "change_pass" ? 2 : defaultClick);
    defaultClick = (id === "change_name" ? 3 : defaultClick);
    defaultClick = (id === "change_mail" ? 4 : defaultClick);
    return validate_form(defaultClick);
}

function testLogin(enteredLogin) {

    if (enteredLogin === "") {
        returnElement('errorLogin').innerHTML = 'Логин не может быть пустым';
        return false;
    }
    if (/^[a-zA-Z1-9]+$/.test(enteredLogin) === false) {
        returnElement('errorLogin').innerHTML = 'В логине должны быть только латинские буквы';
        return false;
    }
    if (enteredLogin.length < 4 || enteredLogin.length > 20) {
        returnElement('errorLogin').innerHTML = 'В логине должно быть от 4 до 20 символов';
        return false;
    }
    if (parseInt(enteredLogin.substr(0, 1))) {
        returnElement('errorLogin').innerHTML = 'Логин должен начинаться с буквы';
        return false;
    }

    return true;
}

function testPasswords() {
    var pass = document.getElementById('enteredPass');
    var rePass = document.getElementById('enteredRepass');

    if (pass.value == "") {
        password = 'Пароль не может быть пустым';
        return false;
    }
    if (rePass.value == "") {
        password = 'Пароль не может быть пустым';
        return false;
    }
    return true;
}

function comparePasswords() {
    var value = true;
    var pass = document.getElementById('enteredPass');
    var repass = document.getElementById('enteredRepass');
    // alert(pass.value);
    if ((pass.value != "" && repass.value != "") && (pass.value != repass.value)) {
        password = 'Пароли не совпадают';
        value = false;
    }
    return value;
}
function testName(enteredName) {
    if (enteredName === undefined || enteredName === "") {
        login = 'Имя не может быть пустым';
        return false;
    }
    if (/^[a-za-zа-яA-ZФ-Я]+$/.test(enteredName) == false) {
        login = 'В имени должны быть только буквы';
        return false;
    }
    return true;
}

function testMail() {
    var value = true;
    var mail = document.getElementById('enteredMail');
    var email_regexp = /[0-9a-zа-я_A-ZА-Я]+@[0-9a-zа-я_A-ZА-Я^.]+\.[a-zа-яА-ЯA-Z]{2,4}/i;


    if (!email_regexp.test(mail.value)) {
        email = 'Неверный формат email';
        value = false;
    }

    if (mail.value == "") {
        email = 'Email не может быть пустым';
        value = false;
    }
    return value;
}

function shakeInput(inputName, button) {

    const input = document.getElementById(inputName);
    const submit = document.getElementById(button);
    input.classList.add("apply-shake");
    input.style.borderColor = "red";
    input.style.borderWidth = "1.5px";

    submit.addEventListener("click", function() {
    input.classList.add("apply-shake");
});
    input.addEventListener("animationend", function() {
        input.classList.remove("apply-shake");
});
}
