<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o usuário está logado
function verificarLogin() {
    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
        exit;
    }
}

// Verifica se é um administrador
function isAdmin() {
    return isset($_SESSION['usuario_nivel']) && $_SESSION['usuario_nivel'] === 'admin';
}

// Verifica se é um usuário padrão
function isPadrao() {
    return isset($_SESSION['usuario_nivel']) && $_SESSION['usuario_nivel'] === 'padrao';
}
