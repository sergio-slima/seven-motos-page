<?php
// Conexão com o banco
require_once '../config.php'; // Importa as configurações do banco

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Erro de conexão com o banco de dados."]));
}

$data = json_decode(file_get_contents("php://input"), true);

$google_id = $conn->real_escape_string($data['google_id']);
$nome = $conn->real_escape_string($data['nome']);
$email = $conn->real_escape_string($data['email']);
$avatar = $conn->real_escape_string($data['avatar']);

// Verifica se usuário já existe
$check = $conn->query("SELECT id FROM usuarios WHERE google_id = '$google_id'");
if ($check->num_rows === 0) {
    $conn->query("INSERT INTO usuarios (google_id, nome, email, avatar) VALUES ('$google_id', '$nome', '$email', '$avatar')");
}

$conn->close();
?>
