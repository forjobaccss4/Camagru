<body style="background-color: black">
<head>
    <link rel="stylesheet" href="../../../css/styles.css">
    <link rel="stylesheet" href="../../../css/menu.css">
    <link rel="stylesheet" href="../../../css/authorization.css">
</head>
<div class="container">
    <canvas id="matrix"></canvas>
    <nav id="primary_nav_wrap">
        <ul>
            <li><a href="/authorization">Авторизация</a>
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
