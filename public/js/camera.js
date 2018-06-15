document.getElementById('snapshot').onclick = function() {
    var video = document.querySelector('video');
    var canvas = document.getElementById('example');
    canvas.height = "250";
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
    document.getElementById("forUpload").classList.add("hide");
    document.getElementById("button").classList.remove("hide");
    document.getElementById("button").classList.add("container");
    document.getElementById("snapshot").classList.add("disabled");
    document.getElementById("needShow1").classList.remove("hide");
    document.getElementById("needShow2").classList.remove("hide");
    document.getElementById("needShow3").classList.add("hide");



}

function chooseSticker(id) {
    id = id.slice(0, -1);
    var variants = document.getElementById('createFrame');
    var newFrame = document.createElement("img");
    var first = variants.firstChild;
    newFrame.src = id;
    newFrame.style.width = "350px";
    newFrame.style.height = "250px";
    newFrame.style.position = "absolute";
    variants.insertBefore(newFrame, first);
    document.getElementById("snapshot").classList.remove("disabled");
    if (id === "/png/sigara.png") {
        document.getElementById("hiddenInput1").value = id;
    }
    if (id === "/png/glasses.png") {
        document.getElementById("hiddenInput2").value = id;
    }
    if (id === "/png/snoop.png") {
        document.getElementById("hiddenInput3").value = id;
    }
}
