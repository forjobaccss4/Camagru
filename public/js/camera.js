function camera() {
    var constraints = {video: true};
    if (navigator.mediaDevices.getUserMedia(constraints)) {
        navigator.mediaDevices.getUserMedia(constraints)
            .then(function (mediaStream) {
                var video = document.querySelector('video');
                video.srcObject = mediaStream;
                video.setAttribute("autoplay", true);
                video.onloadedmetadata = function (e) {
                };
            })
            .catch(function (err) {
                console.log(err.name + ": " + err.message);
            })
    } else if (navigator.mediaDevices.webkitGetUserMedia(constraints)) {
        navigator.mediaDevices.webkitGetUserMedia(constraints)
            .then(function (mediaStream) {
                var video = document.querySelector('video');
                video.srcObject = mediaStream;
                video.setAttribute("autoplay", true);
                video.onloadedmetadata = function (e) {
                };
            })
            .catch(function (err) {
                console.log(err.name + ": " + err.message);
            })
    }

    document.getElementById("button").classList.remove("hide");
    document.getElementById("button").classList.add("container");
    document.getElementById("needShow1").classList.remove("hide");
    document.getElementById("needShow2").classList.remove("hide");

    var frame = document.getElementById('chooseFrame');
    if (document.getElementById("createdFrame")) {
        return false;
    }
    var choose = document.createElement("img");
    choose.id = "createdFrame";
    choose.src = '/png/matrixheroes.png';
    choose.style.width = "150px";
    choose.style.height = "100px";
    choose.style.position = "relative";
    frame.appendChild(choose);

    var choose1 = document.createElement("img");
    choose1.id = "createdFrame";
    choose1.src = '/png/matrixheroes.png';
    choose1.style.width = "150px";
    choose1.style.height = "100px";
    choose1.style.position = "relative";
    frame.appendChild(choose1);

    var choose2 = document.createElement("img");
    choose2.id = "createdFrame";
    choose2.src = '/png/matrixheroes.png';
    choose2.style.width = "150px";
    choose2.style.height = "100px";
    choose2.style.position = "relative";
    frame.appendChild(choose2);

    var variants = document.getElementById('createFrame');
    if (document.getElementById("created")) {
         return false;
    }
    variants.id = "created";
    variants.src = '/png/matrixheroes.png';
    variants.style.width = "350px";
    variants.style.height = "250px";
    variants.style.position = "absolute";
}