<?php
require_once 'auth.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="contenthome">
        <h1>Bem-vindo ao Sistema de Cadastro do Banco de Sangue de Taquaritinga!</h1><br>
        <h3>Esta é a página informacional do sistema, onde existem informações que você deve se certificar antes de iniciar a doação.</h3><br>

        <h3>Requisitos de Elegibilidade:</h2><br>
        <ul class="instrucao">
            <li>Idade: O doador deve ter entre 16 e 69 anos, se for menor de idade, poderá doar aos 16 acompanhado dos responsáveis.</li>
            <li>Peso: O peso mínimo é de 50kg</li>
            <li>Saúde Geral: Verificar se está em boas condições de saúde, sem doenças transmissíveis ou condições que impeçam a doação.</li>
        </ul><br>

        <h3>Medicamentos e Histórico de Doações</h3>
        <ul class="instrucao">
            <li>Medicamentos: Verificar medicamentos que o doador esteja tomando, pois alguns podem impedir a doação temporariamente.</li>
            <li>Histórico de Doações: Saber quando foi a última doação, já que existem intervalos de tempo obrigatórios entre elas (geralmente, de 3 a 6 meses).</li>
        </ul><br>

        <h3>Alimentação, Ingestão de bebidas e Uso de Tabaco</h3>
        <ul class="instrucao">
            <li>Alimentação: Evitar refeições gordurosas antes da doação e optar por uma alimentação leve.</li>
            <li>Álcool e Tabaco: Verificar se o doador consumiu bebidas alcoólicas e/ou fumou no dia da doação</li>
        </ul><br>

        <h3>Histórico de Viagens</h3>
        <ul class="instrucao">
            <li>Viajem Recente: Verificar a respeito de viagens internacionais, especialmente para áreas com surtos de doenças.</li>
        </ul><br>

        <h3>Gravidez e Amamentação</h3>
        <ul class="instrucao">
            <li><b>ATENÇÃO! MULHERES GESTANTES OU AMAMENTANDO NÃO PODEM DOAR SANGUE DE FORMA ALGUMA</b></li>
        </ul><br>
    </div> <!-- Fim de .contenthome -->
</body>

</html>
