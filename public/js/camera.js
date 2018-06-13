document.getElementById('snapshot').onclick = function() {
    var video = document.querySelector('video');
    var canvas = document.getElementById('example');
    canvas.height = 250;
    var context = canvas.getContext('2d');
    context.drawImage(video, 0, 0, 320, 245);
    document.getElementById("hiddenInput").value = canvas.toDataURL('image/png');
};

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
    document.getElementById("snapshot").classList.add("disabled");
    document.getElementById("needShow1").classList.remove("hide");
    document.getElementById("needShow2").classList.remove("hide");


}

function chooseSticker(id) {
    var variants = document.getElementById('createFrame');
    variants.src = id;
    variants.style.width = "350px";
    variants.style.height = "250px";
    variants.style.position = "absolute";
    document.getElementById("snapshot").classList.remove("disabled");
    document.getElementById("hiddenInput1").value = id;

}