<?php

return array("driver" => 'mysql',
"host" => 'localhost',
"db_name" => 'library_app_test',
"db_user" => 'root',
"db_pass" => 'n0tail',
"charset" => 'utf8mb4',
"options" => [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);