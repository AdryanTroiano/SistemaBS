<?php
include('config.php');

// Busca os tipos sanguíneos e suas quantidades no estoque
$sql = "
SELECT
    ts.tipo,
    es.quantidade
FROM estoque_sangue es
INNER JOIN tipos_sangue ts
    ON es.tipo_sangue_id = ts.id
ORDER BY ts.tipo
";

$result = $conn->query($sql);

// Array para armazenar os dados
$estoqueSangue = [];

// Verifica se a consulta retornou resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $estoqueSangue[] = [
            'tipo' => $row['tipo'],
            'quantidade' => $row['quantidade']
        ];
    }
}

// Retorna os dados em JSON
header('Content-Type: application/json');
echo json_encode($estoqueSangue);
?>