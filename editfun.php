<?php
require_once 'auth.php';

if (!isset($_GET['id'])) {
    die("Erro: ID do usuário não fornecido.");
}

$id = (int) $_GET['id'];

try {
    $pdo = new PDO("mysql:host=localhost;dbname=cadastro;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("Usuário não encontrado.");
    }
} catch (PDOException $e) {
    die("Erro no banco: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Editar Usuário</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #F5F5F5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      transition: opacity 0.5s ease-out;
    }

    body.fade-out {
      opacity: 0;
    }

    .container {
      max-width: 400px;
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      color: #a4161a;
      margin-bottom: 20px;
      text-align: center;
    }

    label {
      font-weight: bold;
      display: block;
      margin-top: 15px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }

    input[type="submit"] {
      margin-top: 25px;
      width: 100%;
      padding: 10px;
      background-color: #a4161a;
      border: none;
      color: white;
      font-size: 16px;
      cursor: pointer;
      border-radius: 4px;
    }

    input[type="submit"]:hover {
      background-color: #8c1414;
    }

    #erroSenha {
      color: red;
      display: none;
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>

<!-- Container VLibras -->
<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>

  <div class="container">
    <h2>Editar Usuário</h2>
    <form action="processa_edicao.php" method="POST" id="formEdicao">
      <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>" />

      <label for="nome">Nome Completo</label>
      <input type="text" id="nome" name="nome" required value="<?= htmlspecialchars($user['usuario']) ?>" />

      <label for="email">E-mail</label>
      <input type="email" id="email" name="email" required value="<?= htmlspecialchars($user['email']) ?>" />

      <label for="senha">Nova Senha (deixe em branco para não alterar)</label>
      <input type="password" id="senha" name="senha" />

      <label for="confirmar_senha">Confirmar Senha</label>
      <input type="password" id="confirmar_senha" name="confirmar_senha" />

      <input type="submit" value="Salvar Alterações" />
    </form>

    <p id="erroSenha">As senhas não coincidem. Tente novamente.</p>
  </div>

  <script>
    const form = document.getElementById("formEdicao");

    form.addEventListener("submit", function(event) {
      const senha = document.getElementById("senha").value;
      const confirmarSenha = document.getElementById("confirmar_senha").value;
      const erro = document.getElementById("erroSenha");

      // Verifica senha
      if (senha || confirmarSenha) {
        if (senha !== confirmarSenha) {
          event.preventDefault();
          erro.style.display = "block";
          return;
        }
      }

      // Se tudo certo, aplica transição antes de enviar
      event.preventDefault();
      document.body.classList.add("fade-out");

      setTimeout(() => {
        form.submit();
      }, 500); // Tempo da animação
    });
  </script>

<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
  
</body>
</html>
