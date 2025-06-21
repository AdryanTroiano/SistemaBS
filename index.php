<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
<<<<<<< HEAD
    <title>Login</title>
    <style>
        /* Reseta o estilo padrão */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #F5F5F5;
            font-family: Arial, sans-serif;
            transition: opacity 0.5s ease-out; /* Transição suave */
        }

        body.fade-out {
            opacity: 0;
        }

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

        .login-box img {
            max-width: 120px;
            margin-bottom: 20px;
        }

        h2 {
            color: #a4161a;
            margin-bottom: 20px;
        }

        .textbox {
            margin-bottom: 20px;
            text-align: left;
        }

        .textbox label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .textbox input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

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

        @media screen and (max-width: 768px) {
            .login-box {
                padding: 30px;
                width: 80%;
            }

            h2 {
                font-size: 24px;
            }

            .textbox input {
                font-size: 14px;
            }

            input[type="submit"] {
                font-size: 14px;
            }
        }

        @media screen and (max-width: 300px) {
            .login-box {
                padding: 20px;
                width: 90%;
            }

            h2 {
                font-size: 20px;
            }

            .textbox input {
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
    <link rel="stylesheet" href="stylelogin.css">
    <title>Login</title>
>>>>>>> a1b59b3af644ad65c8bfcb99c5ed4c911d1ea5dd
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
