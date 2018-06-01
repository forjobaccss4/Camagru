var width = screen.width;
var hide1 = document.getElementById('hideThis');
var hide2= document.getElementById('hideThisToo');
if (width < 768) {
    alert("hello");
    hide1.style.display = 'none';
    hide2.style.display = 'none';
}