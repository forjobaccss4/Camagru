<?php

namespace application\controllers;


class MainController extends AppController {

    public function indexAction() {
        session_start();
        if (isset($_SESSION['login'])) {
            $this->user = $_SESSION['login'];
            $this->button = "<li><a href=\"/camagru/logout\">Выйти</a></li>";
        }else {
            $this->user = "Гость";
        }
    }
}