<?php

namespace application\models;


use application\controllers\ErrorController;
use application\core\base\Model;

class Login extends Model
{

    public $returnMessage = '';

    public function checkEnteredData() { //Пpoверить на пустые поля
        $this->table = 'user';
        $findUser = $this->findOne($_POST['login'], 'login');
        if (count($findUser) && !strcmp($findUser[0]['login'], $_POST['login'])) {
            $cryptedPass = crypt(trim(htmlspecialchars(stripslashes($_POST['pass']))), "ZqbHp9lb");
            if ($findUser[0]['password'] && hash_equals($findUser[0]['password'], $cryptedPass)) {
                if ((count($checkConfirm = $this->findOne($_POST['login'], "login"))) == 1) {
                    if ($checkConfirm[0]['confirm'] == 0) {
                        $this->returnMessage =  "Вы не подтвердили свой аккаунт," . "<br>" . "пожалуйста перейдите по ссылке на Вашей почте";
                    }
                }
            } else
                $this->returnMessage = "Неверный логин или пароль";
        }else
            $this->returnMessage = "Неверный логин или пароль";
        return $this->returnMessage;
    }
}
