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
}