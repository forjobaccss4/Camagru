document.getElementById('snapshot').onclick = function() {
    var video = document.querySelector('video');
    var canvas = document.getElementById('example');
    canvas.height = 250;
    var context = canvas.getContext('2d');
    context.drawImage(video, 0, 0, 320, 245);
    document.getElementById("hiddenInput").value = canvas.toDataURL('image/png');
}
