<body style="background-color: black">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/cabinet.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/grids-responsive-min.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/menu.css">

</head>
<canvas id="matrix" style="position: absolute"></canvas>
<div id="main" class="container_tmp">
    <nav class="black">
        <div id="primary_nav_wrap" class="nav-wrapper black center-align">
            <div class="row">
                <div class="col s12 offset-s3 m12 l12">
                    <ul>
                        <li>
                            <a href="#" id="" class="col s12"><?=$user?></a>
                            <ul class="left">
                                <li><a href="/camagru">Галерея</a></li>
                                <li><a href="/camagru/cabinet">Личный кабинет</a></li>
                                <?=$logout?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
<br><br><br><br><br>
    <div class="container_tmp">
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
        <form style="text-align: center; color: white;" class="pure-form pure-form-stacked" method="post" action="/camagru/login">
             <fieldset class="pure-group">
                <input id="enteredLogin" name="login" class="pure-input-1" type="text" placeholder="Login">
            </fieldset>
            <button id="change_login" type="submit" class="button-success pure-button pure-button-primary pure-input-1" onclick="return getNameOfField(this.id)">Изменить логин</button>
            <p id="errorLogin" style="color: red; position: relative"></p>
        </form>
        <form style="text-align: center; color: white;" class="pure-form pure-form-stacked" method="post" action="/camagru/password">
            <fieldset class="pure-group">
                <input id="enteredPass" name="pass" class="" type="password" placeholder="New pass">
                <input id="enteredRepass" name="repass" class="" type="password" placeholder="Repeat new pass">
            </fieldset>
            <button id="change_pass" type="submit" class="button-success pure-button pure-button-primary pure-input-1" onclick="return getNameOfField(this.id)">Изменить пароль</button>
            <p id="errorPass" style="color: red; position: relative"></p>
        </form>
        <form style="text-align: center; color: white;" class="pure-form pure-form-stacked" method="post" action="/camagru/name">
            <fieldset class="pure-group">
                <input id="enteredName" name="name" class="pure-input-1" type="text" placeholder="Name">
            </fieldset>
            <button id="change_name" type="submit" class="button-success pure-button pure-button-primary pure-input-1" onclick="return getNameOfField(this.id)">Изменить имя</button>
            <p id="errorName" style="color: red; position: relative"></p>
        </form>
        <form style="text-align: center; color: white;" class="pure-form pure-form-stacked" method="post" action="/camagru/mail">
            <fieldset class="pure-group">
                <input id="enteredMail" name="email" class="pure-input-1" type="text" placeholder="Email">
            </fieldset>
            <button id="change_mail" type="submit" class="button-success pure-button pure-button-primary pure-input-1" onclick="return getNameOfField(this.id)">Изменить email</button>
            <p id="errorMail" style="color: red; position: relative"></p>
        </form>
        <button id="notification" type="submit" class="button-success pure-button pure-button-primary pure-input-1" onclick="removeNotifications()"></button>
    </div>
</div>
<script src="/js/matrixBackground.js"></script>
<script src="/js/changeUserDataPage.js"></script>
<script src="/js/notifications.js"></script>
</body>