<?php
// Conexão com o banco
require_once '../config.php'; // Importa as configurações do banco

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados.");
}

// Dados recebidos via GET
$google_uid = $_GET['uid'] ?? '';
$nome = $_GET['nome'] ?? '';
$email = $_GET['email'] ?? '';
$avatar = $_GET['avatar'] ?? '';

// Verifica se o usuário existe
$stmt = $conn->prepare("SELECT id, nome, avatar FROM usuarios WHERE google_id = ?");
$stmt->bind_param("s", $google_uid);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Usuário novo → cadastrar
    $stmtInsert = $conn->prepare("INSERT INTO usuarios (google_id, nome, email, avatar, criado_em) VALUES (?, ?, ?, ?, NOW())");
    $stmtInsert->bind_param("ssss", $google_uid, $nome, $email, $avatar);
    $stmtInsert->execute();

    $usuario_id = $stmtInsert->insert_id;
} else {
    // Usuário já existe → carregar dados
    $usuario = $result->fetch_assoc();
    $usuario_id = $usuario['id'];
    $nome = $usuario['nome'];
    $avatar = $usuario['avatar'];
}

// Busca pontuação total
$ptsResult = $conn->query("SELECT SUM(pontos) AS total FROM pontuacoes WHERE usuario_id = $usuario_id");
$pontuacao = $ptsResult->fetch_assoc()['total'] ?? 0;

// Lista de jogos disponíveis
$jogos = [
    ['id' => 1, 'nome' => 'Corrida Maluca'],
    ['id' => 2, 'nome' => 'Quiz Seven'],
    ['id' => 3, 'nome' => 'Desafio da Memória']
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Seven Games - Perfil</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f7f7f7;
      text-align: center;
      padding: 40px;
    }

    .perfil {
      margin-bottom: 30px;
    }

    .perfil img {
      width: 100px;
      border-radius: 50%;
    }

    .perfil h2 {
      margin: 10px 0 5px;
    }

    .perfil p {
      font-size: 1.2rem;
      color: #444;
    }

    .jogos {
      max-width: 500px;
      margin: 0 auto;
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    .jogos h3 {
      margin-bottom: 20px;
    }

    .jogo {
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ddd;
      border-radius: 8px;
    }

    .jogo a {
      display: inline-block;
      margin-top: 8px;
      background: #e11d48;
      color: white;
      padding: 8px 16px;
      text-decoration: none;
      border-radius: 6px;
    }
    @media (max-width: 600px) {
      .jogos {
        width: 100%;
        padding: 10px;
      }
      .perfil img {
        width: 80px;
      }
      .jogo a {
        font-size: 14px;
        padding: 6px 12px;
      }
    }
  </style>
</head>
<body>

  <div class="perfil">
    <img src="<?= $avatar ?>" alt="Avatar do usuário">
    <h2><?= htmlspecialchars($nome) ?></h2>
    <p>Total de pontos: <strong><?= (int)$pontuacao ?> pts</strong></p>
  </div>

  <div class="jogos">
    <h3>Jogos disponíveis</h3>
    <?php foreach ($jogos as $jogo): ?>
      <div class="jogo">
        <strong><?= htmlspecialchars($jogo['nome']) ?></strong>
        <br>
        <a href="jogar.php?uid=<?= urlencode($google_uid) ?>&jogo_id=<?= $jogo['id'] ?>">Jogar</a>
      </div>
    <?php endforeach; ?>
  </div>

</body>
</html>
