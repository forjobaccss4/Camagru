<head>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="/css/additional.css">
</head>
<div style="background-color: black;">
<canvas id="matrix" style="position: absolute"></canvas>
<div id="main" class="container">
    <div class="row">
        <img id="hide-on-guest" class="hide-on-small-only left" style="width: 40px;cursor:pointer;" src="/png/camera.png" onclick="openNav()">
    </div>
    <nav class="black">
        <div id="primary_nav_wrap" class="nav-wrapper black center-align">
            <div class="row">
                <div class="col s12 offset-s3 m12 l12">
                    <ul class="center-align">
                        <img class="hide-on-med-and-down" src="/gif/TheMatrixAnimated.gif" style="width: 210px">
                        <li>
                            <a href="#" id="user" class="col s12"><?=$user?></a>
                            <ul class="left">
                                <li><a href="/camagru">Галерея</a></li>
                                <li><a href="/authorization">Авторизация</a></li>
                                <li id="myCabinet"><a href="/camagru/cabinet">Личный кабинет</a></li>
                                <?=$logout?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
<br><br><br><br><br>
<div id="hide-on-guest-too" class="container hide-on-med-and-up">
    <div class="row">
        <div class="col s12">
            <img src="/png/camera.png" style="width: 70px; cursor:pointer;" onclick="camera()">
        </div>
    </div>
    <div class="row" style="position: relative">
        <div class="image-upload">
                <label for="file">
                    <img src="/png/folder.png" style="width: 90px">
                </label>
        </div>
    </div>
</div>
<div id="needShow1" class="container_tmp hide">
    <div class="row center-align">
        <div id="chooseFrame" class="col s12 black center-align">
            <img id="/png/empty.png1" src="/png/empty.png" class="choose_img" onclick="chooseSticker(this.id)">
            <img id="/png/sigara.png1" src="/png/sigara.png" class="choose_img" onclick="chooseSticker(this.id)">
            <img id="/png/glasses.png1" src="/png/glasses.png" class="choose_img" onclick="chooseSticker(this.id)">
            <img id="/png/snoop.png1" src="/png/snoop.png" class="choose_img" onclick="chooseSticker(this.id)">
        </div>
    </div>
</div>


    <div id="needShow3" class="container_tmp hide">
        <div class="row center-align">
            <div id="chooseFrame" class="col s12 black center-align">
                <img id="/png/empty.png" src="/png/empty.png" class="choose_img" onclick="chooseStickerUploaded(this.id)">
                <img id="/png/sigara.png" src="/png/sigara.png" class="choose_img" onclick="chooseStickerUploaded(this.id)">
                <img id="/png/glasses.png" src="/png/glasses.png" class="choose_img" onclick="chooseStickerUploaded(this.id)">
                <img id="/png/snoop.png" src="/png/snoop.png" class="choose_img" onclick="chooseStickerUploaded(this.id)">
            </div>
        </div>
    </div>

    <div id="forUpload" class="container_tmp hide">
        <div class="row">
            <div id="firstElementHere" class="container_tmp col s12 m8 offset-m2 l6 offset-l3 center-align">
                <span id="output"></span>
                <button id="snapshot1" class="btn waves-light" type="submit">snap</button>
            </div>
        </div>

    </div>
<div id="needShow2" class="container hide">
    <div class="row center-align">
        <div id="createFrame" class="col s12 m8 offset-m2 l6 offset-l3">
            <video></video>
            <canvas id="example" width=320 height=0></canvas>
        </div>
        <div id="button" class="hide">
            <form method="post" action="/camagru/image">
                <input id="hiddenInput" name="baseImage" class="hide">
                <input id="hiddenInput0" name="stickerId0" class="hide">
                <input id="hiddenInput1" name="stickerId" class="hide">
                <input id="hiddenInput2" name="stickerId1" class="hide">
                <input id="hiddenInput3" name="stickerId2" class="hide">
                <button id="snapshot" class="btn waves-light" type="submit">snap</button>
            </form>
        </div>
    </div>
</div>
<?=$message?>
<div id="mySidenav" class="leftbar hide-on-small-only">
    <a href= "javascript:void(0)" class="closebtn" onclick="closeNav()">Close</a>
    <div class="row" style="position: relative">
        <div class="col s12 #2d2f33" style="padding-top: 25px">
            <img src="/png/camera.png" style="width: 70px; cursor:pointer;" onclick="camera()">
        </div>
    </div>
    <div class="row" style="position: relative">
        <div class="image-upload">
            <form id="download" enctype="multipart/form-data" method="post" action="/camagru/upload">
                <label for="file">
                    <img src="/png/folder.png">
                </label>
                <input id="hiddenInput4" name="baseImage1" class="hide">
                <input id="hiddenInput5" name="stickerId3" class="hide">
                <input id="hiddenInput6" name="stickerId4" class="hide">
                <input id="hiddenInput7" name="stickerId5" class="hide">
                <input id="hiddenInput8" name="stickerId6" class="hide">
                <input id="file" name="file" type="file" accept="image/png">
            </form>
        </div>
    </div>
</div>
<div class="container_tmp">
    <div class="row">
        <div class="col s12">
            <ul id="pagination" class="pagination">
            </ul>
        </div>
    </div>
</div>
<script src="/js/matrixBackground.js"></script>
<script src="/js/sidenav.js"></script>
<script src="/js/camera.js"></script>
<script src="/js/likesComments.js"></script>
<script src="/js/deletePhoto.js"></script>
<script src="/js/pagination.js"></script>
<script src="/js/uploadedPhoto.js"></script>
</div>
