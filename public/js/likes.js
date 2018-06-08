function addLike(pathToFile) {
    var xhr = new XMLHttpRequest();
    var body = "path=" + pathToFile;
    xhr.onreadystatechange = function () {
       if (xhr.readyState == 4) {
           document.getElementById('numOfLikes').innerHTML = xhr.responseText;
       }
    }
    xhr.open("POST", 'http://localhost:8080/camagru/likes', true);
    xhr.setRequestHeader("Content-Type",  "application/x-www-form-urlencoded" );
    xhr.send(body);
}