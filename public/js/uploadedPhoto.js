document.getElementById('snapshot1').onclick = function() {
    document.getElementById("hiddenInput4").value = document.getElementById("del").innerHTML;
    document.getElementById('download').submit();
};

function chooseStickerUploaded(id) {
    var variants = document.getElementById('firstElementHere');
    var newFrame = document.createElement("img");
    var first = variants.firstChild;
    newFrame.src = id;
    newFrame.style.width = "300px";
    newFrame.style.height = "220px";
    newFrame.style.position = "absolute";
    variants.insertBefore(newFrame, first);
    document.getElementById("snapshot1").classList.remove("disabled");
    if (id === "/png/sigara.png") {
        document.getElementById("hiddenInput5").value = id;
    }
    if (id === "/png/glasses.png") {
        document.getElementById("hiddenInput6").value = id;
    }
    if (id === "/png/snoop.png") {
        document.getElementById("hiddenInput7").value = id;
    }
}

function handleFileSelect(evt) {
    var file = evt.target.files; // FileList object
    var f = file[0];

    document.getElementById("forUpload").classList.remove("hide");
    document.getElementById("snapshot1").classList.add("disabled");
    document.getElementById("button").classList.add("hide");
    document.getElementById("needShow1").classList.add("hide");
    document.getElementById("needShow2").classList.add("hide");
    document.getElementById("needShow3").classList.remove("hide");

    var reader = new FileReader();
    // Closure to capture the file information.
    reader.onload = (function(theFile) {
        return function(e) {
            // Render thumbnail.
            if (document.getElementById("del")) {
                document.getElementById("del").remove();
            }
            // }
            var span = document.createElement('div');
            span.id = "del";
            span.innerHTML = ['<img class="thumb" title="', decodeURI(theFile.name), '" src="', e.target.result, '" />'].join('');
            document.getElementById('output').appendChild(span);
        };
    })(f);
    // Read in the image file as a data URL.
    if (f && f.type.match('image.*')) {
        reader.readAsDataURL(f);
    }
}
document.getElementById('file').addEventListener('change', handleFileSelect, false);