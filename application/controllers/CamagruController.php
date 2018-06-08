<?php

namespace application\controllers;

use application\models\Camagru;
use application\models\Other;

class CamagruController extends AppController {

    public function __construct($route) {
        parent::__construct($route);
        session_start();
        if (!isset($_SESSION['login'])) {
            ErrorController::errorPage();
        }
        if (isset($_SESSION['login'])) {
            $this->user = $_SESSION['login'];
            $this->button = "<li><a href=\"/camagru/logout\">Выйти</a></li>";
        }
    }

    public function indexAction() {
        $model = new Other();
        $this->message = $model->showAllPhoto();
    }

    public function logoutAction() {
        if (isset($_SESSION['login'])) {
            unset($_SESSION['login']);
            header('Location: /authorization');
        }else {
            ErrorController::errorPage();
        }
    }

    public function cabinetAction() {

    }

    public function loginAction() {
        $model = new Camagru($_POST);
        $model->changeLogin();

    }
    public function passwordAction() {
        $model = new Camagru($_POST);
        $model->changePassword();
    }
    public function nameAction() {
        $model = new Camagru($_POST);
        $model->changeName();
    }
    public function mailAction() {
        $model = new Camagru($_POST);
        $model->changeMail();
    }

    public function imageAction() {
        $model = new Other();
        $model->makeImage($_POST['baseImage']);
    }

    public function likesAction() {
        $model = new Other();
        $model->addLikes();
    }
}
?>