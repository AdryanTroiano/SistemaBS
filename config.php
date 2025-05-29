<?php
// Verificar se as constantes já foram definidas
if (!defined('HOST')) {
    define('HOST', 'localhost');   // Endereço do servidor MySQL
}

if (!defined('USER')) {
    define('USER', 'root');        // Usuário do MySQL
}

if (!defined('PASS')) {
    define('PASS', '');            // Senha do MySQL
}

if (!defined('BASE')) {
    define('BASE', 'cadastro');    // Nome do banco de dados
}

// Criando a conexão com o banco de dados
$conn = new mysqli(HOST, USER, PASS, BASE);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
