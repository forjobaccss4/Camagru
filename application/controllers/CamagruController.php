<?php

namespace application\controllers;

use application\models\Camagru;
use application\models\Other;

class CamagruController extends AppController {

    public function __construct($route) {
        parent::__construct($route);
        session_start();
        if (isset($_SESSION['login'])) {
            $this->user = $_SESSION['login'];
            $this->button = "<li><a href=\"/camagru/logout\">Выйти</a></li>";
        }
    }

    public function indexAction() {
        if (isset($_SESSION['login'])) {
            $model = new Other();
            $this->message = $model->showAllPhoto();
        }else {
            $model = new Other();
            $this->message = $model->showGallery();
        }
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
        if (empty($_SESSION['login'])){
            ErrorController::errorPage();
            exit;
        }
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
        if (empty($_POST['baseImage']) || empty($_POST['stickerId'])) {
            ErrorController::errorPage();
            exit;
        }
        $model->makeImage($_POST['baseImage'], $_POST['stickerId']);
    }

    public function likesAction() {
        if (empty($_POST['path'])){
            ErrorController::errorPage();
            exit;
        }
        $model = new Other();
        $model->addLikes();
    }

    public function commentsAction() {
        if (empty($_POST['comment']) || empty($_POST['photo'])) {
            ErrorController::errorPage();
            exit;
        }
        $model = new Other();
        $model->addComments();
    }

    public function loadCommentsAction() {
        if (empty($_POST['commentId'])) {
            ErrorController::errorPage();
            exit;
        }
        $model = new Other();
        $model->loadComments();
    }

    public function notificationAction() {
        if (empty($_POST['notEmpty'])) {
            ErrorController::errorPage();
            exit;
        }
        $model = new Other();
        $model->removeNotification();
    }

    public function notificationCheckerAction() {
        if (empty($_POST['notEmpty'])) {
            ErrorController::errorPage();
            exit;
        }
        $model = new Other();
        $model->checkNotification();
    }

    public function deletePhotoAction() {
        if (empty($_POST['deleteId'])){
            ErrorController::errorPage();
            exit;
        }
        $model = new Other();
        $model->deleteUserPhoto($_POST['deleteId']);
    }
}
?>