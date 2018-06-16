<body style="background-color: black">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=0.7">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="/css/authorization.css">
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
    <div id="forLoginPage" style="display: flex; position: absolute">
    <form name="authorization_form" method="post" action="">
        <div id="wrapper">
            <input id="pass" name="pass" placeholder="New password" type="password">
            <input id="repass" name="repass" placeholder="Repeat password" type="password">
            <input style="display: none" id="hash" name="hash" type="password">
        <button type="submit" onclick="return validate_form()">Change password</button>
    </form>
    </div>
</div>
<div id="wrongRegister" class="wrongRegisterData">
    <button id="dontRemove" class="closeButton" onclick="closeWrongRegisterData()">&times</button>
</div>
</div>
<script src="../../../js/matrixBackground.js"></script>
<script src="../../../js/checkPasswordRecovery.js"></script>
</body>
