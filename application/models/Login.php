<?php

namespace application\models;


use application\controllers\ErrorController;
use application\core\base\Model;

class Login extends Model
{

    public $returnMessage = '';
    private $route = ['controller' => 'Error', 'action' => 'whooops'];

    public function checkEnteredData() {
        if (empty($_POST['login'])) {
            ErrorController::whooopsAction($this->route, "Неверный логин или пароль");
            exit;
        }
        $this->table = 'user';
        $findUser = $this->findOne($_POST['login'], 'login');
        if (count($findUser) && !strcmp($findUser[0]['login'], $_POST['login'])) {
            if ($findUser[0]['password'] && password_verify($_POST['pass'], $findUser[0]['password'])) {
                if ((count($checkConfirm = $this->findOne($_POST['login'], "login"))) == 1) {
                    if ($checkConfirm[0]['confirm'] == 0) {
                        $this->returnMessage =  "Вы не подтвердили свой аккаунт," . "<br>" . "пожалуйста" . "<br>" ." перейдите по ссылке на Вашей почте";
                    }
                }
            } else
                $this->returnMessage = "Неверный логин или пароль";
        }else
            $this->returnMessage = "Неверный логин или пароль";
        return $this->returnMessage;
    }
}
