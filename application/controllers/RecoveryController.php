<?php


namespace application\controllers;

use application\models\Recovery;


class RecoveryController extends AppController {

    public function indexAction() {
        if (!empty($_POST['login'])) {
            $tryToRecover = new Recovery;
            $tryToRecover->sendEmailToRecoverPass($_POST['login']);
        }else {
            ErrorController::errorPage();
        }
    }

    public function restoreAction() {
        $url = rtrim($_SERVER['QUERY_STRING'], '/');
        $model = new Recovery();
        if ($trueFalse = $model->restoreChecker($url)) {

        }else {
            ErrorController::errorPage();
        }
    }
}
