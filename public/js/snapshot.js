document.getElementById('snapshot').onclick = function() {
    var video = document.querySelector('video');
    var canvas = document.getElementById('example');
    canvas.height = 250;
    var context = canvas.getContext('2d');
    context.drawImage(video, 0, 0, 320, 245);
    var imageDataURL = canvas.toDataURL('image/png');
    document.getElementById("hiddenInput").value = imageDataURL;
}
