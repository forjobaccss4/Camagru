<?php

namespace application\controllers;


use application\models\Error;

class ErrorController extends AppController {

    public static function errorPage()
    {
        $route = ['controller' => "Error", 'action' => 'error'];
        $myObj = new self($route);
        $myObj->route['controller'] = "Error";
        $myObj->view = "error";
        $myObj->getView();
    }

    public static function whooopsAction($route, $messages) {
        $myObj = new self($route);
        $myObj->view = "whooops";
        if (!empty($messages) && $messages != "1") {
            $myObj->message =  "WHOOOPS, SOMETHING WENT WRONG" . "<br>" . $messages;
        }else {
            $myObj->message = "WHOOOPS, SOMETHING WENT WRONG" . "<br>" . "Неверный логин или пароль";
        }
        $error = new Error();
        $myObj->linkToImage = $error->getRandImage();
        $myObj->getView();
    }
    public static function whooopsRegisterAction($route, $messages) {
        $myObj = new self($route);
        $myObj->view = "whooops";
        if (count($messages) == 2) {
            $myObj->message = "WHOOOPS, SOMETHING WENT WRONG" . "<br>" . $messages[0] . "<br>" . "$messages[1]";
        }else {
            $myObj->message = "WHOOOPS, SOMETHING WENT WRONG" . "<br>" . $messages[0];
        }
        $error = new Error();
        $myObj->linkToImage = $error->getRandImage();
        $myObj->getView();
    }
}