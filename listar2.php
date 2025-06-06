
<?php

require_once 'auth.php';

include('config.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<p class='doador-detalhes-erro'>ID não fornecido.</p>";
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM cadastrobs WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    echo "<p class='doador-detalhes-erro'>Doador não encontrado.</p>";
    exit;
}

$doador = $result->fetch_object();
?>

<div class="doador-detalhes-container">
    <h1 class="doador-detalhes-titulo">Detalhes do Doador</h1>

    <div class="doador-detalhes-tabela-container">
        <table class="doador-detalhes-tabela" id="printTable">
            <tr><th>ID</th><td><?php echo $doador->id; ?></td></tr>
            <tr><th>Nome</th><td><?php echo htmlspecialchars($doador->nome); ?></td></tr>
            <tr><th>Sexo</th><td><?php echo $doador->sexo; ?></td></tr>
            <!-- CPF com ocultação -->
            <tr><th>CPF</th><td><input type="password" id="cpfField" value="<?php echo htmlspecialchars($doador->cpf); ?>" disabled></td></tr>
            <tr><th>Telefone</th><td><?php echo $doador->telefone; ?></td></tr>
            <tr><th>Email</th><td><?php echo $doador->email; ?></td></tr>
            <tr><th>Endereço</th><td><?php echo $doador->endereco; ?></td></tr>
            <tr><th>Número</th><td><?php echo $doador->numero; ?></td></tr>
            <tr><th>CEP</th><td><?php echo $doador->cep; ?></td></tr>
            <tr><th>Complemento</th><td><?php echo $doador->complemento; ?></td></tr>
            <tr><th>Bairro</th><td><?php echo $doador->bairro; ?></td></tr>
            <tr><th>Nascimento</th><td><?php echo (new DateTime($doador->nasc))->format('d/m/Y'); ?></td></tr>
            <tr><th>Tipo Sanguíneo</th><td><?php echo $doador->ts; ?></td></tr>
            <tr><th>Peso</th><td><?php echo $doador->peso; ?></td></tr>
        </table>
    </div>

    <!-- Botões de ações -->
    <div class="doador-detalhes-voltar">
        <a href="?page=listar" class="doador-detalhes-btn">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>

        <a href="?page=editar&id=<?php echo $doador->id; ?>" class="doador-detalhes-btn">
            <i class="fas fa-edit"></i> Editar
        </a>

        <a href="?page=excluir&id=<?php echo $doador->id; ?>" class="doador-detalhes-btn btn-excluir" onclick="return confirm('Tem certeza que deseja excluir este doador?');">
            <i class="fas fa-trash-alt"></i> Excluir
        </a>

        <button class="doador-detalhes-btn imprimir-btn" onclick="printTable()">
            <i class="fas fa-print"></i> Imprimir
        </button>

        <button class="doador-detalhes-btn btn-exibir-cpf" onclick="toggleCpfVisibility()">
            <i class="fas fa-eye"></i> Mostrar CPF
        </button>
    </div>
</div>

<script>
function printTable() {
    var originalContent = document.body.innerHTML;
    var printContent = document.getElementById('printTable').outerHTML;
    
    document.body.innerHTML = printContent;
    window.print();

    // Após imprimir, volta ao conteúdo original da página
    document.body.innerHTML = originalContent;
}

function toggleCpfVisibility() {
    var cpfField = document.getElementById("cpfField");
    var button = document.querySelector(".doador-detalhes-btn i");
    
    // Alternar entre password e text
    if (cpfField.type === "password") {
        cpfField.type = "text"; // Torna o CPF visível
        button.classList.remove("fa-eye");
        button.classList.add("fa-eye-slash");
    } else {
        cpfField.type = "password"; // Torna o CPF oculto
        button.classList.remove("fa-eye-slash");
        button.classList.add("fa-eye");
    }
}
</script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>
.doador-detalhes-container {
    max-width: 100%;
    margin: 30px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.doador-detalhes-titulo {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
    font-size: 26px;
}

.doador-detalhes-tabela-container {
    width: 100%;
    overflow: hidden; /* Evita rolagem lateral */
}

.doador-detalhes-tabela {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
    table-layout: fixed; /* Tabela com layout fixo para prevenir que as células saiam da linha */
}

.doador-detalhes-tabela th,
.doador-detalhes-tabela td {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: left;
    vertical-align: middle;
    word-wrap: break-word; /* Permite que as palavras quebrem a linha */
    overflow-wrap: break-word; /* Garante a quebra de linha em caso de texto muito longo */
}

.doador-detalhes-tabela th {
    background-color: #eaeaea;
    color: #333;
    width: 30%;
}

.doador-detalhes-voltar {
    text-align: center;
    margin-top: 25px;
}

.doador-detalhes-btn {
    background-color: #007BFF; /* Cor padrão (azul) para os botões */
    cursor: pointer;
    color: white;
    padding: 10px 25px;
    border: none;
    border-radius: 6px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.2s ease;
    margin: 0 5px;
    display: inline-flex;
    align-items: center;
    height: 45px; /* Define a altura fixa dos botões */
    min-width: 150px; /* Define uma largura mínima */
    justify-content: center; /* Centraliza o texto e ícones */
    line-height: 1; /* Ajusta o alinhamento vertical do texto */
}

.doador-detalhes-btn:hover {
    background-color: #0056b3;
}

.btn-exibir-cpf,
.btn-excluir {
    background-color: #dc3545; /* vermelho Bootstrap */
}

.btn-exibir-cpf:hover,
.btn-excluir:hover {
    background-color: #a71d2a; /* tom mais escuro no hover */
}

.doador-detalhes-btn.imprimir-btn {
    background-color: #28a745; /* verde para o botão imprimir */
}

.doador-detalhes-btn.imprimir-btn:hover {
    background-color: #218838; /* tom mais escuro de verde no hover */
}

.doador-detalhes-btn i {
    margin-right: 8px; /* Adiciona espaço entre o ícone e o texto */
}

.doador-detalhes-erro {
    text-align: center;
    color: red;
    font-weight: bold;
    margin-top: 30px;
}

.btn-excluir {
    background-color: #dc3545; /* vermelho Bootstrap */
}

.btn-excluir:hover {
    background-color: #a71d2a; /* tom mais escuro no hover */
}

/* Responsividade */
@media (max-width: 600px) {
    .doador-detalhes-titulo {
        font-size: 22px;
    }

    .doador-detalhes-tabela {
        font-size: 12px;
    }

    .doador-detalhes-tabela th,
    .doador-detalhes-tabela td {
        padding: 8px;
    }

    .doador-detalhes-btn {
        padding: 8px 20px;
        font-size: 14px;
    }
}

@media (max-width: 1000px) {
    /* Fazendo os botões ficarem empilhados, um abaixo do outro */
    .doador-detalhes-voltar {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .doador-detalhes-btn {
        width: 100%; /* Faz os botões ocuparem toda a largura disponível */
        margin-bottom: 10px; /* Espaçamento entre os botões */
        text-align: center;
        justify-content: center;
    }
}

@media (max-width: 315px) {
    .doador-detalhes-container {
        padding: 10px;
    }

    .doador-detalhes-titulo {
        font-size: 20px;
    }

    .doador-detalhes-tabela {
        font-size: 10px;
    }

    .doador-detalhes-tabela th,
    .doador-detalhes-tabela td {
        padding: 6px;
    }

    .doador-detalhes-btn {
        padding: 6px 15px;
        font-size: 12px;
    }
}
</style>
