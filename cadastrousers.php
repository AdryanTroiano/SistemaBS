<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php
  require_once 'auth.php';
  ?>
    
<<<<<<< HEAD
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de funcionários</title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <style>
        /* Reseta o estilo padrão */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Define o fundo da página */
        body {
            background-color: #F5F5F5;
            font-family: Arial, sans-serif;
        }

        /* Estilos do container */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* Estilos do título */
        h2 {
            color: #a4161a;
            margin-bottom: 20px;
        }

        /* Estilos do formulário */
        .textbox {
            margin-bottom: 20px;
            text-align: left;
        }

        .textbox input,
        .textbox select {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        /* Estilo do botão */
        input[type="submit"] {
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

        /* Responsividade para telas pequenas */
        @media screen and (max-width: 768px) {
            .login-box {
                padding: 30px;
                width: 80%;
            }

            h2 {
                font-size: 24px;
            }

            .textbox input,
            .textbox select {
                font-size: 14px;
            }

            input[type="submit"] {
                font-size: 14px;
            }
        }

        /* Responsividade para telas menores que 300px */
        @media screen and (max-width: 300px) {
            .login-box {
                padding: 20px;
                width: 90%;
            }

            h2 {
                font-size: 20px;
            }

            .textbox input,
            .textbox select {
                font-size: 12px;
                padding: 8px;
            }

            input[type="submit"] {
                font-size: 12px;
                padding: 8px;
            }
        }
    </style>
=======
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de funcionários</title>
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="stylecadastrousers.css">
>>>>>>> a1b59b3af644ad65c8bfcb99c5ed4c911d1ea5dd
</head>
<body>
  <!-- Container VLibras -->
  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
<<<<<<< HEAD
    </div>
  </div>

    <div class="login-container">
        <div class="login-box">
            <h2>Cadastro de Usuário</h2>
            <!-- Formulário de cadastro -->
            <form action="processa_cadastro.php" method="POST" id="formCadastro">
                <div class="textbox">
                    <input type="text" name="nome" placeholder="Nome Completo" required>
                </div>
                <div class="textbox">
                    <input type="email" name="email" placeholder="E-mail" required>
                </div>
                <div class="textbox">
                    <input type="password" name="senha" id="senha" placeholder="Senha" required>
                </div>
                <div class="textbox">
                    <input type="password" name="confirmar_senha" id="confirmar_senha" placeholder="Confirmar Senha" required>
                </div>
                <div class="textbox">
                    <label for="nivel" style="font-weight: bold;">Nível de Acesso:</label>
                    <select name="nivel" id="nivel" required>
                        <option value="usuario" selected>Usuário</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <input type="submit" value="Cadastrar">
            </form>
            <p id="erroSenha" style="color: red; display: none;">As senhas não coincidem. Tente novamente.</p>
        </div>
=======
>>>>>>> a1b59b3af644ad65c8bfcb99c5ed4c911d1ea5dd
    </div>
  </div>

  <div class="login-container">
    <div class="login-box">
      <h2>Cadastro de Usuário</h2>
      <!-- Formulário de cadastro -->
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

<<<<<<< HEAD
            // Verifica se as senhas são iguais
            if (senha !== confirmarSenha) {
                event.preventDefault(); // Impede o envio do formulário
                document.getElementById("erroSenha").style.display = "block";
            }
        });
    </script>

<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>

=======
  <script>
    // Validação de senha
    document.getElementById("formCadastro").addEventListener("submit", function(event) {
      var senha = document.getElementById("senha").value;
      var confirmarSenha = document.getElementById("confirmar_senha").value;

      // Verifica se as senhas são iguais
      if (senha !== confirmarSenha) {
        event.preventDefault(); // Impede o envio do formulário
        document.getElementById("erroSenha").style.display = "block";
      }
    });
  </script>

  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
>>>>>>> a1b59b3af644ad65c8bfcb99c5ed4c911d1ea5dd
</body>
</html>
