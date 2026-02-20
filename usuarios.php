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
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE codigo = :id");
            $stmt->execute(["id" => $id]);
            echo json_encode($stmt->fetch());
        } else {
            $stmt = $pdo->query("SELECT * FROM usuarios");
            echo json_encode($stmt->fetchAll());
        }
        break;

    case 'POST':
        $stmt = $pdo->prepare("INSERT INTO usuaris (nom, email) VALUES (:nom, :email)");
        $stmt->execute([
            "nom" => $input["nom"] ?? "",
            "email" => $input["email"] ?? ""
        ]);
        echo json_encode(["message" => "Usuari creat"]);
        break;

    case 'PUT':
        if ($id) {
            $stmt = $pdo->prepare("UPDATE usuaris SET nom = :nom, email = :email WHERE id = :id");
            $stmt->execute([
                "nom" => $input["nom"] ?? "",
                "email" => $input["email"] ?? "",
                "id" => $id
            ]);
            echo json_encode(["message" => "Usuari actualitzat"]);
        }
        break;

    case 'DELETE':
        if ($id) {
            $stmt = $pdo->prepare("DELETE FROM usuaris WHERE id = :id");
            $stmt->execute(["id" => $id]);
            echo json_encode(["message" => "Usuari eliminat"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["message" => "Mètode no permès"]);
}
