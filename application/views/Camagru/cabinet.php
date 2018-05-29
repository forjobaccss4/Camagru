<div class="container">
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
    <div id="forLoginPage" style="display: flex; position: absolute">
        <form name="authorization_form" method="post" action="/camagru/change" style="text-align: center">
            <input id="signup" name="action" type="radio" value="signup" onclick="getNameOfField(this.id)">
            <label for="signup">Change information</label>
            <div id="wrapper">
                <input id="login" name="login" placeholder="Login" type="text">
            </div>
            <button type="submit" onclick="return validate_form()"><span>Change login</span></button>
            <div id="wrapper">
                <input id="password" name="password" placeholder="Password" type="password">
                <input id="repass" name="repass" placeholder="Repeat password" type="password">
            </div>
            <button type="submit" onclick="return validate_form()"><span>Change password</span></button>
            <div id="wrapper">
                <input id="name" name="name" placeholder="Name" type="text">
            </div>
            <button type="submit" onclick="return validate_form()"><span>Change name</span></button>
            <div id="wrapper">
                <input id="email" name="email" placeholder="Email" type="text">
            </div>
            <button type="submit" onclick="return validate_form()"><span>Change mail</span></button>
        </form>
    </div>
    <div id="wrongRegister" class="wrongRegisterData">
        <button id="dontRemove" class="closeButton" onclick="closeWrongRegisterData()">&times</button>
    </div>
</div>
<script src="../../../js/matrixBackground.js"></script>
<script src="../../../js/chaneUserDataPage.js"></script>