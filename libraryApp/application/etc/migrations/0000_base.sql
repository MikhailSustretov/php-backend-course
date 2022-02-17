-- creates table books (drops if it already created) and insert first value
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books`
(
    `id`                      INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`                    VARCHAR(500) NULL DEFAULT NULL,
    `author`                  VARCHAR(500) NULL DEFAULT NULL,
    `image_name`              VARCHAR(500) NULL DEFAULT NULL,
    `pages_count`             INT UNSIGNED NOT NULL DEFAULT '0',
    `publication_date`        INT UNSIGNED NOT NULL DEFAULT '0',
    `about_book`              VARCHAR(500) NULL DEFAULT NULL,
    `isbn`                    TINYINT(11) UNSIGNED NOT NULL DEFAULT '0',
    `book_webpage_visits`     INT UNSIGNED NOT NULL DEFAULT '0',
    `number_of_button_clicks` INT UNSIGNED NOT NULL DEFAULT '0',
    `deleted`                 BIT(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT into `books` (name, author, image_name, pages_count, publication_date, about_book)
values ('СИ++ И КОМПЬЮТЕРНАЯ ГРАФИКА', 'Андрей Богуславский', 'C++_AND_COMPUTER_GRAPHICS.jpg', 351, 2003,
        'Лекции и практикум по программированию на Си++');

-- creates table admins (drops if it already created) and insert first value
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`
(
    `id`    INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `login` VARCHAR(500) NULL DEFAULT NULL,
    `pass`  VARCHAR(500) NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT into `admins` (login, pass) value ('admin', 'admin');

-- creates table migrations (drops if it already created)
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`
(
    `id`      INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`    varchar(255) not null,
    `created` timestamp default current_timestamp,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;



