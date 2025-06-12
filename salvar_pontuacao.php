<?php
require_once '../config.php'; // Importa as configurações do banco

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Erro de conexão com o banco de dados."]));
}

$data = json_decode(file_get_contents("php://input"), true);

$google_uid = $conn->real_escape_string($data['google_id']);
$jogo = $conn->real_escape_string($data['jogo']);
$pontos = (int)$data['pontos'];

// Verifica usuário
$res = $conn->query("SELECT id FROM usuarios WHERE google_id = '$google_uid'");
if ($res->num_rows === 0) {
  http_response_code(404);
  echo "Usuário não encontrado";
  exit;
}
$usuario_id = $res->fetch_assoc()['id'];

// Atualiza pontuação (só se for maior)
$conn->query("INSERT INTO pontuacoes (usuario_id, jogo, pontos)
              VALUES ($usuario_id, '$jogo', $pontos)
              ON DUPLICATE KEY UPDATE pontos = GREATEST(pontos, $pontos)");

echo "Pontuação salva com sucesso!";
