<?php
session_start();

// Conexão com o banco usando PDO
try {
    $pdo = new PDO("mysql:host=localhost;dbname=cadastro;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}

// Captura dados enviados pelo formulário
$usuario = trim($_POST['usuario'] ?? '');
$senha = $_POST['senha'] ?? '';

// Verifica se os campos foram preenchidos
if (empty($usuario) || empty($senha)) {
    echo "<script>alert('Por favor, preencha todos os campos!'); window.location.href = 'index.php';</script>";
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->execute([$usuario]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($senha, $user['senha'])) {
            // Criação da sessão com informações completas
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario'] = $user['usuario'];
            $_SESSION['usuario_nivel'] = $user['nivel']; // Aqui está a chave do controle de acesso

            // Redireciona para sistema
            header("Location: sistema.php");
            exit;
        } else {
            echo "<script>alert('Senha incorreta!'); window.location.href = 'index.php';</script>";
            exit;
        }
    } else {
        echo "<script>alert('Usuário não encontrado!'); window.location.href = 'index.php';</script>";
        exit;
    }
} catch (PDOException $e) {
    die("Erro ao consultar o banco: " . $e->getMessage());
}
?>
