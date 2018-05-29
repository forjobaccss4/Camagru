<?php


namespace application\controllers;

use application\models\Camagru;
use application\models\Login;

class CamagruController extends AppController {

    public function __construct($route) {
        parent::__construct($route);
        session_start();
        $this->user = "Выйти"; //здесь нужно вывести логин пользователя
        if (isset($_SESSION['login'])) {
            $model = new Camagru($_SESSION['login']);
        }

    }

    public function indexAction() {
    }

    public function logoutAction() {
        if (isset($_SESSION['login'])) {
            unset($_SESSION['login']);
            header('Location: /authorization');
        } else {
            ErrorController::errorPage();
        }
    }
}
?>