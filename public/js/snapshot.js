document.getElementById('snapshot').onclick = function() {
    var video = document.querySelector('video');
    var canvas = document.getElementById('example');
    var context = canvas.getContext('2d');
    context.drawImage(video, 0, 0, 320, 245);
    var imageDataURL = canvas.toDataURL('image/png');
    document.getElementById('snapshot').name = imageDataURL;
    console.log(imageDataURL);
}
