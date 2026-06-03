<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function verificarLogin() {
    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
        exit;
    }
}

function isAdmin() {
    return isset($_SESSION['usuario_nivel']) && $_SESSION['usuario_nivel'] === 'admin';
}

function isPadrao() {
    return isset($_SESSION['usuario_nivel']) && $_SESSION['usuario_nivel'] === 'padrao';
}

function verificarAdmin() {
    verificarLogin();

    if (!isAdmin()) {
        header("Location: sistema.php?page=dashboard");
        exit;
    }
}