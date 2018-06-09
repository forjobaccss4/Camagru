function addLike(pathToFile) {
    var xhr = new XMLHttpRequest();
    var pSrc = pathToFile + "1";
    var body = "path=" + pathToFile;
    xhr.onreadystatechange = function () {
       if (xhr.readyState == 4) {
           document.getElementById(pSrc).innerHTML = xhr.responseText;
       }
    }
    xhr.open("POST", 'http://localhost:8080/camagru/likes', true);
    xhr.setRequestHeader("Content-Type",  "application/x-www-form-urlencoded" );
    xhr.send(body);
    return;
}

function addComment(id) {
    var divComments = id.slice(0, -1);
    divComments = divComments + "3";
    var comment = document.getElementById(divComments);
    if (document.getElementById("createdComment")) {
        return false;
    }
    var newDiv = document.createElement("div");
    newDiv.id = "createdComment";
    newDiv.style.resize = "none";
    newDiv.style.overflow = "auto";
    newDiv.style.width = "320px";
    newDiv.style.height = "350px";
    newDiv.style.display = "flex";
    newDiv.style.flexDirection = "column";
    newDiv.style.backgroundColor = "white";
    newDiv.style.justifyContent = "flex-end";
    newDiv.style.alignItems = "center";
    newDiv.style.borderRadius = "5px";

    var newTextArea = document.createElement("textarea");
    newTextArea.style.resize = "none";
    newTextArea.style.height = "70px";
    newTextArea.style.width = "315px";
    newTextArea.style.backgroundColor = "grey";
    newTextArea.style.border = "1px";
    newTextArea.style.borderRadius = "5px";

    var newTextAreaButton = document.createElement("button");
    newTextAreaButton.innerHTML = "Отправить";
    newTextAreaButton.style.borderRadius = "5px";

    comment.appendChild(newDiv);
    newDiv.appendChild(newTextArea);
    newDiv.appendChild(newTextAreaButton);
}