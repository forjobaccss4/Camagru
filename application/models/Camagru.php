<?php

namespace application\models;

use application\core\base\Model;
use application\controllers\ErrorController;

class Camagru extends Model
{
    private $login;
    private $route = ['controller' => 'Error', 'action' => 'whooops'];

    public function __construct() {
        parent::__construct();
        $this->login = $_SESSION['login'];
    }

    public function changePersonalData($allVariables) {
        if (!count($allVariables)) {
            ErrorController::errorPage();
        }
        foreach ($allVariables as $key => $value) {
            $this->table = 'user';
            if ($key == "login" && !empty($value)) {
                debug($this->findOne($value, "login"));
                if (!$this->findOne($value, "login")) {
                    $changeLogin = $this->findOne($this->login, "login");
                    $this->login =  $_SESSION['login'] = $value; //меняется пользователь во время смены логина потмоу что я меняю логин в сессии
                    $this->updateOne($this->table, "login", "\"$value\"", "id", $changeLogin[0]['id']);
                }else {
                    ErrorController::whooopsAction($this->route, "Такой логин уже занят!");
                }
            }
            if (($key == "pass" || $key == "repass") && (!empty($value))) {
                $this->changePassword($allVariables["pass"], $allVariables["repass"]);
            }
//            if ($key == "pass") {
//                echo $value;
//            }
//            if ($key == "login") {
//                echo $value;
//            }
//            if ($key == "login") {
//                echo $value;
//            }
        }
//        debug($allVariables);
    }

    private function changePassword($pass, $repass) {
        if (empty($pass) || empty(($repass))) {
            ErrorController::whooopsAction($this->route, "Пароль не может быть пустой!");
        }
        if ($pass != $repass) {
            ErrorController::whooopsAction($this->route, "Пароли не совпадают!");
        }
    }

    private function checkLoginRegular($login) {
        $len = strlen($login);


        if (empty($login)) {
            $this->loginMessage = 'Логин не может быть пустым';
            return false;
        }
        if ($len < 4 || $len > 20) {
            $this->loginMessage = 'В логине должно быть от 4 до 20 символов';
            return false;
        }
        if (!preg_match("/^[a-zA-Z1-9]+$/", $login)) {
            $this->loginMessage = 'В логине должны быть только латинские буквы';
            return false;
        }

        if (!empty($login)) {
            if (is_numeric($login{0})) {
                $this->loginMessage = 'Логин должен начинаться с буквы';
                return false;
            }
        }
        return true;
    }
}
