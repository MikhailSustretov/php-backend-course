-- creates table authors (drops if it already created) and insert first value
DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors`
(
    `id`     INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `author` VARCHAR(500) NOT NULL UNIQUE,
    PRIMARY KEY (`id`)
);

INSERT into authors (author)
SELECT DISTINCT author
FROM books;
