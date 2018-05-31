<?php

namespace application\controllers;

use application\models\Camagru;
use application\models\Login;

class CamagruController extends AppController {

    public function __construct($route) {
        parent::__construct($route);
        session_start();
        if (!isset($_SESSION['login'])) {
            ErrorController::errorPage();
        }
        if (isset($_SESSION['login'])) {
            $model = new Camagru($_SESSION['login']);
            $this->user = $_SESSION['login']; //здесь нужно вывести логин пользователя
        }
    }

    public function indexAction() {
        if (isset($_SESSION['login'])) {
            $this->button = "<li style=\"float: right\"><a href=\"/camagru/logout\">Выход</a></li>";
        }
    }

    public function logoutAction() {
        session_start();
        if (isset($_SESSION['login'])) {
            unset($_SESSION['login']);
            header('Location: /authorization');
        } else {
            ErrorController::errorPage();
        }
    }

    public function cabinetAction() {

    }

    public function changeAction() {
        $model = new Camagru();
        $model->changePersonalData($_POST);

    }
}
?>