<?php
include('config.php'); // Insira sua conexão com o banco

// Consulta ao banco de dados para contar as bolsas de sangue
$sql = "SELECT ts, COUNT(*) as quantidade FROM cadastrobs GROUP BY ts";
$result = $conn->query($sql);

// Array para armazenar os dados
$estoqueSangue = [];

// Verifica se a consulta retornou resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Adiciona os tipos sanguíneos e suas quantidades ao array
        $estoqueSangue[] = [
            'tipo' => $row['ts'], // 'ts' deve ser o campo que identifica o tipo sanguíneo
            'quantidade' => $row['quantidade']
        ];
    }
}

// Define o cabeçalho para JSON e imprime os dados
header('Content-Type: application/json');
echo json_encode($estoqueSangue);
?>
