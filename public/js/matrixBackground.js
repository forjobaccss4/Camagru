var matrix = document.getElementById("matrix");
var context = matrix.getContext("2d");
matrix.height = window.innerHeight;
matrix.width = window.innerWidth;
var drop = [];
var font_size = 20;
var columns = matrix.width / font_size;
for (var i = 0; i < columns; i++)
    drop[i] = 1;

function printText() {
    var enterTheMatrix = document.getElementById("Log");
    var element = document.getElementById("msgbox");
    var text = "Project: Camagru\nAuthor: vsarapin";
    var i = 0;
    var j = text.length;
    var messageBox = document.getElementById("msgbox");
    var printTxt = function () {
        if (i <= text.length && messageBox) {
            element.innerHTML = text.substr(0, i) + "_";
            setTimeout(printTxt, 50);
        }
        i++;
        if (i == text.length) {
            setTimeout(delTxt, 1500);
        }
    };
    var delTxt = function () {

        if (j >= 0) {
            element.innerHTML = text.substr(0, j) + "_";
            setTimeout(delTxt, 50);
            if (!j) {
                element.innerHTML = "";
                var closeMsgbox = function () {
                    messageBox.style.animation = "scaleTableReverse 0.6s";
                    messageBox.style.animationFillMode = "forwards";
                };
                setTimeout(closeMsgbox, 300);
                setTimeout(function () {
                    enterTheMatrix.style.display = "flex";
                    enterTheMatrix.style.animation = "scaleTable, loadingblink ease-in-out";
                    enterTheMatrix.style.animationIterationCount = "1, infinite";
                    enterTheMatrix.style.animationFillMode = "forwards";
                    enterTheMatrix.style.animationDuration = "0.6s, 1s";
                }, 2000);
            }
        }
        j--;
    };
    printTxt();
    if (enterTheMatrix) {
        enterTheMatrix.addEventListener("click", function () {
            enterTheMatrix.style.animation = "scaleTableReverse 0.6s";
            enterTheMatrix.style.animationFillMode = "forwards";
            setTimeout(function () {
                document.location.href = "authorization";
            }, 700);
        }, false);
    }
}

function draw() {
    var bool = document.getElementsByClassName("connectionPopup")[0];
    if (bool)
        bool.style.display = "flex";
    setTimeout(stop, 3000);
    setTimeout(function () {
        var bool = document.getElementsByClassName("msgbox")[0];
        if (bool)
            bool.style.display = "flex";
    }, 3800);
    setTimeout(printText, 4300);
}

function stop() {
    var bool = document.getElementById("connection");
    if (bool) {
        bool.style.animation = "scaleTableReverse 0.6s";
        bool.style.animationFillMode = "forwards";
    }
}

function drawMatrix() {
    context.fillStyle = "rgba(0, 0, 0, 0.1)";
    context.fillRect(0, 0, matrix.width, matrix.height);

    context.fillStyle = "green";
    context.font = "35px";
    for (var i = 0; i < columns; i++) {
        context.fillText(Math.floor(Math.random() * 2), i * font_size, drop[i] * font_size);
        if (drop[i] * font_size > (matrix.height * 2 / 3) && Math.random() > 0.85)
            drop[i] = 0;
        drop[i]++;
    }
}

var greenMatrix = setInterval(drawMatrix, 40);
setTimeout(draw, 1000);