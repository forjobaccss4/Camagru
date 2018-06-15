function openNav() {
    document.getElementById("mySidenav").style.width = "90px";
    document.getElementById("main").style.marginLeft = "90px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "auto";
}
window.onresize = function() {
    var width = document.documentElement.clientWidth;
    if (width <= 600) {
        document.getElementById("main").style.marginLeft= "auto";
    }
};