<?php

namespace application\controllers;

use application\models\Authorization;
use application\models\Login;

class AuthorizationController extends AppController {
    public $routeError = ['controller' => 'Error', 'action' => 'error'];
    public $errorMessageIfRegisteredAlready = [];

    public function __construct($route) {
        parent::__construct($route);
        session_start();
        if (isset($_SESSION['login'])) {
            $this->user = $_SESSION['login'];
            $this->button = "<li><a href=\"/camagru/logout\">Выйти</a></li>";
        }else {
            $this->user = "Гость";
        }
    }

    public function indexAction() {
    }

    public function registerAction() {
        $model = new Authorization();
        if (empty($_POST['login']) || empty($_POST['pass']) || empty($_POST['repass']) || empty($_POST['email']) || empty($_POST['yourname'])) {
            ErrorController::errorPage();
            exit;
        }
        $this->errorMessageIfRegisteredAlready = $model->registration($_POST['login'], $_POST['pass'], $_POST['repass'], $_POST['email'], $_POST['yourname']);
        if (!empty($this->errorMessageIfRegisteredAlready)) {
            ErrorController::whooopsRegisterAction($this->routeError, $this->errorMessageIfRegisteredAlready);
        }
    }

    public function loginAction() {
        $this->routeError = ['controller' => 'Error', 'action' => 'whooops'];
        $compareUserData = new Login();
        if (empty($this->message = $compareUserData->checkEnteredData())) {
            $_SESSION['login'] = $_POST['login'];
            header('Location: /camagru');
            exit;
        }else {
            ErrorController::whooopsAction($this->routeError, $this->message);
        }
    }

    public function activationAction() {
        $url = rtrim($_SERVER['QUERY_STRING'], '/');
        $model = new Authorization();
        $model->checkConfirmUrl($url);
    }
}
