<head>
    <link rel="stylesheet" href="../../../css/styles.css">
    <link rel="stylesheet" href="../../../css/menu.css">
    <link rel="stylesheet" href="../../../css/authorization.css">
</head>
<div>
    <canvas id="matrix"></canvas>
    <nav id="primary_nav_wrap">
        <ul>
            <li><a href="#"><?=$user?></a>
                <ul>
                    <li><a id="cabinet" href="/camagru/cabinet">Личный кабинет</a></li>
                    <li><a id="logout" href="/camagru/logout">Выйти</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
<script src="../../../js/matrixBackground.js"></script>