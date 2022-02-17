<?php

namespace application\core;

abstract class Controller
{
    public $route;
    public $view;
    public $models;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
    }

    public function loadModel($model, $modelName = 0)
    {
        $path = 'application\models\\' . $model;
        if (class_exists($path)) {
            $this->models[($modelName == 0 ? $model : $modelName)] = new $path;
        }
    }
}