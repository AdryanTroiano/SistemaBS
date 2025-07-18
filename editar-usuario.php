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

<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php echo $row->id; ?>">

    <div class="container">
        <h1 id="path2">Editar Cadastro</h1>
        <div class="contentform">
            <div class="form-container">

                <!-- Linha 1: Nome -->
                <div class="row">
                    <div class="column">
                        <label for="nome">Nome<span class="required">*</span></label>
                        <input type="text" name="nome" id="nome"
                               value="<?php echo htmlspecialchars($row->nome); ?>"
                               placeholder="Digite o nome" required>
                    </div>
                </div>

                <!-- Linha 2: CPF, Sexo, Data de Nascimento -->
                <div class="row">
                    <div class="column">
                        <label for="cpf">CPF<span class="required">*</span></label>
                        <input type="text" name="cpf" id="cpf"
                               value="<?php echo htmlspecialchars($row->cpf); ?>"
                               placeholder="Digite o CPF (apenas números)" required readonly>
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
                        <input type="date" name="nasc" id="data-nascimento"
                               value="<?php echo htmlspecialchars($row->nasc); ?>" required>
                    </div>
                </div>

                <!-- Linha 3: Email, CEP, Endereço -->
                <div class="row">
                    <div class="column">
                        <label for="email">E-mail<span class="required">*</span></label>
                        <input type="email" name="email" id="email"
                               value="<?php echo htmlspecialchars($row->email); ?>"
                               placeholder="Digite o e-mail" required>
                    </div>
                    <div class="column">
                        <label for="cep">CEP<span class="required">*</span></label>
                        <input type="text" name="cep" id="cep"
                               value="<?php echo htmlspecialchars($row->cep); ?>"
                               placeholder="Digite o CEP (apenas números)" required>
                    </div>
                    <div class="column">
                        <label for="endereco">Endereço<span class="required">*</span></label>
                        <input type="text" name="endereco" id="endereco"
                               value="<?php echo htmlspecialchars($row->endereco); ?>"
                               placeholder="Digite o endereço" required>
                    </div>
                </div>

                <!-- Linha 4: Número, Bairro, Complemento -->
                <div class="row">
                    <div class="column">
                        <label for="numero">Número<span class="required">*</span></label>
                        <input type="text" name="numero" id="numero"
                               value="<?php echo htmlspecialchars($row->numero); ?>"
                               placeholder="Digite o número" required>
                    </div>
                    <div class="column">
                        <label for="bairro">Bairro<span class="required">*</span></label>
                        <input type="text" name="bairro" id="bairro"
                               value="<?php echo htmlspecialchars($row->bairro); ?>"
                               placeholder="Digite o bairro" required>
                    </div>
                    <div class="column">
                        <label for="complemento">Complemento</label>
                        <input type="text" name="complemento" id="complemento"
                               value="<?php echo htmlspecialchars($row->complemento); ?>"
                               placeholder="Complemento">
                    </div>
                </div>

                <!-- Linha do botão "Salvar" -->
                <div class="row">
                    <div class="column button-column">
                        <button type="submit">Salvar</button>
                    </div>
                </div>

                <!-- Linha 5: Telefone, Peso, Tipo Sanguíneo -->
                <div class="row">
                    <div class="column">
                        <label for="telefone">Telefone<span class="required">*</span></label>
                        <input type="text" name="telefone" id="telefone"
                               value="<?php echo htmlspecialchars($row->telefone); ?>"
                               placeholder="Digite o telefone (apenas números)" required>
                    </div>
                    <div class="column">
                        <label for="peso">Peso<span class="required">*</span></label>
                        <input type="text" name="peso" id="peso"
                               value="<?php echo htmlspecialchars($row->peso); ?>"
                               placeholder="Ex: 65" required>
                    </div>
                    <div class="column">
                        <label for="tipo-sanguineo">Tipo Sanguíneo<span class="required">*</span></label>
                        <select name="ts" id="tipo-sanguineo" required>
                            <option value="" disabled <?php echo ($row->ts == '') ? 'selected' : ''; ?>>Selecione o tipo sanguíneo</option>
                            <?php
                            $tipos = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-', 'N.A'];
                            foreach ($tipos as $tipo) {
                                $selected = ($row->ts == $tipo) ? 'selected' : '';
                                echo "<option value=\"$tipo\" $selected>$tipo</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- Linha 6: Data da Doação -->
                <div class="row">
                    <div class="column" style="width: 100%;">
                        <label for="data-doacao">Data da Doação<span class="required">*</span></label>
                        <input type="date" name="datedonation" id="data-doacao"
                               value="<?php echo htmlspecialchars($row->datedonation); ?>"
                               required style="width: 100%;">
                    </div>
                </div>

                <!-- Botão final "Enviar" -->
                <div class="row">
                    <div class="column button-column">
                        <button type="submit">Enviar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Máscara para CPF
    const cpfInput = document.getElementById('cpf');
    cpfInput.addEventListener('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '')
            .replace(/^(\d{3})(\d)/, '$1.$2')
            .replace(/^(\d{3}\.\d{3})(\d)/, '$1.$2')
            .replace(/^(\d{3}\.\d{3}\.\d{3})(\d)/, '$1-$2')
            .substring(0, 14);
    });

    // Máscara para Telefone
    const telefoneInput = document.getElementById('telefone');
    telefoneInput.addEventListener('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '')
            .replace(/^(\d{2})(\d)/, '($1) $2')
            .replace(/(\d{5})(\d{4})$/, '$1-$2')
            .substring(0, 15);
    });

    // Máscara para CEP
    const cepInput = document.getElementById('cep');
    cepInput.addEventListener('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '')
            .replace(/^(\d{5})(\d{3})$/, '$1-$2')
            .substring(0, 10);
    });

    // Autocompletar endereço via CEP
    $('#cep').on('blur', function () {
        let cep = $(this).val().replace(/\D/g, '');
        if (cep.length === 8) {
            $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function (data) {
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

    // Função para calcular idade
    function calcularIdade(dataNascimento) {
        const hoje = new Date();
        const nascimento = new Date(dataNascimento);
        let idade = hoje.getFullYear() - nascimento.getFullYear();
        const m = hoje.getMonth() - nascimento.getMonth();
        if (m < 0 || (m === 0 && hoje.getDate() < nascimento.getDate())) {
            idade--;
        }
        return idade;
    }

    // Validação no envio do formulário
    $('form').on('submit', function (e) {
        const peso = parseFloat($('#peso').val());
        if (peso < 50) {
            e.preventDefault();
            alert('Peso não pode ser inferior a 50kg.');
            $('#peso').focus();
            return;
        }

        const dataNascimento = $('#data-nascimento').val();
        if (!dataNascimento) {
            e.preventDefault();
            alert('Por favor, preencha a data de nascimento.');
            $('#data-nascimento').focus();
            return;
        }

        const idade = calcularIdade(dataNascimento);
        if (idade < 16) {
            e.preventDefault();
            alert('Doadores menores de 16 anos não podem doar sangue.');
            $('#data-nascimento').focus();
        }
    });
});
</script>
