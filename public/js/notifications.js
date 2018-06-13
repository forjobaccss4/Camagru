var xhr = new XMLHttpRequest();
var body = "notEmpty=no";
xhr.open("post", "http://localhost:8080/camagru/notificationChecker", true);
xhr.setRequestHeader("Content-Type",  "application/x-www-form-urlencoded" );
xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
        document.getElementById("notification").innerHTML = xhr.responseText;
    }
};
xhr.send(body);