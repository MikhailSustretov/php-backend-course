<?php
$db_params = require_once '../../../../application/config/db_params.php';

exec("D:\WNMP\mysql\bin\mysqldump -u{$db_params['db_user']} -p{$db_params['db_pass']} {$db_params['db_name']} > backups/" . date('d.m.Y') . ".sql");
