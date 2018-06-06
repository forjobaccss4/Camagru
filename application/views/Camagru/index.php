<head>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
</head>
<body style="background-color: black">
<canvas id="matrix" style="position: absolute"></canvas>
<div id="main" class="container">
    <div class="row">
        <img class="hide-on-small-only left" style="width: 40px;cursor:pointer;" src="/png/camera.png" onclick="openNav()">
    </div>
    <nav class="black">
        <div id="primary_nav_wrap" class="nav-wrapper black center-align">
            <div class="row">
                <div class="col s12 offset-s3 m12 l12">
                    <ul>
                        <img class="hide-on-med-and-down" src="/gif/TheMatrixAnimated.gif" style="width: 210px">
                        <li>
                            <a href="#" id="" class="col s12"><?=$user?></a>
                            <ul class="left">
                                <li><a href="/camagru">Главная</a></li>
                                <li><a href="/authorization">Регистрация</a></li>
                                <li><a href="/camagru/cabinet">Личный кабинет</a></li>
                                <?=$logout?>
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
            <form id="download" enctype="multipart/form-data" method="post" action="/camagru/image">
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
    <div class="col s12 m8 offset-m2 l6 offset-l3 grey darken-4">
<!--        <div id="chooseFrame">-->
            <img id="chooseFrame" style="width: 320px;height: 250px" src="/png/matrixheroes.png">
<!--        </div>-->
    </div>
</div>
<div class="container">
    <div class="row center-align">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div id="createFrame"></div>
            <video></video>
            <canvas id="example" width=320 height=0></canvas>
        </div>
        <div id="button" class="hide">
            <form  method="post" action="/camagru/image">
                <input id="hiddenInput" name="baseImage" class="hide">
                <button id="snapshot" class="btn waves-effect waves-light" type="submit">make photo</button>
            </form>
        </div>
</div>
</div>
<div class="container_tmp">
    <div class="row center-align">
        <div class="col s12 grey center-align darken-4">
            <?=$message?>
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
            <form id="download" enctype="multipart/form-data" method="post" action="/camagru/image">
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