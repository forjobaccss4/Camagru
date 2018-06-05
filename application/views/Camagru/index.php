<head>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
</head>
<body style="background-color: black">
<canvas id="matrix" style="position: absolute"></canvas>
<div id="main" class="container">
    <div class="row">
        <div class="col s12">
            <span class="hide-on-small-only" style="font-size:30px;cursor:pointer; color: #9C9C9C;" onclick="openNav()">&#9776</span>
        </div>
    </div>
    <nav>
        <div id="primary_nav_wrap" class="nav-wrapper black center-align">
            <div class="row">
                <div class="col s12">
                    <?=$logout?>
                    <ul>
                        <img class="hide-on-small-only" src="/gif/TheMatrixAnimated.gif" style="width: 210px">
                        <li>
                            <a href="#" id="" class=""><?=$user?></a>
                            <ul class="left">
                                <li><a href="/camagru">Главная</a></li>
                                <li><a href="/authorization">Регистрация</a></li>
                                <li><a href="/camagru/cabinet">Личный кабинет</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
<br><br><br><br>
<div class="container hide-on-med-and-up">
    <div class="row">
        <div class="col s12">
            <img src="/png/camera.png" style="width: 70px; cursor:pointer;" onclick="camera()">
        </div>
    </div>
    <div class="row" style="position: relative">
        <div class="image-upload">
            <form id="download" enctype="multipart/form-data" method="post" action="/camagru/image">// Я ничего не отправляю в запросе, нет кнопки submit
                <label for="file-input">
                    <img src="/png/folder.png">
                </label>
                <input id="file-input" type="file" accept="image/*,image/jpeg,image/png,image/jpg" onchange="submit()">
            </form>
        </div>
    </div>
</div>
<br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col s12 grey darken-4">
            <video></video>
            <canvas id="example" width=320 height=250></canvas>
            <button id="snapshot" type="submit">click me</button>
        </div>
</div>
</div>
<div id="mySidenav" class="leftbar hide-on-small-only">
    <a href= "javascript:void(0)" class="closebtn" onclick="closeNav()">Close</a>
    <div class="row" style="position: relative">
        <div class="col s12 #2d2f33" style="padding-top: 25px">
            <img src="/png/camera.png" style="width: 70px; cursor:pointer;" onclick="camera()">
        </div>
    </div>
    <div class="row" style="position: relative">
        <div class="image-upload">
            <form id="download" enctype="multipart/form-data" method="post" action="/camagru/image">// Я ничего не отправляю в запросе, нет кнопки submit
                <label for="file-input">
                    <img src="/png/folder.png">
                </label>
                <input id="file-input" name="image" type="file" accept="image/*,image/jpeg,image/png,image/jpg" onchange="submit()">
            </form>
        </div>
    </div>
</div>
<script src="/js/matrixBackground.js"></script>
<script src="/js/sidenav.js"></script>
<script src="/js/camera.js"></script>
<script src="/js/snapshot.js"></script>
</body>