<?php
$db_params = array("driver" => 'mysql',
    "host" => 'localhost',
    "db_name" => 'library_app',
    "db_user" => 'root',
    "db_pass" => 'n0tail',
    "charset" => 'utf8mb4',
    "options" => [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);

$pdo = new PDO("{$db_params["driver"]}:host={$db_params["host"]};
        dbname={$db_params["db_name"]}; charset={$db_params["charset"]}", $db_params["db_user"],
    $db_params["db_pass"], $db_params["options"]
);

$deleteRelations=$pdo->prepare("DELETE FROM books_authors WHERE deleted = 1");
$deleteRelations->execute();

$deleteBooks=$pdo->prepare("DELETE FROM books WHERE deleted = 1");
$deleteBooks->execute();