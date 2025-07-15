<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php require_once 'auth.php'; ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de funcionários</title>
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="stylecadastrousers.css">
</head>
<body>
  <!-- Plugin VLibras -->
  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>

  <!-- Formulário de Cadastro -->
  <div class="login-container">
    <div class="login-box">
      <h2>Cadastro de Usuário</h2>
      <form action="processa_cadastro.php" method="POST" id="formCadastro">
        <div class="textbox">
          <label for="nome">Nome Completo:</label>
          <input type="text" name="nome" id="nome" placeholder="Nome Completo" required>
        </div>
        <div class="textbox">
          <label for="email">E-mail:</label>
          <input type="email" name="email" id="email" placeholder="E-mail" required>
        </div>
        <div class="textbox">
          <label for="senha">Senha:</label>
          <input type="password" name="senha" id="senha" placeholder="Senha" required>
        </div>
        <div class="textbox">
          <label for="confirmar_senha">Confirmar Senha:</label>
          <input type="password" name="confirmar_senha" id="confirmar_senha" placeholder="Confirmar Senha" required>
        </div>
        <div class="textbox">
          <label for="nivel">Nível de Acesso:</label>
          <select name="nivel" id="nivel" required>
            <option value="usuario" selected>Usuário</option>
            <option value="admin">Admin</option>
          </select>
        </div>
        <input type="submit" value="Cadastrar">
      </form>
      <p id="erroSenha" style="color: red; display: none;">As senhas não coincidem. Tente novamente.</p>
    </div>
  </div>

  <!-- Validação de senha -->
  <script>
    document.getElementById("formCadastro").addEventListener("submit", function(event) {
      var senha = document.getElementById("senha").value;
      var confirmarSenha = document.getElementById("confirmar_senha").value;
      if (senha !== confirmarSenha) {
        event.preventDefault(); // Impede envio
        document.getElementById("erroSenha").style.display = "block";
      }
    });
  </script>

  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
</body>
</html>
