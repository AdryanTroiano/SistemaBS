

<?php
require_once 'auth.php';
// Busca os dados do usuário com base no ID passado via requisição
$id = intval($_REQUEST["id"]); // Converte para inteiro para segurança
$sql = "SELECT * FROM cadastrobs WHERE id={$id}";
$res = $conn->query($sql); // Executa a consulta no banco de dados

if ($res->num_rows > 0) {
    $row = $res->fetch_object(); // Obtém o resultado como um objeto
} else {
    echo "<div>Usuário não encontrado!</div>";
    exit; // Para evitar o carregamento do formulário se o usuário não existir
}
?>

<!-- Formulário para editar as informações do usuário -->
<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php print $row->id; ?>">

    <div class="container">
        <h1 id="path2">Editar Cadastro</h1>
        <div class="contentform">
            <div class="form-container">

                <!-- Primeira linha de campos -->
                <div class="row">
    <div class="column">
        <label for="nome">Nome<span class="required">*</span></label>
        <input type="text" name="nome" id="nome" value="<?php print htmlspecialchars($row->nome); ?>" placeholder="Digite o nome" required>
    </div>
</div>
<div class="row">
    <div class="column">
        <label for="cpf">CPF<span class="required">*</span></label>
        <input type="text" name="cpf" id="cpf" value="<?php print htmlspecialchars($row->cpf); ?>" placeholder="Digite o CPF (apenas números)" required>
    </div>
    <div class="column">
        <label for="sexo">Sexo<span class="required">*</span></label>
        <select name="sexo" id="sexo" required>
            <option value="" disabled <?php echo ($row->sexo == '') ? 'selected' : ''; ?>>Selecione o sexo</option>
            <option value="Masculino" <?php echo ($row->sexo == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
            <option value="Feminino" <?php echo ($row->sexo == 'Feminino') ? 'selected' : ''; ?>>Feminino</option>
            <option value="Outros" <?php echo ($row->sexo == 'Outros') ? 'selected' : ''; ?>>Outros</option>
        </select>
    </div>
    <div class="column">
        <label for="data-nascimento">Data de Nascimento<span class="required">*</span></label>
        <input type="date" name="nasc" id="data-nascimento" value="<?php print htmlspecialchars($row->nasc); ?>" required>
    </div>
</div>

<!-- Segunda linha de campos -->
<div class="row">
    <div class="column">
        <label for="email">E-mail<span class="required">*</span></label>
        <input type="email" name="email" id="email" value="<?php print htmlspecialchars($row->email); ?>" placeholder="Digite o e-mail" required>
    </div>
    <div class="column">
        <label for="cep">CEP<span class="required">*</span></label>
        <input type="text" name="cep" id="cep" value="<?php print htmlspecialchars($row->cep); ?>" placeholder="Digite o CEP (apenas números)" required>
    </div>
    <div class="column">
        <label for="endereco">Endereço<span class="required">*</span></label>
        <input type="text" name="endereco" id="endereco" value="<?php print htmlspecialchars($row->endereco); ?>" placeholder="Digite o endereço" required>
    </div>
</div>

<!-- Terceira linha de campos -->
<div class="row">
    <div class="column">
        <label for="numero">Número<span class="required">*</span></label>
        <input type="text" name="numero" id="numero" value="<?php print htmlspecialchars($row->numero); ?>" placeholder="Digite o número" required>
    </div>
    <div class="column">
        <label for="bairro">Bairro<span class="required">*</span></label>
        <input type="text" name="bairro" id="bairro" value="<?php print htmlspecialchars($row->bairro); ?>" placeholder="Digite o bairro" required>
    </div>
    <div class="column">
        <label for="complemento">Complemento</label>
        <input type="text" name="complemento" id="complemento" value="<?php print htmlspecialchars($row->complemento); ?>" placeholder="Complemento">
    </div>
</div>

<!-- Quarta linha de campos -->
<div class="row">
    <div class="column">
        <label for="telefone">Telefone<span class="required">*</span></label>
        <input type="text" name="telefone" id="telefone" value="<?php print htmlspecialchars($row->telefone); ?>" placeholder="Digite o telefone (apenas números)" required>
    </div>
    <div class="column">
        <label for="tipo-sanguineo">Tipo Sanguíneo<span class="required">*</span></label>
        <select name="ts" id="tipo-sanguineo" required>
            <option value="" disabled <?php echo ($row->ts == '') ? 'selected' : ''; ?>>Selecione o tipo sanguíneo</option>
            <option value="A+" <?php echo ($row->ts == 'A+') ? 'selected' : ''; ?>>A+</option>
            <option value="A-" <?php echo ($row->ts == 'A-') ? 'selected' : ''; ?>>A-</option>
            <option value="B+" <?php echo ($row->ts == 'B+') ? 'selected' : ''; ?>>B+</option>
            <option value="B-" <?php echo ($row->ts == 'B-') ? 'selected' : ''; ?>>B-</option>
            <option value="AB+" <?php echo ($row->ts == 'AB+') ? 'selected' : ''; ?>>AB+</option>
            <option value="AB-" <?php echo ($row->ts == 'AB-') ? 'selected' : ''; ?>>AB-</option>
            <option value="O+" <?php echo ($row->ts == 'O+') ? 'selected' : ''; ?>>O+</option>
            <option value="O-" <?php echo ($row->ts == 'O-') ? 'selected' : ''; ?>>O-</option>
        </select>
    </div>
    <div class="column">
        <label for="data-doacao">Data da Doação<span class="required">*</span></label>
        <input type="date" name="datedonation" id="data-doacao" value="<?php print htmlspecialchars($row->datedonation); ?>" required>
    </div>
</div>

<!-- Linha do botão -->
<div class="row">
    <div class="column button-column">
        <button type="submit">Enviar</button>
    </div>
</div>


            </div>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Máscaras existentes
    var cpfInput = document.getElementById('cpf');
    cpfInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '')
            .replace(/^(\d{3})(\d)/, '$1.$2')
            .replace(/^(\d{3}\.\d{3})(\d)/, '$1.$2')
            .replace(/^(\d{3}\.\d{3}\.\d{3})(\d)/, '$1-$2')
            .substring(0, 14);
    });

    var telefoneInput = document.getElementById('telefone');
    telefoneInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '')
            .replace(/^(\d{2})(\d)/, '($1) $2') // Formato (xx) x
            .replace(/(\d{5})(\d{4})$/, '$1-$2') // Formato xxxxx-xxxx
            .substring(0, 15); // Limita a 15 caracteres
    });

    var cepInput = document.getElementById('cep');
    cepInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '')
            .replace(/^(\d{5})(\d{3})$/, '$1-$2')
            .substring(0, 10); // Limita o CEP a 10 caracteres
    });

    // Autocompletar CEP
    $('#cep').on('blur', function() {
        let cep = $(this).val().replace(/\D/g, ''); // Remove caracteres não numéricos
        if (cep.length === 8) {
            $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function(data) {
                if (!data.erro) {
                    $('#endereco').val(data.logradouro);
                    $('#bairro').val(data.bairro);
                    $('#complemento').val(data.complemento);
                } else {
                    alert('CEP não encontrado.');
                }
            });
        } else {
            alert('CEP inválido.');
        }
    });
});
</script>
