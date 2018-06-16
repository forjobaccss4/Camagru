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
        }else {
            $this->user = "Гость";
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
        if (empty($_SESSION['login'])){
            ErrorController::errorPage();
            exit;
        }else {
            $model = new Camagru($_POST);
            $model->changeLogin();
        }

    }
    public function passwordAction() {
        if (empty($_SESSION['login'])){
            ErrorController::errorPage();
            exit;
        }else {
            $model = new Camagru($_POST);
            $model->changePassword();
        }
    }
    public function nameAction() {
        if (empty($_SESSION['login'])){
            ErrorController::errorPage();
            exit;
        }else {
            $model = new Camagru($_POST);
            $model->changeName();
        }
    }
    public function mailAction() {
        if (empty($_SESSION['login'])){
            ErrorController::errorPage();
            exit;
        }else {
            $model = new Camagru($_POST);
            $model->changeMail();
        }
    }

    public function imageAction() {
        if (empty($_POST['stickerId0']) && empty($_POST['stickerId']) && empty($_POST['stickerId1']) && empty($_POST['stickerId2']) ) {
            ErrorController::errorPage();
            exit;
        }
        $model = new Other();
        $postArray = ["sticker0" => $_POST['stickerId0'], "sticker" => $_POST['stickerId'], "sticker1" => $_POST['stickerId1'], "sticker2" => $_POST['stickerId2']];
        $model->makeImage($_POST['baseImage'], $postArray);
    }

    public function uploadAction() {
        if (empty($_POST['stickerId3']) && empty($_POST['stickerId4']) && empty($_POST['stickerId5']) && empty($_POST['stickerId6'])) {
            ErrorController::errorPage();
            exit;
        }
        $model = new Other();
        $postArray = ["sticker6" => $_POST['stickerId6'], "sticker_empty" => $_POST['stickerId3'], "sticker1" => $_POST['stickerId4'], "sticker2" => $_POST['stickerId5']];
        $model->makeImage($_POST['baseImage1'], $postArray);
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