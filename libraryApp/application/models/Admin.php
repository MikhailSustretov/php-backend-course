<?php

namespace application\models;

use application\core\Model;

class Admin extends Model
{

    public function adminCheck($adminName, $adminPass)
    {
        $queryValues = ["name" => $adminName, "pass" => $adminPass];
        return $this->db->fetchOneDataSet("SELECT * FROM admins WHERE name=:name AND pass=:pass", $queryValues);
    }

    public function deleteBook($idBook)
    {
        return $this->db->fetchOneDataSet("DELETE FROM books WHERE id=:id", ["id" => $idBook]);
    }

    public function markBookAsDeleted($idBook)
    {
        $this->db->query("UPDATE `books` SET `deleted` = b'1' WHERE `books`.`id` = $idBook");
        $this->db->query("UPDATE `books_authors` SET `deleted` = b'1' WHERE `books_authors`.`id` = $idBook");
        return true;
    }

    public function addBook()
    {
        $queryValues = [
            'book_name' => $_POST["book_name"],
            'publishing_year' => $_POST["publishing_year"],
            'book_description' => $_POST["book_description"],
            'image_name' => $_FILES['book_image']['name'],
        ];

        $successAddingBook = $this->db->query(
            "INSERT INTO books (name, image_name, publication_date, about_book) 
                 VALUES (:book_name, :image_name, :publishing_year, :book_description)", $queryValues);

        if ($successAddingBook) {

            $this->addBookImage();

            $insertBookId = $this->db->getLastInsertId();
            $this->addBookAuthors($insertBookId);

        }
        header("location: http://libraryServer/admin");
    }

    private function addBookImage()
    {
        move_uploaded_file($_FILES['book_image']['tmp_name'],
            'public/images/' . $_FILES['book_image']['name']);
    }

    private function addBookAuthors($insertBookId)
    {
        for ($i = 1; $i <= 3; $i++) {
            if (isset($_POST['author' . $i])) {

                $this->db->query("INSERT INTO authors(author) VALUE (:author)", ["author" => $_POST['author' . $i]]);
                $insertAuthorId = $this->db->getLastInsertId();
                $this->db->query("INSERT INTO books_authors(book_id, author_id) VALUES ($insertBookId, $insertAuthorId)");
            }
        }
    }

}