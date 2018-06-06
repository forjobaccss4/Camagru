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

    var frame = document.getElementById('createFrame');
    if (document.getElementById("createdFrame")) {
        return false;
    }
    var layout = document.createElement("div");
    layout.id = "createdFrame";
    layout.style.width = "350px";
    layout.style.height = "250px";
    layout.style.position = "absolute";
    layout.style.backgroundColor = "transparent";
    frame.appendChild(layout);

    var variants = document.getElementById('chooseFrame');
    if (document.getElementById("created")) {
        return false;
    }
    var choose = document.createElement('div');
    choose.id = "created";
    choose.style.width = "320px";
    choose.style.height = "250px";
    choose.style.position = "relative";
    choose.style.backgroundColor = "white";
    variants.appendChild(choose);

}