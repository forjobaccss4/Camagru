var defaultClick = 1;
var login, password, name, email = '';

function validate_form() {
    var valid = true;

    if (defaultClick === 2) {
        var enteredLog = testLogin(returnElement('login').value);
        var enteredPass = testPassword();
        var enteredRepassNameMail = comparePasswordsNameEmail();

        if (!enteredLog || !enteredPass || !enteredRepassNameMail) {
            wrongRegisterData();
            valid = false;
        }
    }
    if (defaultClick === 3) {
        var testEmail = testMail();
        if (!testEmail) {
            wrongRegisterData();
            valid = false;
        }
    }
        if (valid === true) {
            if (defaultClick === 1) {
                document.authorization_form.action = "/authorization/login";
            }
            if (defaultClick === 2) {
                document.authorization_form.action = "/authorization/register";
            }
            if (defaultClick === 3){
                document.authorization_form.action = "/recovery/index";
            }
        }
        return valid;
    }

function returnElement(id) {
    return document.getElementById(id);
}

function wrongRegisterData() {
    var wrongRegister = document.getElementById("wrongRegister");
    wrongRegister.style.display = 'none';
    wrongRegister.style.animation = "scaleTable 0.6s";
    document.getElementById("forLoginPage").style.display = 'none';
    wrongRegister.style.display = 'flex';
    createNode();
}

function createNode() {
    var wrongRegister = document.getElementById("wrongRegister");
    var dontRemove = document.getElementById("dontRemove");
    var linebreak = document.createElement("BR");
    var linebreak1 = document.createElement("BR");
    var linebreak2 = document.createElement("BR");
    if (wrongRegister.hasChildNodes()) {
        while (wrongRegister.lastChild) {
            if (dontRemove.isEqualNode(wrongRegister.lastChild))
                break;
            wrongRegister.removeChild(wrongRegister.lastChild);
        }
    }
    if (login != '' && login != undefined) {
        var loginNode = document.createTextNode(login);
        wrongRegister.appendChild(loginNode);
        wrongRegister.appendChild(linebreak);
        login = '';
    }
    if (password != '' && password != undefined) {
        var passwordNode = document.createTextNode(password);
        wrongRegister.appendChild(passwordNode);
        wrongRegister.appendChild(linebreak1);
        password = '';
            }
    if (defaultClick === 2) {
        if (name != '' && name != undefined) {
            var nameNode = document.createTextNode(name);
            wrongRegister.appendChild(nameNode);
            wrongRegister.appendChild(linebreak2);
            name = '';
        }
        if (email != '' && email != undefined) {
            var emailNode = document.createTextNode(email);
            wrongRegister.appendChild(emailNode);
            email = '';
        }
    }
    if (defaultClick === 3) {
        if (email != '' && email != undefined) {
            var emailNode = document.createTextNode(email);
            wrongRegister.appendChild(emailNode);
            email = '';
        }
    }
}

function closeWrongRegisterData() {
    var bool = document.getElementById("wrongRegister");
    bool.style.animation = "scaleTableReverse 0.6s";
    bool.style.animationFillMode = "forwards";
    setTimeout(function () {
        var forLoginPage = document.getElementById("forLoginPage");
        forLoginPage.style.display = 'flex';
        forLoginPage.style.animation = 'scaleTable';
        forLoginPage.style.animationDuration = "0.6s";
    }, 650);
}

function getNameOfField(id) {
    defaultClick = (id == "signin" ? 1 : defaultClick);
    defaultClick = (id == "signup" ? 2 : defaultClick);
    defaultClick = (id == "reset" ? 3 : defaultClick);
    if (defaultClick === 3) {
        returnElement('login').placeholder = "Email";
    }else {
        returnElement('login').placeholder = "Login";
    }
}

function testLogin(enteredLogin) {

    if (enteredLogin == "") {
        login = 'Логин не может быть пустым';
        return false;
    }
    if (/^[a-zA-Z1-9]+$/.test(enteredLogin) == false) {
        login = 'В логине должны быть только латинские буквы';
        return false;
    }
    if (enteredLogin.length < 4 || enteredLogin.length > 20) {
        login = 'В логине должно быть от 4 до 20 символов';
        return false;
    }
    if (parseInt(enteredLogin.substr(0, 1))) {
        login = 'Логин должен начинаться с буквы';
        return false;
    }

    return true;
}

function testPassword() {
    var pass = document.getElementById('pass');

    if (pass.value == "") {
        password = 'Пароль не может быть пустым';
        return false;
    }
    if (pass.value.length < 8) {
        password = 'Пароль должен состоять минимум из 8 символов';
        return false;
    }
    var pass_regexp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/i;
    if (!pass_regexp.test(pass.value)) {
        password = 'В пароле должна быть маленькая и большая буквы а также одна цифра!';
        return false;
    }
    return true;
}

function comparePasswordsNameEmail() {
    var value = true;
    var pass = document.getElementById('pass');
    var repass = document.getElementById('repass');
    var enteredName = document.getElementById('yourname');

    if (pass.value != repass.value) {
        password = 'Пароли не совпадают';
        value = false;
    }
    if (enteredName.value == "") {
        name = 'Имя не может быть пустым';
        value = false;
    }
    var mail = document.getElementById('Email');
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

function testMail() {
    var value = true;
    var mail = document.getElementById('login');
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
