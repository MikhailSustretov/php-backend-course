<?php

/**
 * This is where you connect to the 'to_do_app' database
 */

$driver = 'mysql';
$host = 'localhost';
$db_name = 'to_do_app';
$db_user = 'root';
$db_pass = 'n0tail';
$charset = 'utf8mb4';
$options = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC];

try{
    $pdo = new PDO(
        "$driver:host=$host;dbname=$db_name;charset=$charset",
        $db_user, $db_pass, $options
    );
}catch (PDOException $exc){
    die("Error connect to database");
}