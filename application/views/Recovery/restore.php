<div class="container">
    <canvas id="matrix"></canvas>
    <div id="forLoginPage" style="display: flex; position: absolute">
    <form name="authorization_form" method="post" action="">
        <div id="wrapper">
            <input id="pass" name="pass" placeholder="New password" type="password">
            <input id="repass" name="repass" placeholder="Repeat password" type="password">
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


