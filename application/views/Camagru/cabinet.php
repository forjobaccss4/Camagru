<head>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/grids-responsive-min.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/cabinet.css">
</head>
<!--<div class="container">-->
<!--    <canvas id="matrix"></canvas>-->
<!--    <nav id="primary_nav_wrap">-->
<!--        <ul>-->
<!--            <li><a href="#">--><?//=$user?><!--</a>-->
<!--                <ul>-->
<!--                    <li><a id="cabinet" href="/camagru/cabinet">Личный кабинет</a></li>-->
<!--                    <li><a id="logout" href="/camagru/logout">Выйти</a></li>-->
<!--                </ul>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </nav>-->
<!--    <div id="forLoginPage" style="display: flex; position: absolute">-->
<!--        <form name="authorization_form" method="post" action="/camagru/change" style="text-align: center">-->
<!--            <input id="signup" name="action" type="radio" value="signup" onclick="getNameOfField(this.id)">-->
<!--            <label for="signup">Change information</label>-->
<!--            <div id="wrapper">-->
<!--                <input id="login" name="login" placeholder="Login" type="text">-->
<!--            </div>-->
<!--            <button type="submit" onclick="return validate_form()"><span>Change login</span></button>-->
<!--            <div id="wrapper">-->
<!--                <input id="password" name="password" placeholder="Password" type="password">-->
<!--                <input id="repass" name="repass" placeholder="Repeat password" type="password">-->
<!--            </div>-->
<!--            <button type="submit" onclick="return validate_form()"><span>Change password</span></button>-->
<!--            <div id="wrapper">-->
<!--                <input id="name" name="name" placeholder="Name" type="text">-->
<!--            </div>-->
<!--            <button type="submit" onclick="return validate_form()"><span>Change name</span></button>-->
<!--            <div id="wrapper">-->
<!--                <input id="email" name="email" placeholder="Email" type="text">-->
<!--            </div>-->
<!--            <button type="submit" onclick="return validate_form()"><span>Change mail</span></button>-->
<!--        </form>-->
<!--    </div>-->
<!--    <div id="wrongRegister" class="wrongRegisterData">-->
<!--        <button id="dontRemove" class="closeButton" onclick="closeWrongRegisterData()">&times</button>-->
<!--    </div>-->
<!--</div>-->
<!--<script src="../../../js/matrixBackground.js"></script>-->
<!--<script src="../../../js/chaneUserDataPage.js"></script>-->
<div class="pure-g">
    <div class="pure-menu pure-menu-horizontal">
        <ul class="pure-menu-list">
            <li class="pure-menu-item pure-menu-selected"><a href="#" class="pure-menu-link">Главная</a></li>
            <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                <a href="#" id="menuLink1" class="pure-menu-link">Контакты</a>
                <ul class="pure-menu-children">
                    <li class="pure-menu-item"><a href="#" class="pure-menu-link">Email</a></li>
                    <li class="pure-menu-item"><a href="#" class="pure-menu-link">Twitter</a></li>
                    <li class="pure-menu-item"><a href="#" class="pure-menu-link">Facebook</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
        <form class="pure-form pure-form-stacked">
                <fieldset>
                <input class="pure-input-1-2" type="text" placeholder="Login">
                <button type="submit" class="pure-button pure-button-primary">Изменить логин</button>
                </fieldset>
                 <fieldset>
                <input class="pure-input-1-2" type="password" placeholder="Password">
                <input class="pure-input-1-2" type="password" placeholder="Repeat password">
                <button type="submit" class="pure-button pure-button-primary">Изменить пароль</button>
                </fieldset>
                <fieldset>
                <input class="pure-input-1-2" type="text" placeholder="Name">
                <button type="submit" class="pure-button pure-button-primary">Изменить имя</button>
                </fieldset>
                <fieldset>
                <input class="pure-input-1-2" type="text" placeholder="Email">
                <button type="submit" class="button-xlarge pure-button pure-button-primary">Изменить email</button>
                </fieldset>
        </form>
    </div>
</div>