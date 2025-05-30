<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <title>Login</title>
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
        }

        .textbox input {
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

            .textbox input {
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
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <div class="textbox">
                    <input type="text" name="usuario" placeholder="Usuário" required>
                </div>
                <div class="textbox">
                    <input type="password" name="senha" placeholder="Senha" required>
                </div>
                <input type="submit" value="Entrar">
            </form>
        </div>
    </div>
</body>
</html>
