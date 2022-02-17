<?php

const DB_TABLE_VERSIONS = 'migrations';

$db_params = require_once '../../../application/config/db_params.php';

// gets migration files list
function getMigrationFiles(PDO $pdo, $db_name)
{
    // finding migration folder
    $sqlFolder = str_replace('\\', '/', realpath(dirname(__FILE__)) . '/');

    // get list with sql files
    $allFiles = glob($sqlFolder . '*.sql');

    // Checking if the 'migrations' table exists
    // If it exists database isn't empty
    $query = sprintf('show tables from `%s` like "%s"', $db_name, DB_TABLE_VERSIONS);

    $data = $pdo->prepare($query);

    $data->execute();
    $firstMigration = !$data->rowCount();

    // If it is first migration then return all files
    if ($firstMigration) {
        return $allFiles;
    }

    // Looking for existing migrations
    $versionsFiles = array();
    // Takes from 'migrations' table all files name
    $query = sprintf('select `name` from `%s`', DB_TABLE_VERSIONS);
    $data = $pdo->prepare($query);
    $data->execute();
    $doneMigrations = $data->fetchAll();

    // Forming array versionsFiles with full file path
    foreach ($doneMigrations as $row) {
        array_push($versionsFiles, $sqlFolder . $row['name']);
    }

    // Files returned, not yet in table versions
    return array_diff($allFiles, $versionsFiles);
}

// Makes file migration
function migrate(PDO $pdo, $file, $db_params)
{
    // We form a command for executing a mysql query from outside the file
    $command = sprintf('mysql -u%s -p%s -h %s -D %s < %s', $db_params['db_user'], $db_params['db_pass'],
        $db_params['host'], $db_params['db_name'], $file);

    // Makes shell-script
    shell_exec($command);

    //get and make query migration
    $query = $pdo->prepare(file_get_contents($file));
    $query->execute();

    // Takes file name without its path
    $baseName = basename($file);
    // Forming a query to add a migration to the versions table
    $query = sprintf('insert into `%s` (`name`) values("%s")', DB_TABLE_VERSIONS, $baseName);
    // Execute the request
    $sql = $pdo->prepare($query);
    $sql->execute();
    $sql->fetch();
}

// Start
// Connecting to database
$pdo = new PDO("{$db_params["driver"]}:host={$db_params["host"]};
        dbname={$db_params["db_name"]}; charset={$db_params["charset"]}", $db_params["db_user"],
    $db_params["db_pass"], $db_params["options"]);

// We get a list of files for migrations, except those that are already in the versions table
$files = getMigrationFiles($pdo, $db_params["db_name"]);


// Checking if there are new migrations
if (empty($files)) {
    echo 'Your database is up to date.';
} else {
    echo 'Starts migration...<br><br>';

    // We start the migration for each file
    foreach ($files as $file) {
        migrate($pdo, $file, $db_params);
        // Display the name of the completed file
        echo basename($file) . '<br>';
    }

    echo '<br>Migration completed.';
}