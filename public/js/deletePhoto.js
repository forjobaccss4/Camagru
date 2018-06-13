function deletePhotos(id) {
    id = id.slice(0, -1);
    var xhr = new XMLHttpRequest();
    var body = "deleteId=" + id;
    xhr.open("POST", 'http://localhost:8080/camagru/deletePhoto', true);
    xhr.setRequestHeader("Content-Type",  "application/x-www-form-urlencoded" );
    xhr.send(body);
    location.reload();
}