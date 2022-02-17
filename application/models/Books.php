<?php

namespace application\models;

use application\core\Model;

class Books extends Model
{

    public int $userBooksLimit = 18;
    public int $adminBooksLimit = 4;
    public int $booksCount = 0;

    public function __construct()
    {
        parent::__construct();

        $this->getBooksCount();
    }

    /**
     * Returns one book by id param
     * @param $id - book id
     */
    public function getBookById($id)
    {
        $query = "SELECT *, (SELECT GROUP_CONCAT(authors.author) FROM authors, books_authors 
                    WHERE books_authors.book_id = :id AND authors.id = books_authors.author_id) 
                    AS author FROM books WHERE books.id=:id AND books.deleted=0";

        return $this->db->fetchOneDataSet($query, ["id" => $id]);
    }

    /**
     * Returns an array of books
     */
    public function getBookList($adminRights)
    {
        $limit = $adminRights ? $this->adminBooksLimit : $this->userBooksLimit;
        $offset = $_GET['offset'] ?? 0;

        $query = "SELECT *, (SELECT GROUP_CONCAT(authors.author) FROM authors, books_authors 
                    WHERE books.id = books_authors.book_id AND authors.id = books_authors.author_id) 
                    AS author FROM books WHERE books.deleted=0 LIMIT $limit OFFSET $offset";

        $booksList = $this->db->fetchAllDataSets($query);

        return $booksList;
    }

    private function getBooksCount()
    {
        $this->booksCount = $this->db->fetchOneValue("SELECT count(*) FROM books WHERE books.deleted=0");
    }

    public function getBooksBySearch()
    {
        $search = "%{$_GET["search"]}%";

        $limit = $this->userBooksLimit;

        $offset = $_GET['offset'] ?? 0;

        $searchedBooks = $this->db->fetchAllDataSets("SELECT *, (SELECT GROUP_CONCAT(authors.author) FROM authors, books_authors 
                    WHERE books.id = books_authors.book_id AND authors.id = books_authors.author_id) 
                    AS author FROM books WHERE books.name like :name or books.about_book like :about_book AND books.deleted=0",
            ["name" => $search, "about_book" => $search]);

        $this->booksCount = count($searchedBooks);

        return array_slice($searchedBooks, $offset, $limit);
    }
}

