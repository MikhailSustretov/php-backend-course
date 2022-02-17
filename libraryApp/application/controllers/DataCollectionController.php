<?php

namespace application\controllers;

use application\core\Controller;

class DataCollectionController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);

        $this->loadModel("DataCollection");
    }

    public function actionIncreaseClickCount()
    {

        $data = json_decode(file_get_contents('php://input'));

        $this->models['DataCollection']->increaseCounter((int)$data->bookId, "number_of_button_clicks");

        echo json_encode(["ok" => true]);
        return true;
    }

    public function actionIncreasePageViewsCount()
    {

        $data = json_decode(file_get_contents('php://input'));

        $this->models['DataCollection']->increaseCounter((int)$data->bookId, "book_webpage_visits");

        echo json_encode(["ok" => true]);
        return true;
    }
}
