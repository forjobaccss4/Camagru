function camera() {
    var constraints = {video: true};
    navigator.mediaDevices.getUserMedia(constraints)
        .then(function(mediaStream) {
            var video = document.querySelector('video');
            video.srcObject = mediaStream;
            video.setAttribute("autoplay", true);
            video.onloadedmetadata = function(e) {
            };
        })
        .catch(function(err) {console.log(err.name + ": " + err.message);})
}