<?php
require_once 'auth.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sucesso = true;

    foreach ($_POST as $tipo_sangue_id => $quantidade) {
        $tipo_sangue_id = mysqli_real_escape_string($conn, $tipo_sangue_id);
        $quantidade = mysqli_real_escape_string($conn, $quantidade);

        if (is_numeric($quantidade) && $quantidade >= 0 && is_numeric($tipo_sangue_id)) {
            $sql = "
                UPDATE estoque_sangue 
                SET quantidade = '$quantidade' 
                WHERE tipo_sangue_id = '$tipo_sangue_id'
            ";

            if ($conn->query($sql) !== TRUE) {
                $sucesso = false;
            }
        } else {
            $sucesso = false;
        }
    }

    if ($sucesso) {
        $_SESSION['mensagem'] = 'Estoque de sangue editado com sucesso!';
        $_SESSION['mensagem_tipo'] = 'success';
    } else {
        $_SESSION['mensagem'] = 'Houve um erro ao editar o estoque.';
        $_SESSION['mensagem_tipo'] = 'error';
    }
}

$sql = "
    SELECT 
        es.tipo_sangue_id,
        ts.tipo,
        es.quantidade
    FROM estoque_sangue es
    INNER JOIN tipos_sangue ts 
        ON es.tipo_sangue_id = ts.id
    ORDER BY ts.tipo
";

$result = $conn->query($sql);

$estoqueSangue = [];
$cadastrosExistem = $result && $result->num_rows > 0;

if ($cadastrosExistem) {
    while ($row = $result->fetch_assoc()) {
        $estoqueSangue[] = [
            'tipo_sangue_id' => $row['tipo_sangue_id'],
            'tipo' => $row['tipo'],
            'quantidade' => $row['quantidade']
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estoque de Sangue</title>

    <script>
        window.onload = function() {
            <?php if (isset($_SESSION['mensagem'])): ?>
                var mensagem = "<?php echo $_SESSION['mensagem']; ?>";
                alert(mensagem);

                <?php 
                    unset($_SESSION['mensagem']);
                    unset($_SESSION['mensagem_tipo']);
                ?>
            <?php endif; ?>
        };
    </script>
</head>
<body>

    <?php if ($cadastrosExistem): ?>
        <div class="form-container">
            <h1 id="path5">Editar Estoque</h1>

            <form method="POST" action="">
                <div class="blood-stock">

                    <?php foreach ($estoqueSangue as $item): ?>
                        <div class="blood-type">
                            <label for="tipo_<?php echo htmlspecialchars($item['tipo_sangue_id']); ?>">
                                Tipo <?php echo htmlspecialchars($item['tipo']); ?>:
                            </label>

                            <input 
                                type="number" 
                                id="tipo_<?php echo htmlspecialchars($item['tipo_sangue_id']); ?>" 
                                name="<?php echo htmlspecialchars($item['tipo_sangue_id']); ?>" 
                                value="<?php echo htmlspecialchars($item['quantidade']); ?>" 
                                min="0" 
                                required 
                                class="input-field"
                            >
                        </div>
                    <?php endforeach; ?>

                </div>

                <button type="submit" id="enviar3">Atualizar Estoque</button>
            </form>
        </div>
    <?php else: ?>
        <p id="no-data-message">Nenhum estoque encontrado para edição.</p>
    <?php endif; ?>

</body>
</html>