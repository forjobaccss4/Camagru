<body style="background-color: black">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=0.7">
    <link rel="stylesheet" href="../../../css/styles.css">
    <link rel="stylesheet" href="../../../css/menu.css">
    <link rel="stylesheet" href="../../../css/authorization.css">
</head>
<div class="container_tmp">
    <canvas id="matrix"></canvas>
        <nav id="primary_nav_wrap" style="position:absolute; top: 0; left: 0px;">
            <ul style="list-style-type: none">
                <li>
                    <a href="#" id="user" class="col s12"><?=$user?></a>
                    <ul class="left" style="list-style-type: none">
                        <li><a href="/camagru">Галерея</a></li>
                        <li><a href="/authorization">Авторизация</a></li>
                        <li id="myCabinet"><a href="/camagru/cabinet">Личный кабинет</a></li>
                        <?=$logout?>
                    </ul>
                </li>
            </ul>
        </nav>
    <form action="/authorization" style="display: flex; justify-content: center">
        <div id="mainMessage" class="confirmPopup">Мы выслали Вам письмо с инструкцией на Ваш email, если он существует
            <button id="dontRemove" class="closeButton"">&times</button>
        </div>
    </form>
</div>
<script src="../../../js/matrixBackground.js"></script>
</body>