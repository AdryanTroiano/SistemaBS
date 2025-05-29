<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $confirmarSenha = $_POST['confirmar_senha'] ?? '';
    $nivel = $_POST['nivel'] ?? '';

    // Validação básica do nível (pode ser 'usuario' ou 'admin')
    $niveis_validos = ['usuario', 'admin'];

    if ($nome && $email && $senha && $confirmarSenha && $nivel) {
        if (!in_array($nivel, $niveis_validos)) {
            echo "<script>alert('Nível de acesso inválido!'); window.history.back();</script>";
            exit;
        }

        if ($senha !== $confirmarSenha) {
            echo "<script>alert('As senhas não coincidem!'); window.history.back();</script>";
            exit;
        }

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=cadastro;charset=utf8", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Verifica se o e-mail já existe
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
            $stmt->execute([$email]);

            if ($stmt->rowCount() > 0) {
                echo "<script>alert('E-mail já cadastrado!'); window.history.back();</script>";
                exit;
            }

            // Criptografa a senha
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            // Insere no banco incluindo o campo nível
            $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, email, senha, nivel) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nome, $email, $senhaHash, $nivel]);

            echo "<script>alert('Usuário cadastrado com sucesso!'); window.location.href = 'index.php';</script>";
            exit;

        } catch (PDOException $e) {
            die("Erro no banco: " . $e->getMessage());
        }
    } else {
        echo "<script>alert('Preencha todos os campos!'); window.history.back();</script>";
    }
} else {
    header("Location: cadastrousers.php");
    exit;
}
