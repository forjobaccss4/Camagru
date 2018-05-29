var defaultClick = 1;
var login, password, name, email = '';

function validate_form() {
    var valid = true;
    var enteredPass = testPassword();

    if (!enteredPass) {
        wrongRegisterData();
        valid = false;
    }
    if (valid === true) {
        document.authorization_form.action = "/recovery/change";
    }
    return valid;
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
    if (password != '' && password != undefined) {
        var passwordNode = document.createTextNode(password);
        wrongRegister.appendChild(passwordNode);
        wrongRegister.appendChild(linebreak1);
        password = '';
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


function testPassword() {
    var pass = document.getElementById('pass');
    var repass = document.getElementById('repass');

    if (pass.value == "" || repass.value == "") {
        password = 'Пароль не может быть пустым';
        return false;
    }
    if (pass.value != repass.value) {
        password = 'Пароли не совпадают';
        return false;
    }
    return true;
}

