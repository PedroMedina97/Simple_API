<?php
header('Content-Type: application/json');
require_once("../config/db.php");
require_once("../models/Product.php");

$user = new User();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["action"])
{
    case "getAll":
        $data = $user->getAll();
        echo json_encode($data);
    break;

    case "getById":
        $data = $user->getById($body['id']);
        echo json_encode($data);
    break;

    case "create":
        $data = $user->create($body['cat_id'], $body['nombre'], $body['descripcion'], $body['precio'], $body['stock']);
        echo json_encode("Create Correct");
    break;

    case "update":
        $data = $user->update($body['id'], $body['nombre']);
        echo json_encode("Update Correct");
    break;

    case "delete":
        $data = $user->delete($body['id']);
        echo json_encode("Delete Correct");
    break;
}
