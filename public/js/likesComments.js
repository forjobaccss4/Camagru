function addLike(pathToFile) {
    var xhr = new XMLHttpRequest();
    var pSrc = pathToFile + "1";
    var body = "path=" + pathToFile;
    xhr.onreadystatechange = function () {
       if (xhr.readyState == 4) {
           document.getElementById(pSrc).innerHTML = xhr.responseText;
       }
    };
    xhr.open("POST", 'http://localhost:8080/camagru/likes', true);
    xhr.setRequestHeader("Content-Type",  "application/x-www-form-urlencoded" );
    xhr.send(body);
    return;
}

function addComment(id) {
    var divComments = id.slice(0, -1);
    var newCommentsBlock = divComments + "4";
    var newCommentsMessage = divComments + "5";
    divComments = divComments + "3";
    var comment = document.getElementById(divComments);
    if (document.getElementById(newCommentsBlock)) {
        document.getElementById(newCommentsBlock).remove();
        return false;
    }

    var newDiv = document.createElement("div");
    newDiv.id = newCommentsBlock;
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

    var divBorder =  document.createElement("div");
    divBorder.style.overflowX = "hidden";
    divBorder.style.wordWrap = "break-word";
    divBorder.style.width = "310px";
    divBorder.style.lineHeight = "15px";
    divBorder.style.height = "250px";
    divBorder.style.border = "1px #A4a195 solid";
    divBorder.style.borderRadius = "5px";

    var newTextArea = document.createElement("textarea");
    newTextArea.id = newCommentsMessage;
    newTextArea.style.resize = "none";
    newTextArea.style.height = "70px";
    newTextArea.style.width = "315px";
    newTextArea.style.backgroundColor = "grey";
    newTextArea.style.border = "1px black solid";
    newTextArea.style.borderRadius = "5px";
    newTextArea.style.marginTop = "5px";
    newTextArea.placeholder = "Введите свое сообщение...";

    var newTextAreaButton = document.createElement("button");
    newTextAreaButton.innerHTML = "Отправить";
    newTextAreaButton.style.borderRadius = "5px";

    comment.appendChild(newDiv);
    newDiv.appendChild(divBorder);
    newDiv.appendChild(newTextArea);
    newDiv.appendChild(newTextAreaButton);

    var XML = new XMLHttpRequest();
    var body = "commentId=" + divComments.slice(0, -1);
    XML.onreadystatechange = function () {
        if (XML.readyState === 4) {
            var elem = document.getElementById(newCommentsMessage).parentNode.firstChild;
            elem.insertAdjacentHTML("afterBegin", XML.responseText);
        }
    };
    XML.open("POST", 'http://localhost:8080/camagru/loadComments', true);
    XML.setRequestHeader("Content-Type",  "application/x-www-form-urlencoded" );
    XML.send(body);

    newTextAreaButton.addEventListener("click", function () {
        var xhr = new XMLHttpRequest();
        var comment = newCommentsMessage.slice(0, -1);
        if (document.getElementById(newCommentsMessage).value.length > 0) {
            var message = "comment=" + document.getElementById(newCommentsMessage).value + "&photo=" + comment;
        }else {
            alert("Комментарий не может быть пустым!");
            return false;
        }
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (document.getElementById(newCommentsMessage).parentNode.firstChild.innerHTML.length > 0) {
                    var join = document.getElementById(newCommentsMessage).parentNode.firstChild.innerHTML;
                    var showComment = "<b>" + "<p align='left'>" + xhr.responseText + ":" + "<p>" + "</b>" + "<p align='left'>" + document.getElementById(newCommentsMessage).value + "</p>" + join;
                    document.getElementById(newCommentsMessage).parentNode.firstChild.innerHTML = showComment;
                }else {
                    var newComment = "<p align='left'>" + document.getElementById(newCommentsMessage).value + "<p>";
                    var showMessage = "<b>" + "<p align='left'>" + xhr.responseText + ":" + "</p>" + "</b>" + newComment;
                    document.getElementById(newCommentsMessage).parentNode.firstChild.innerHTML = showMessage;
                }
            }
        };
        if (document.getElementById(newCommentsMessage).value.length > 256) {
            alert("В комментарии не может быть больше 256 символов!");
            document.getElementById(newCommentsMessage).value = "";
            return false;
        }
        xhr.open("POST", 'http://localhost:8080/camagru/comments', true);
        xhr.setRequestHeader("Content-Type",  "application/x-www-form-urlencoded" );
        xhr.send(message);
    });
}



function showComment(id) {
    var divComments = id.slice(0, -1);
    var newCommentsBlock = divComments + "4";
    var newCommentsMessage = divComments + "5";
    divComments = divComments + "3";
    var comment = document.getElementById(divComments);
    if (document.getElementById(newCommentsBlock)) {
        document.getElementById(newCommentsBlock).remove();
        return false;
    }

    var newDiv = document.createElement("div");
    newDiv.id = newCommentsBlock;
    newDiv.style.resize = "none";
    newDiv.style.overflow = "auto";
    newDiv.style.width = "320px";
    newDiv.style.height = "320px";
    newDiv.style.display = "flex";
    newDiv.style.flexDirection = "column";
    newDiv.style.backgroundColor = "white";
    newDiv.style.justifyContent = "flex-start";
    newDiv.style.alignItems = "center";
    newDiv.style.borderRadius = "5px";

    var divBorder =  document.createElement("div");
    divBorder.style.overflowX = "hidden";
    divBorder.style.wordWrap = "break-word";
    divBorder.style.marginTop = "10px";
    divBorder.style.width = "310px";
    divBorder.style.lineHeight = "15px";
    divBorder.style.height = "250px";
    divBorder.style.border = "1px #A4a195 solid";
    divBorder.style.borderRadius = "5px";

    comment.appendChild(newDiv);
    newDiv.appendChild(divBorder);

    var XML = new XMLHttpRequest();
    var body = "commentId=" + divComments.slice(0, -1);
    XML.onreadystatechange = function () {
        if (XML.readyState === 4) {
            var elem = document.getElementById(newCommentsBlock).firstChild;
            elem.insertAdjacentHTML("afterBegin", XML.responseText);
        }
    };
    XML.open("POST", 'http://localhost:8080/camagru/loadComments', true);
    XML.setRequestHeader("Content-Type",  "application/x-www-form-urlencoded" );
    XML.send(body);
}