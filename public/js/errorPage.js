var matrix = document.getElementById("matrix");
var context = matrix.getContext("2d");
matrix.height = window.innerHeight;
matrix.width = window.innerWidth;
var font_size = 20;
var columns = matrix.width / font_size;
var drop=[];
for(var i = 0; i < columns; i++) {
    drop[i] = 1;
}
function drawErrorMatrix(){
    document.getElementById("error").style.display = "flex";
    context.fillStyle = "rgba(0, 0, 0, 0.1)";
    context.fillRect(0, 0, matrix.width, matrix.height);
    context.fillStyle="red";
    context.font = font_size + "px";
    for(var i = 0; i < columns; i++) {
        context.fillText(Math.floor(Math.random() * 2),i * font_size,drop[i] * font_size);
        if(drop[i] * font_size > (matrix.height * 2/3) && Math.random() > 0.85)
            drop[i] = 0;
        drop[i]++;
    }
}

setInterval(drawErrorMatrix, 40);