<?php
require_once '../config.php'; // Importa as configurações do banco

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados.");
}

$sql = "
  SELECT u.nome, u.avatar, SUM(p.pontos) AS total_pontos
  FROM usuarios u
  LEFT JOIN pontuacoes p ON p.usuario_id = u.id
  GROUP BY u.id
  ORDER BY total_pontos DESC
  LIMIT 10
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Ranking - Seven Games</title>
  <style>
    body {
      font-family: sans-serif;
      text-align: center;
      background: #f3f3f3;
      padding: 20px;
    }
    h2 {
      color: #e11d48;
    }
    .ranking {
      max-width: 500px;
      margin: 0 auto;
      background: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .user {
      display: flex;
      align-items: center;
      gap: 12px;
      border-bottom: 1px solid #ddd;
      padding: 10px 0;
    }
    .user img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
    }
    .user .info {
      text-align: left;
    }
  </style>
</head>
<body>

<h2>Seven Ranking 🏆</h2>

<div class="ranking">
  <?php while ($row = $result->fetch_assoc()): ?>
    <div class="user">
      <img src="<?= htmlspecialchars($row['avatar']) ?>" alt="Avatar">
      <div class="info">
        <strong><?= htmlspecialchars($row['nome']) ?></strong><br>
        <small><?= (int)($row['total_pontos'] ?? 0) ?> pts</small>
      </div>
    </div>
  <?php endwhile; ?>
</div>

</body>
</html>