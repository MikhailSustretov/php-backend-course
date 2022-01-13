<?php

require 'connect.php';


/**
 * Request to select row(s) from a table
 *
 * @param $table - table with data
 * @param array $params - Parameters by which information will be selected from the array. None by default
 * @return array|false returns array if query was successfully worked
 */
function selectValues($valueName, $table, array $params = []): bool|array
{
    global $pdo;

    if (!is_array($valueName)) {
        $select = "SELECT $valueName FROM $table";
    } else {
        $value = current($valueName);
        $select = "SELECT `$value`";
        while (($value = next($valueName)) != false) {
            $select .= ", `$value`";
        }
        $select .= " FROM `$table`";
    }

    if (!empty($params)) {
        $select = createWherePart($select, $params);
    }

    $query = $pdo->prepare($select);
    $query->execute();

    if (!is_array($valueName)) {
        return $query->fetch();
    }
    return $query->fetchAll();
}

/**
 * It creates a "where" condition for any sql query.
 *
 * @param string $query - SQL query that needs a "where" part
 * @param array $params - params for "where" part
 * @return string - sql query with "where" part
 *
 */
function createWherePart(string $query, array $params): string
{
    $key = key($params);
    $value = current($params);
    if (!is_numeric($value)) {
        $value = "'" . $value . "'";
    }
    $query .= " WHERE `$key`=$value";

    while (($value = next($params)) != false) {
        if (!is_numeric($value)) {
            $value = "'" . $value . "'";
        }
        $key = key($params);
        $query .= " AND $key=$value";
    }

    return $query;
}

/**
 * Request to insert row(s) in a table
 *
 * @param $table - table with data
 * @param array $params - an array with "column - value" elements to be inserted into the table
 * @return bool returns true if function was working successfully or false in another way
 */
function insert($table, array $params): bool
{
    global $pdo;

    $colNames = "";
    $colValues = "";

    $colNames .= key($params)."";
    $colValues .= "'" . current($params) . "'";

    while ($value = next($params)) {
        $colValues .= ", '" . $value . "'";
        $key = key($params);
        $colNames .= ", $key";
    }
    $insert = "INSERT into `$table`($colNames) VALUES ($colValues)";

    $query = $pdo->prepare($insert);

    return ($query->execute());
}

/**
 * Request to update row(s) in a table
 *
 * @param $table - table with data
 * @param $columns - an array with "column name - new column value" elements that will be updated
 * @param array $params - Parameters by which information will be updated in the array. None by default
 * @return bool|array returns array if function was working successfully or false in another way
 */
function update($table, array $columns, array $params): bool|array
{
    global $pdo;

    $update = "UPDATE $table SET";

    $oldColumn = key($columns);
    $newColumn = current($columns);
    $update .= " $oldColumn='$newColumn'";
    while (($newColumn = next($columns)) != false) {
        $oldColumn = key($columns);
        $update .= ", $oldColumn='$newColumn'";
    }
    $update = createWherePart($update, $params);

    $query = $pdo->prepare($update);
    $query->execute();

    return $query->fetchAll();
}

/**
 * Request to delete row(s) in a table
 *
 * @param $table - table with data
 * @param $params - Parameters by which information will be updated in the array. None by default
 * @return bool|array
 */
function delete($table, $params): bool|array
{
    global $pdo;

    $update = "DELETE FROM $table";

    $update = createWherePart($update, $params);

    $query = $pdo->prepare($update);
    $query->execute();

    return $query->fetchAll();
}

/**
 * It creates new table in database
 *
 * @param $tableName - new table name
 * @param $params - array with "column name - column type" elements
 */
function createTable($tableName, $params)
{
    global $pdo;

    $create = "CREATE TABLE $tableName (";

    $colName = key($params);
    $colType = current($params);
    $create .= "$colName $colType";

    while (($colType = next($params)) != false) {
        $colName = key($params);
        $create .= ", $colName $colType";
    }
    $create .= ")";

    $query = $pdo->prepare($create);
    $query->execute();
}