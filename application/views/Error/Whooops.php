<body style="background-color: black">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=0.7">
    <link rel="stylesheet" href="../../../css/styles.css">
    <link rel="stylesheet" href="../../../css/menu.css">
    <link rel="stylesheet" href="../../../css/authorization.css">
</head>
<div style="display: flex; justify-content: center; align-items: center">
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
   <div style="position: absolute; text-align: center; font-weight: 400;font-size: 20px; text-shadow: 0 0 10px rgba(0, 231, 0, 1);"><p><?=$message?></p>
    <?=$linkToImage?>
   </div>
    <script src="/js/RedMatrix.js"></script>
</div>
</body>