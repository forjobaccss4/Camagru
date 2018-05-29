<?php

namespace application\core;

use application\controllers\ErrorController;

class Router {
    protected static $routes = []; //Весь массив маршрутов
    protected static $route = []; //Текущий маршрут, который вызывается по текущему url адресу

    public static function add($regexp, $route = []) { //Наполнение маршрутов
        self::$routes[$regexp] = $route;
    }

    private static function matchRoute($url) { //Перебираем в цикле наши свойства routes и получаем из него отдельно регуярное выражение, и отдельно текущий маршрут
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if(is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                if (!isset($route['action'])) {
                    $route['action'] = 'index';
                }
                $route['controller'] = ucfirst($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    public static function dispatch($url) { // Перенапрявляет URL по корректному маршруту к нужному контролеру
        if (self::matchRoute($url)) {
            $controller = 'application\controllers\\' . self::$route['controller'] . 'Controller';
            if (class_exists($controller)) {
                $cObj = new $controller(self::$route);
                $action = lcfirst(self::$route['action']) . "Action";
                if (method_exists($cObj, $action)) {
                    $cObj->$action();
                    $cObj->getView();
                }else {
                    ErrorController::errorPage(self::$route);
                }
            }else {
                ErrorController::errorPage(self::$route);
            }
        }else {
            ErrorController::errorPage(self::$route);
        }
    }
}
?>