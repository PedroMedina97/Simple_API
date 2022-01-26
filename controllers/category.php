<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../config/db.php");
require_once("../models/Category.php");

$category = new Category();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["action"])
{
    case "getAll":
        $data = $category->getAll();
        echo json_encode($data);
    break;

    case "getById":
        $data = $category->getById($body['id']);
        echo json_encode($data);
    break;

    case "create":
        $data = $category->create($body['nombre']);
        echo json_encode(1);
    break;

    case "update":
        $data = $category->update($body['id'], $body['nombre']);
        echo json_encode("Update Correct");
    break;

    case "delete":
        $data = $category->delete($body['id']);
        echo json_encode("Delete Correct");
    break;
}
