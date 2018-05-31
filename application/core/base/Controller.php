<?php

namespace application\core\base;

abstract class  Controller {

    public $route = [];
    public $view;
    public $layout;
    public $message = ''; //Пользовательские сообщения
    public $user = '';
    public $linkToImage = '';
    public $button = '';

    public function __construct($route) {
        $this->route = $route;
        $this->view = $route['action'];
    }

    public function getView() {
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render($this->message, $this->user, $this->button, $this->linkToImage);
    }
}
?>