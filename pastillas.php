<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

require_once "config.php";

$method = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$input = json_decode(file_get_contents("php://input"), true);

switch ($method) {

    case 'GET':
        if ($id) {
            $stmt = $pdo->prepare("SELECT * FROM pastillas WHERE idUsuario = :id");
            $stmt->execute(["id" => $id]);
            //echo json_encode($stmt->fetch());
            echo json_encode($stmt->fetchAll());
        } else {
            $stmt = $pdo->query("SELECT * FROM pastillas");
            echo json_encode($stmt->fetchAll());
        }
        break;

    case 'POST':
        $stmt = $pdo->prepare("INSERT INTO pastillas (nombre, idUsuario, cantidad, fecha) VALUES (:nombre, :idUsuario, :cantidad, :fecha)");
        $stmt->execute([
            "nombre" => $input["nombre"] ?? "",
            "idUsuario" => $input["idUsuario"] ?? "",
            "cantidad" => $input["cantidad"] ?? "",
            "fecha" => $input["fecha"] ?? ""
        ]);
        echo json_encode(["message" => "Pastilla creada"]);
        break;

    case 'PUT':
        if ($id) {
            $stmt = $pdo->prepare("UPDATE pastillas SET nombre = :nombre, idUsuario = :idUsuario, cantidad = :cantidad, fecha = :fecha WHERE id = :id");
            $stmt->execute([
                "nombre" => $input["nombre"] ?? "",
                "idUsuario" => $input["idUsuario"] ?? "",
                "cantidad" => $input["cantidad"] ?? "",
                "fecha" => $input["fecha"] ?? "",
                "id" => $id
            ]);
            echo json_encode(["message" => "Pastilla actualitzada"]);
        }
        break;

    case 'DELETE':
        if ($id) {
            $stmt = $pdo->prepare("DELETE FROM pastillas WHERE id = :id");
            $stmt->execute(["id" => $id]);
            echo json_encode(["message" => "Pastilla eliminada"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["message" => "Mètode no permès"]);
}
