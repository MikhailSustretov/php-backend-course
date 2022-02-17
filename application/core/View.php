<?php

namespace application\core;

class View
{

    public $path;
    public $route;
    public $header = 'header';
    public $footer = 'footer';
    public $pagination = 'pagination';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    public function render($vars = [])
    {
        extract($vars);

        require_once 'application/views/layouts/' . $this->header . '.php';
        require_once 'application/views/' . $this->path . '.php';
        require_once 'application/views/layouts/' . $this->footer . '.php';
    }

    public function renderWithPagination($vars = [])
    {
        extract($vars);

        require_once 'application/views/layouts/' . $this->header . '.php';
        require_once 'application/views/' . $this->path . '.php';
        require_once 'application/views/layouts/' . $this->pagination . '.php';
        require_once 'application/views/layouts/' . $this->footer . '.php';
    }


    public function redirect($url)
    {
        header("location: $url");
        exit;
    }

    public static function errorCode($code)
    {
        http_response_code($code);
        require_once 'application/views/errors/' . $code . '.php';
        exit;
    }
}































