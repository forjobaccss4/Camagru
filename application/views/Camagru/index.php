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
            <span style="font-size:30px;cursor:pointer; color: #9C9C9C;" onclick="openNav()">&#9776</span>
        </div>
    </div>
<nav>
    <div id="primary_nav_wrap" class="nav-wrapper black center-align">
    <div class="row">
        <div class="col s12">
             <?=$logout?>
                    <ul>
                        <img class="hide-on-small-only" src="/gif/TheMatrixAnimated.gif">
                        <li>
                            <a href="#" id="" class=""><?=$user?></a>
                            <ul class="left">
                                <li class=""><a href="/camagru" class="">Главная</a></li>
                                <li class=""><a href="/authorization" class="">Регистрация</a></li>
                                <li class=""><a href="/camagru/cabinet" class="">Личный кабинет</a></li>
                            </ul>
                        </li>
                    </ul>
        </div>
        </div>
    </div>

</nav>
</div>
<!--<div class="row" style="position: absolute">-->
<!--    <div class="col s12 black center-align">-->
<!--        <img src="/png/camera.png" style="width: 100px;">-->
<!--    </div>-->
<!--</div>-->





<script src="/js/matrixBackground.js"></script>
<script src="/js/sidenav.js"></script>





<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <div class="col s6 m12 red lighten-2">123</div>-->
<!--        <div class="col s6 m12 red lighten-3">123</div>-->
<!--        <div class="col s4 offset-s4 red lighten-1">123</div>-->
<!---->
<!--        <div class="col s5 push-s7 red lighten-2">push</div>-->
<!--        <div class="col s7 pull-s5 red lighten-1">pull</div>-->
<!--    </div>-->
<!--</div>-->


<div id="mySidenav" class="leftbar hide-on-small-only">
    <a href="" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">About</a><br>
    <a href="#">Services</a><br>
    <a href="#">Clients</a><br>
    <a href="#">Contact</a>
</div>
</body>