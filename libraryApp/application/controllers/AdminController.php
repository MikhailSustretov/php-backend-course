<?php

namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);

        $this->loadModel('Admin');
        $this->view->header = 'adminHeader';
        $this->view->footer = 'adminFooter';

        $this->authentication();
    }

    private function authentication()
    {

        if (isset($_SERVER['PHP_AUTH_USER'])) {
            if ($this->models['Admin']->adminCheck($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])) {

                $this->loadModel("Books");

            } else {
                header('WWW-Authenticate: Basic realm="Backend"');
                header('HTTP/1.0 401 Unauthorized');
                echo 'Authenticate required!';
            }

        } else {
            header('WWW-Authenticate: Basic realm="Backend"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Authenticate required!';
        }
    }

    public function actionHomePage()
    {
        $booksList = $this->models['Books']->getBookList(true);

        $this->view->render([
            'booksList' => $booksList,
            'offset' => $_GET["offset"] ?? 0,
            'limit' => $this->models['Books']->adminBooksLimit,
            'booksCount' => $this->models['Books']->booksCount
        ]);

        return true;
    }

    public function actionDeleteBook()
    {

        $data = json_decode(file_get_contents('php://input'));

        $this->models['Admin']->markBookAsDeleted((int)$data->id);

        echo json_encode(["ok" => true]);

        return true;
    }

    public function actionAddBook()
    {
        $this->models['Admin']->addBook();
    }
}
