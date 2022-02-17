<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;

class UserPagesController extends Controller
{

    public function __construct($route)
    {
        parent::__construct($route);

        $this->loadModel('Books');
    }

    public function actionHomePage()
    {
        $booksList = $this->models['Books']->getBookList(false);

        $this->view->renderWithPagination([
            'booksList' => $booksList,
            'offset' => $_GET["offset"] ?? 0,
            'limit' => $this->models['Books']->userBooksLimit,
            'booksCount' => $this->models['Books']->booksCount
        ]);

        return true;
    }

    public function actionOneBook($book_id)
    {
        $oneBook = $this->models['Books']->getBookById($book_id);
        if ($oneBook) {
            $this->view->render(['oneBook' => $oneBook]);
        } else {
            View::errorCode(404);
        }

        return true;
    }

    public function actionSearchBooks()
    {
        $booksList = $this->models['Books']->getBooksBySearch();

        $this->view->path = "UserPages/HomePage";
        $this->view->pagination = "searchPagination";

        $this->view->renderWithPagination([
            'booksList' => $booksList,
            'offset' => $_GET['offset'] ?? 0,
            'limit' => $this->models['Books']->userBooksLimit,
            'booksCount' => $this->models['Books']->booksCount
        ]);

        return true;
    }
}
