<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="stylelogin.css">
    <title>Login</title>
</head>
<body>

<!-- Container VLibras -->
<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  
    <div class="login-container">
        <div class="login-box">
            <img src="logo.png" alt="Logo da empresa">
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <div class="textbox">
                    <label for="user">Usuário:</label>
                    <input type="text" id="user" name="usuario" placeholder="Digite seu nome de usuário" required>
                </div>
                <div class="textbox">
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="senha" placeholder="Digite sua senha" required>
                </div>
                <input type="submit" value="Entrar">
            </form>
        </div>
    </div>

    <script>
        const form = document.querySelector("form");
        form.addEventListener("submit", function(event) {
            event.preventDefault(); 
            document.body.classList.add("fade-out");

            setTimeout(() => {
                form.submit(); 
            }, 500); 
        });
    </script>

<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>

</body>
</html>
