

<?php
require_once 'auth.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Inclui a conexão com o banco de dados
include('config.php');

// Verifica se foi enviado um formulário de edição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sucesso = true; // Variável para controlar o sucesso da operação

    // Atualiza a quantidade no banco de dados
    foreach ($_POST as $tipo => $quantidade) {
        // Previne injeção SQL
        $tipo = mysqli_real_escape_string($conn, $tipo);
        $quantidade = mysqli_real_escape_string($conn, $quantidade);

        // Verifica se a quantidade é um número válido
        if (is_numeric($quantidade) && $quantidade >= 0) {
            $sql = "UPDATE estoque_sangue SET quantidade = '$quantidade' WHERE tipo_sangue = '$tipo'";
            if ($conn->query($sql) !== TRUE) {
                // Se ocorrer um erro, define sucesso como falso
                $sucesso = false;
            }
        } else {
            $sucesso = false; // Caso a quantidade seja inválida
        }
    }

    // Define a mensagem de sucesso ou erro
    if ($sucesso) {
        $_SESSION['mensagem'] = 'Estoque de sangue editado com sucesso!';
        $_SESSION['mensagem_tipo'] = 'success'; // Para aplicar estilos de sucesso
    } else {
        $_SESSION['mensagem'] = 'Houve um erro ao editar o estoque.';
        $_SESSION['mensagem_tipo'] = 'error'; // Para aplicar estilos de erro
    }
}

// Consulta para buscar os tipos sanguíneos e suas respectivas quantidades
$sql = "SELECT tipo_sangue, quantidade FROM estoque_sangue";
$result = $conn->query($sql);

$estoqueSangue = [];
$cadastrosExistem = $result->num_rows > 0; // Verifica se há registros

if ($cadastrosExistem) {
    // Preenche o array com os tipos sanguíneos e quantidades
    while ($row = $result->fetch_assoc()) {
        $estoqueSangue[$row['tipo_sangue']] = $row['quantidade'];
    }
} else {
    echo "Nenhum cadastro encontrado.";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estoque de Sangue</title>
    <script>
        // Função para exibir o alert
        window.onload = function() {
            <?php if (isset($_SESSION['mensagem'])): ?>
                var tipo = "<?php echo $_SESSION['mensagem_tipo']; ?>";
                var mensagem = "<?php echo $_SESSION['mensagem']; ?>";
                alert(mensagem); // Exibe o alert com a mensagem
                <?php 
                    // Limpa a mensagem após exibir
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
                    <!-- Formulário de edição de estoque, passando os valores via POST -->
                    <?php foreach ($estoqueSangue as $tipo => $quantidade): ?>
                        <div class="blood-type">
                            <label for="tipo_<?php echo $tipo; ?>">Tipo <?php echo $tipo; ?>:</label>
                            <input type="number" id="tipo_<?php echo $tipo; ?>" name="<?php echo $tipo; ?>" value="<?php echo $quantidade; ?>" min="0" required class="input-field">
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
