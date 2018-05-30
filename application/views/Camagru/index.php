<head>
    <link rel="stylesheet" href="../../../css/styles.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/grids-responsive-min.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/menu.css">
</head>
<div class="pure-g" style="display: flex; justify-content: center">
    <div class="pure-u" style="position: absolute">
        <canvas id="matrix"></canvas>
    </div>
    <div class="pure-u">
        <div id="primary_nav_wrap" class="pure-menu pure-menu-horizontal">
            <ul class="pure-menu-list">
                <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                    <a href="#" id="menuLink1" class="pure-menu-link"><?=$user?></a>
                    <ul class="pure-menu-children">
                        <li class="pure-menu-item"><a href="/authorization/" class="pure-menu-link">Главная</a></li>
                        <li class="pure-menu-item"><a href="/camagru/cabinet" class="pure-menu-link">Личный кабинет</a></li>
                    </ul>
                </li>
               <?=$logout?>
            </ul>
        </div>
    </div>
</div>
<script src="../../../js/matrixBackground.js"></script>