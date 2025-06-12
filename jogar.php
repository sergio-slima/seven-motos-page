<?php
$google_uid = $_GET['uid'] ?? '';
$jogo_id = $_GET['jogo_id'] ?? 1;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Quiz Seven</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f9fafb;
      padding: 40px;
      max-width: 700px;
      margin: auto;
      text-align: center;
    }

    .pergunta {
      margin-bottom: 30px;
      padding: 20px;
      border-radius: 12px;
      background: white;
      box-shadow: 0 0 8px rgba(0,0,0,0.05);
    }

    button {
      margin-top: 10px;
      padding: 10px 20px;
      background: #2563eb;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }

    .final {
      margin-top: 30px;
    }

    .resposta {
      display: block;
      margin: 10px 0;
      padding: 10px;
      background: #e5e7eb;
      border-radius: 6px;
      cursor: pointer;
    }

    .resposta.selecionada {
      background-color: #c7d2fe;
    }
  </style>
</head>
<body>

  <h2>Quiz Seven - Conhecimentos Gerais</h2>

  <div id="quiz"></div>

  <div class="final" id="resultado"></div>

  <script>
    const googleUid = "<?= $google_uid ?>";
    const jogoId = <?= (int)$jogo_id ?>;

    const perguntas = [
      {
        pergunta: "Qual a capital do Brasil?",
        opcoes: ["Rio de Janeiro", "Brasília", "São Paulo", "Salvador"],
        correta: 1
      },
      {
        pergunta: "Qual é o resultado de 9 + 10?",
        opcoes: ["18", "19", "21", "20"],
        correta: 1
      },
      {
        pergunta: "Quem descobriu o Brasil?",
        opcoes: ["Cristóvão Colombo", "Pedro Álvares Cabral", "Vasco da Gama", "Dom Pedro I"],
        correta: 1
      }
    ];

    let respostas = Array(perguntas.length).fill(null);

    const quizDiv = document.getElementById("quiz");
    const resultadoDiv = document.getElementById("resultado");

    function renderQuiz() {
      quizDiv.innerHTML = "";
      perguntas.forEach((q, index) => {
        const div = document.createElement("div");
        div.className = "pergunta";
        div.innerHTML = `<h3>${q.pergunta}</h3>`;

        q.opcoes.forEach((op, i) => {
          const opt = document.createElement("div");
          opt.className = "resposta";
          opt.textContent = op;
          if (respostas[index] === i) opt.classList.add("selecionada");

          opt.onclick = () => {
            respostas[index] = i;
            renderQuiz(); // Re-render para atualizar seleção
          };

          div.appendChild(opt);
        });

        quizDiv.appendChild(div);
      });

      const botaoFinalizar = document.createElement("button");
      botaoFinalizar.textContent = "Finalizar Quiz";
      botaoFinalizar.onclick = finalizarQuiz;
      quizDiv.appendChild(botaoFinalizar);
    }

    function finalizarQuiz() {
      let pontos = 0;
      respostas.forEach((resposta, i) => {
        if (resposta === perguntas[i].correta) pontos += 1;
      });

      resultadoDiv.innerHTML = `<h3>Você fez ${pontos} de ${perguntas.length} pontos!</h3>`;

      // Enviar para o servidor
      fetch("salvar_pontuacao.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          google_id: googleUid,
          jogo: "quiz_seven",
          pontos: pontos
        })
      })
      .then(res => res.text())
      .then(txt => resultadoDiv.innerHTML += `<p>${txt}</p>`)
      .catch(err => resultadoDiv.innerHTML += `<p>Erro ao salvar pontuação.</p>`);
    }

    renderQuiz();
  </script>
</body>
</html>
