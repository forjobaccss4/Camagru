<head>
    <link rel="stylesheet" href="../../../css/styles.css">
    <link rel="stylesheet" href="../../../css/menu.css">
    <link rel="stylesheet" href="../../../css/authorization.css">
</head>
<div style="display: flex; justify-content: center; align-items: center">
    <canvas id="matrix"></canvas>
    <nav id="primary_nav_wrap">
        <ul>
            <li><a href="/authorization">Авторизация</a>
            </li>
        </ul>
    </nav>
   <div style="position: absolute; text-align: center; font-weight: 400;font-size: 20px; text-shadow: 0 0 10px rgba(0, 231, 0, 1);"><p><?=$message?></p>
    <?=$linkToImage?>
   </div>
    <script src="../../../js/RedMatrix.js"></script>
</div>