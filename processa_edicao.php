<?php
require_once 'auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: editfun.php");
    exit;
}

$id = $_POST['id'] ?? '';
$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';
$confirmarSenha = $_POST['confirmar_senha'] ?? '';

if (!$id || !$nome || !$email) {
    echo "<script>alert('Por favor, preencha todos os campos obrigatórios!'); window.history.back();</script>";
    exit;
}

// Se as senhas foram preenchidas, verifica se coincidem
if (($senha !== '' || $confirmarSenha !== '') && $senha !== $confirmarSenha) {
    echo "<script>alert('As senhas não coincidem!'); window.history.back();</script>";
    exit;
}

try {
    $pdo = new PDO("mysql:host=localhost;dbname=cadastro;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o email já existe para outro usuário (excluindo o atual)
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ? AND id != ?");
    $stmt->execute([$email, $id]);

    if ($stmt->rowCount() > 0) {
        echo "<script>alert('E-mail já cadastrado para outro usuário!'); window.history.back();</script>";
        exit;
    }

    if ($senha !== '') {
        // Atualiza nome, email e senha (criptografada)
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE usuarios SET usuario = ?, email = ?, senha = ? WHERE id = ?");
        $stmt->execute([$nome, $email, $senhaHash, $id]);
    } else {
        // Atualiza só nome e email
        $stmt = $pdo->prepare("UPDATE usuarios SET usuario = ?, email = ? WHERE id = ?");
        $stmt->execute([$nome, $email, $id]);
    }

    echo "<script>alert('Usuário atualizado com sucesso!'); window.location.href = 'index.php';</script>";
    exit;

} catch (PDOException $e) {
    die("Erro no banco: " . $e->getMessage());
}
