<?php
session_start();
require 'database/db.php';

/**
 * This file is router to working to database "to-do app".
 */


/**
 * This function takes a username and password from the user and tries to find them in the user table.
 * If found, it sets the cookie "login"-user_login, sets the session element "user_id"-user_id
 * and sends the json file [ok=>true] to the client. If not, it sends an error.
 */
function login()
{
    header('Access-Control-Allow-Headers: Content-Type');
    header('Content-Type: application/json');
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');


    $data = json_decode(file_get_contents("php://input"));

    if (($id_pass = selectValues(["id", "pass"], "users", ['login' => $data->login])) !== false) {
        if (password_verify($data->pass, current($id_pass)["pass"])) {

            setcookie('login', $data->login, ['SameSite' => 'None', 'Secure' => true]);
            $_SESSION['user_id'] = current($id_pass)["id"];
            echo json_encode(["ok" => true, "id" => current($id_pass)["id"]]);
        }
    } else {
        echo json_encode(["error" => "No user with the same username and password was found. Please check the entered data."]);
    }
}

/**
 * This function takes a username and password from the user and tries to find login in the user table.
 * If it not founds, adds new user with this login and pass to table and sends the json file [ok=>true] to the client.
 * If it finds, sends the error.
 */
function register()
{
    header('Access-Control-Allow-Headers: Content-Type');
    header('Content-Type: application/json');
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");


    $data = json_decode(file_get_contents("php://input"));

    if (isset($data)) {
        if (selectValues("id", "users", ['login' => $data->login]) === false) {
            insert('users', ['login' => $data->login, 'pass' => password_hash($data->pass, PASSWORD_DEFAULT)]);

            echo json_encode(["ok" => true]);

        } else {
            echo json_encode(["error" => "A user with this login already exists. Please, come up with a different username "]);
        }
    }
}

/**
 * This function destroy session for this user and sends the json file [ok=>true]
 */
function logout()
{
    header('Access-Control-Allow-Headers: Content-Type');
    header('Content-Type: application/json');
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');

    session_destroy();
    echo(json_encode(["ok" => true]));
}

/**
 * This function try to select all tasks from user with him user_id in array $_SESSION.
 * If it works okay, sends to the client json { items: [ { id: 22, text: "...", checked: true } , ... ] }.
 * Else sends to the client error
 */
function getItems()
{
    header('Access-Control-Allow-Headers: Content-Type');
    header('Content-Type: application/json');
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');

    if (($values = selectValues(["id", "text", "checked"], "tasks", ["user_id" => $_SESSION['user_id']])) !== false) {

        for ($i = 0; $i < count($values); $i++) {
            $values[$i]["checked"] = !($values[$i]["checked"] == 0);
        }

        echo json_encode(["items" => $values]);
    } else {
        http_response_code(400);
        echo json_encode(["error" => "Bad Request"]);
    }
}

/**
 * This function takes json { text: "task text example" } and tries to add it to table.
 * If it works okay, sends to the client json { id: "new task id example" }.
 * Else it sends error.
 */
function addItem()
{
    header('Access-Control-Allow-Headers: Content-Type');
    header('Content-Type: application/json');
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Accept: application/json');

    $data = json_decode(file_get_contents("php://input"));

    if (isset($data->text)) {
        if (!insert('tasks', ['text' => $data->text, 'user_id' => $_SESSION['user_id']])) {
            http_response_code(500);
            echo json_encode(["error" => "Failed to complete the request. Perhaps the required table is missing 
        or a user with such an ID is missing. "]);
        } else {

            $id = selectValues("id", "tasks", ['text' => $data->text, 'user_id' => $_SESSION['user_id']]);

            echo json_encode(["id" => current($id)]);
        }
    }
}

/**
 * This function takes json { id: 22 } from client and tries to delete it.
 * If it worked okay, sends json { ok : true }.
 * Else sends error
 */
function deleteItem()
{
    header('Access-Control-Allow-Headers: Content-Type');
    header('Content-Type: application/json');
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Accept: application/json');
    header('Access-Control-Allow-Methods: DELETE');

    $data = json_decode(file_get_contents("php://input"));

    if (delete("tasks", ["id" => $data->id]) !== false) {
        echo(json_encode(["ok" => true]));

    } else {
        http_response_code(500);
        echo json_encode(["error" => "Failed to complete the request. Perhaps the required table is missing 
        or a user with such an ID is missing. "]);
    }
}

/**
 * This function takes json { id: 22, text: "...", checked: true } from client and tries to change it.
 * If it worked okay, sends json { ok : true }.
 * Else sends error
 */
function changeItem()
{
    header('Access-Control-Allow-Headers: Content-Type');
    header('Content-Type: application/json');
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Accept: application/json');
    header('Access-Control-Allow-Methods: PUT');

    $data = json_decode(file_get_contents("php://input"));

    if (update("tasks", ['text' => $data->text, 'checked' => $data->checked], ['id' => $data->id]) !== false) {
        echo(json_encode(["ok" => true]));

    } else {
        http_response_code(500);
        echo json_encode(["error" => "Failed to complete the request. Perhaps the required table is missing 
        or a user with such an ID is missing. "]);
    }
}

/**
 * Here it is router logic. It checks array 'action' parameter $_GET
 * and calls function that has same name like this parameter
 */
$action = $_GET["action"];
switch ($action) {
    case "login":
    {
        login();
        break;
    }
    case "register":
    {
        register();
        break;
    }
    case "getItems":
    {
        getItems();
        break;
    }
    case "addItem":
    {
        addItem();
        break;
    }
    case "deleteItem":
    {
        deleteItem();
        break;
    }
    case "changeItem":
    {
        changeItem();
        break;
    }
    case "logout":
    {
        logout();
        break;
    }
}
