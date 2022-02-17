-- creating a books_authors table to create a many-to-many relationship between books and authors
DROP TABLE IF EXISTS `books_authors`;
CREATE TABLE `books_authors`
(
    `id`        INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `book_id`   INT UNSIGNED,
    `author_id` INT UNSIGNED,
    PRIMARY KEY (`id`)
);

--
INSERT INTO books_authors (book_id, author_id)
SELECT DISTINCT books.id, authors.id
FROM books
         JOIN authors
WHERE books.author = authors.author;

ALTER TABLE books_authors
    ADD FOREIGN KEY (book_id) REFERENCES books (id) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE books_authors
    ADD FOREIGN KEY (author_id) REFERENCES authors (id) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE books DROP author;

# FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE RESTRICT ON UPDATE RESTRICT,
# FOREIGN KEY (author_id) REFERENCES authors(id) ON DELETE RESTRICT ON UPDATE RESTRICT