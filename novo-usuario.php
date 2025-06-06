<?php
require_once 'auth.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastrar Doadores</title>
</head>
<body>

    <div class="container">
        <h1 id="path2">Cadastrar Doadores</h1>
        <form action="?page=salvar" method="POST">
            <input type="hidden" name="acao" value="cadastrar">
            <div class="contentform">
                <div class="form-container">

                    <!-- Primeira linha -->
                    <div class="row">
                        <div class="column">
                            <label for="nome">Nome<span class="required">*</span></label>
                            <input type="text" name="nome" id="nome" placeholder="Digite o nome" required>
                        </div>
                    </div>

                    <!-- Segunda linha -->
                    <div class="row">
                        <div class="column">
                            <label for="cpf">CPF<span class="required">*</span></label>
                            <input type="text" name="cpf" id="cpf" placeholder="Digite o CPF (apenas números)" required>
                        </div>
                        <div class="column">
                            <label for="sexo">Sexo<span class="required">*</span></label>
                            <select name="sexo" id="sexo" required>
                                <option value="" disabled selected>Selecione o sexo:</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </div>
                        <div class="column">
                            <label for="data-nascimento">Data de Nascimento<span class="required">*</span></label>
                            <input type="date" name="nasc" id="data-nascimento" required>
                        </div>
                    </div>

                    <!-- Terceira linha -->
                    <div class="row">
                        <div class="column">
                            <label for="email">E-mail<span class="required">*</span></label>
                            <input type="email" name="email" id="email" placeholder="Digite o e-mail" required>
                        </div>
                        <div class="column">
                            <label for="cep">CEP<span class="required">*</span></label>
                            <input type="text" name="cep" id="cep" placeholder="Digite o CEP (apenas números)" required>
                        </div>
                        <div class="column">
                            <label for="endereco">Endereço<span class="required">*</span></label>
                            <input type="text" name="endereco" id="endereco" placeholder="Digite o endereço" required>
                        </div>
                    </div>

                    <!-- Quarta linha -->
                    <div class="row">
                        <div class="column">
                            <label for="numero">Número<span class="required">*</span></label>
                            <input type="text" name="numero" id="numero" placeholder="Digite o número" required>
                        </div>
                        <div class="column">
                            <label for="bairro">Bairro<span class="required">*</span></label>
                            <input type="text" name="bairro" id="bairro" placeholder="Digite o bairro" required>
                        </div>
                        <div class="column">
                            <label for="complemento">Complemento</label>
                            <input type="text" name="complemento" id="complemento" placeholder="Complemento">
                        </div>
                    </div>

                    <!-- Quinta linha -->
                    <div class="row">
                        <div class="column">
                            <label for="telefone">Telefone<span class="required">*</span></label>
                            <input type="text" name="telefone" id="telefone" placeholder="Digite o telefone (apenas números)" required>
                        </div>
                        <div class="column">
                            <label for="peso">Peso (kg)<span class="required">*</span></label>
                            <input type="text" name="peso" id="peso" placeholder="Ex: 65" min="1" required>
                        </div>
                        <div class="column">
                            <label for="tipo-sanguineo">Tipo Sanguíneo<span class="required">*</span></label>
                            <select name="ts" id="tipo-sanguineo" required>
                                <option value="" disabled selected>Selecione o tipo sanguíneo:</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="N.A">N.A</option>
                            </select>
                        </div>
                    </div>

                    <!-- Sexta linha -->
                    <div class="row">
                        <div class="column">
                            <label for="data-doacao">Data da Doação<span class="required">*</span></label>
                            <input type="date" name="datedonation" id="data-doacao" class="input-field" required>
                        </div>
                    </div>

                    <!-- Botão -->
                    <div class="column button-column">
                        <button type="submit">Enviar</button>
                    </div>

                </div>
            </div>
        </form>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
    $(document).ready(function() {
        $("input[name='cpf']").mask("999.999.999-99");
        $("input[name='telefone']").mask("(99) 99999-9999");
        $("input[name='cep']").mask("99999-999");

        // Autocompletar endereço
        $("#cep").on("blur", function() {
            let cep = $(this).val().replace(/\D/g, '');
            if (cep.length === 8) {
                $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function(data) {
                    if (!data.erro) {
                        $("#endereco").val(data.logradouro);
                        $("#bairro").val(data.bairro);
                        $("#complemento").val(data.complemento);
                    } else {
                        alert("CEP não encontrado.");
                    }
                });
            } else {
                alert("CEP inválido.");
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

        // Validação do peso e idade no envio do formulário
        $("form").on("submit", function(e) {
            const peso = parseFloat($("#peso").val());
            if (peso < 50) {
                e.preventDefault();
                alert("Peso não pode ser inferior a 50kg.");
                $("#peso").focus();
                return;
            }

            const dataNascimento = $("#data-nascimento").val();
            if (!dataNascimento) {
                e.preventDefault();
                alert("Por favor, preencha a data de nascimento.");
                $("#data-nascimento").focus();
                return;
            }

            const idade = calcularIdade(dataNascimento);
            if (idade < 16) {
                e.preventDefault();
                alert("Doadores menores de 16 anos não podem doar sangue.");
                $("#data-nascimento").focus();
                return;
            }
        });
    });
</script>
</body>
</html>
