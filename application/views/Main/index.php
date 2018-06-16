<body style="background-color: black">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=0.7">
    <link rel="stylesheet" href="../../../css/styles.css">
    <link rel="stylesheet" href="../../../css/menu.css">
    <link rel="stylesheet" href="../../../css/authorization.css">
</head>
<div class="container">
    <canvas id="matrix"></canvas>
    <nav id="primary_nav_wrap" style="position:absolute; top: 0; left: 0;">
        <ul style="list-style-type: none;">
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
    <div id="connection" class="connectionPopup">CONNECTING</div>
    <div id="msgbox" class="msgbox"></div>
    <a id="Log" class="buttonBlue" href="#">camagru</a>
    <div id="error" class="error">ERROR</div>
</div>
<script src="../../../js/matrixBackground.js"></script>
</body>