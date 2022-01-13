<?php
require 'db.php';

/**
 * Here two database tables are created: table 'users' (all users are registered in web to_do app)
 * and table 'tasks' (all users tasks).
 */

$tableName = "users";
$params = ["id" => "int(11) AUTO_INCREMENT primary key", "login" => "varchar(100)", "pass" => "varchar(100)"];
createTable($tableName, $params);

$tableName = "tasks";
$params = ["id" => "int(11) AUTO_INCREMENT primary key", "text" => "varchar(500)", "checked" => "bit(1) DEFAULT 0",
    "user_id"=>"int(11) REFERENCES users(id)"];

createTable($tableName, $params);