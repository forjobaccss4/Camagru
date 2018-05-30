<head>
    <link rel="stylesheet" href="../../../css/styles.css">
    <link rel="stylesheet" href="/css/cabinet.css">
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
                    <li class="pure-menu-item"><a href="/authorization" class="pure-menu-link">Главная</a></li>
                    <li class="pure-menu-item"><a href="#" class="pure-menu-link">Личный кабинет</a></li>
                </ul>
            </li>
            <li id="logout" style="float: right" class="pure-menu-item pure-menu-selected"><a href="/camagru/logout" class="pure-menu-link">Выход</a></li>
        </ul>
    </div>
    </div>
    <div class="pure-u-md-1-3 pure-u-lg-1-4" style="margin-top: 50px">
        <style scoped>
            .button-success {
                background: rgba(45, 150, 45, 0.55);
                border: none;
                border-radius: 8px;
                color: #fff;
                cursor: pointer;
                font-family: 'Raleway', sans-serif;
                margin-bottom: 10px;
                overflow: hidden;
                transition: all .3s cubic-bezier(.6, 0, .4, 1);
            }
            input[type=radio]:checked + label {
                opacity: 1;
            }

            input[type=text],
            input[type=password] {
                background: #fff;
                border: none;
                border-radius: 8px;
                font-family: 'Raleway', sans-serif;
                margin-bottom: 10px;
                text-indent: 20px;
                transition: all .2s ease-in-out;
                opacity: .7;
            }
        </style>
        <form class="pure-form pure-form-stacked">
             <fieldset class="pure-group">
            <input class="pure-input-1" type="text" placeholder="Login">
            </fieldset>
            <button type="submit" class="button-success pure-button pure-button-primary pure-input-1">Изменить логин</button>
            <fieldset class="pure-group">
                <input class="pure-input-1" type="password" placeholder="Password">
                <input class="pure-input-1" type="password" placeholder="Repeat password">
            </fieldset>
            <button type="submit" class="button-success pure-button pure-button-primary pure-input-1">Изменить пароль</button>
            <fieldset class="pure-group">
                <input class="pure-input-1" type="text" placeholder="Name">
            </fieldset>
            <button type="submit" class="button-success pure-button pure-button-primary pure-input-1">Изменить имя</button>
            <fieldset class="pure-group">
                <input class="pure-input-1" type="text" placeholder="Email">
            </fieldset>
            <button type="submit" class="button-success pure-button pure-button-primary pure-input-1">Изменить email</button>
        </form>
    </div>
</div>
    <script src="../../../js/matrixBackground.js"></script>