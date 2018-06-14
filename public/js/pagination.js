var counter = 1;
var tmp = 0;
var number;
var pag = document.getElementById("pagination");


for (var i = 0; i < 5; i++) {
    if (document.getElementById(counter + "a")) {
        document.getElementById(counter + "a").classList.remove("hide");
        counter++;
    }
}

if (document.getElementById((tmp + 1) + "a")) {
    while (document.getElementById((tmp + 1) + "a")) {
        tmp++;
    }
}

number = Math.ceil(tmp / 5);


if (tmp <= 5) {
    number = -1;
}

if (!number) {
    var li =  document.createElement("li");
    var a = document.createElement("a");
    li.classList.add("active");
    a.innerHTML = "1";
    a.style.color = "white";
    a.style.cursor = "pointer";
    li.appendChild(a);
    pag.appendChild(li);
}else if (number > 0) {
    var trigger = 0;
    for (var i = 1; i <= number; i++) {
        var insertLi =  document.createElement("li");
        var insertA = document.createElement("a");
        if (counter <= 6 && !trigger) {
            insertA.id = i;
            insertLi.classList.add("active");
            insertA.innerHTML = i;
            insertA.style.cursor = "pointer";
            insertA.style.color = "white";
            insertA.onclick = function() {forPagination(this.innerHTML);};
            trigger = 1;
            insertLi.appendChild(insertA);
            pag.appendChild(insertLi);
            continue;
        }
        insertA.id = i;
        insertLi.classList.add("waves-effect");
        insertA.innerHTML = i;
        insertA.onclick = function() {forPagination(this.innerHTML);};
        insertA.style.cursor = "pointer";
        insertA.style.color = "white";
        insertLi.appendChild(insertA);
        pag.appendChild(insertLi);
    }
}

function forPagination(pageNumber) {

    var pagesToShowFrom = 5 * pageNumber - 4;

    document.getElementsByClassName("active")[0].classList.add("waves-effect");
    document.getElementsByClassName("active")[0].classList.remove("active");
    document.getElementById(pageNumber).parentNode.classList.remove("waves-effecttive");
    document.getElementById(pageNumber).parentNode.classList.add("active");

    for (var i = counter - 5; i < counter ; i++) {
        if (document.getElementById(i + "a")) {
            document.getElementById(i + "a").classList.add("hide");
        }
    }
    for (var i = 0; i < 5; i++) {
        if (document.getElementById(pagesToShowFrom  + "a")) {
            document.getElementById(pagesToShowFrom + "a").classList.remove("hide");
            pagesToShowFrom++;
            counter = pagesToShowFrom;
        }
    }
}