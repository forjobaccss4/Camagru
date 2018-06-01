<head>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/grids-responsive-min.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/menu.css">
</head>
<div class="pure-g">
    <div class="pure-u">
        <div id="primary_nav_wrap" class="pure-menu pure-menu-horizontal">
            <ul class="pure-menu-list">
                <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                    <a href="#" id="menuLink1" class="pure-menu-link"><?=$user?></a>
                    <ul class="pure-menu-children">
                        <li class="pure-menu-item"><a href="/camagru" class="pure-menu-link">Главная</a></li>
                        <li class="pure-menu-item"><a href="/authorization" class="pure-menu-link">Регистрация</a></li>
                        <li class="pure-menu-item"><a href="/camagru/cabinet" class="pure-menu-link">Личный кабинет</a></li>
                    </ul>
                </li>
               <?=$logout?>
            </ul>
        </div>
    </div>
</div>
<div class="pure-g" style="margin-top: 40px">
    <div id="hideThis" class="pure-u-md-1-5">asdasd</div>
    <div class="pure-u-md-3-5 ">asdas</div>
    <div id="hideThisToo" class="pure-u-md-1-5 ">asdasd</div>
</div>
<script src="/js/camagru.js"></script> //НАДО РАЗОБРАТЬСЯ КАК СКРЫТЬ БЛОКИ БОКОВЫЕ