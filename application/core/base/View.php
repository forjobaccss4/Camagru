<?php

namespace application\core\base;


class View {

    public $route = []; // Текущий маршрут
    public $view; //Текущий вид
    public $layout; //Текущий шаблон

    public function __construct($route, $layout = '', $view = '') {
        $this->route = $route;
        $this->layout = $layout ?: LAYOUT;
        $this->view = $view;
    }

    public function render($message, $linkToImage) {
        $file_view = APP . "/views/{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if(is_file($file_view)) {
            require $file_view;
        }else {
            echo "<p><b>$file_view</b> not found</p>";
        }
        $content = ob_get_clean();

        $file_layout = APP . "/views/layouts/{$this->layout}.php";
        if (is_file($file_layout)) {
            require_once $file_layout;
        }else {
            echo " Не найден шаблон";
        }
    }
}