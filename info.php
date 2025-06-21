<?php
require_once 'auth.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações para Triagem e Cadastro</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="contenthome">
        <h1>💉 Bem-vindo ao Sistema de Cadastro do Banco de Sangue de Taquaritinga!</h1><br>
        <h3>Esta página contém orientações importantes para os profissionais responsáveis pelo atendimento, triagem e cadastro de doadores.</h3>
        <h3>Nosso objetivo é garantir a segurança de todos os envolvidos no processo de doação. Leia atentamente as informações abaixo antes de realizar o cadastro de um novo doador ou doadora. ❤️</h3><br>

        <h3>🩺 Requisitos de Elegibilidade:</h3><br>
        <ul class="instrucao">
            <li><strong>Idade:</strong> Cadastre apenas pessoas entre <b>16 e 69 anos</b>. Lembre-se: jovens de 16 e 17 anos só podem doar acompanhados de seus responsáveis legais.</li>
            <li><strong>Peso:</strong> O peso mínimo permitido para a doação é de <b>50 kg</b>.</li>
            <li><strong>Condição de saúde:</strong> Verifique se o candidato está em boas condições gerais de saúde e se não apresenta doenças que impeçam temporária ou definitivamente a doação.</li>
            <li><em>Certifique-se de que o doador está bem no dia da doação. Isso é fundamental para a segurança do processo.</em></li>
        </ul><br>

        <h3>💊 Medicamentos e Histórico de Doações:</h3>
        <ul class="instrucao">
            <li><strong>Uso de medicamentos:</strong> Pergunte ao candidato sobre o uso de medicamentos. Alguns podem ser impeditivos temporários. Em caso de dúvida, consulte o profissional de triagem técnica.</li>
            <li><strong>Intervalo entre doações:</strong> Confirme a data da última doação. Respeite os intervalos: <b>geralmente entre 3 e 6 meses</b>, conforme o tipo de doação realizada (sangue total, plaquetas etc.).</li>
            <li><em>Quando houver dúvidas sobre a elegibilidade, oriente o doador e consulte a equipe técnica.</em></li>
        </ul><br>

        <h3>🥗 Alimentação, Bebidas e Tabaco:</h3>
        <ul class="instrucao">
            <li><strong>Antes da doação:</strong> Pergunte sobre a alimentação do dia. Oriente para que refeições gordurosas sejam evitadas antes da doação.</li>
            <li><strong>Álcool e cigarro:</strong> Confirme que o doador não consumiu bebidas alcoólicas no mesmo dia e oriente para não fumar nas horas que antecedem a doação.</li>
            <li><em>Esses cuidados ajudam a garantir uma coleta segura e com boa qualidade do sangue.</em></li>
        </ul><br>

        <h3>🌍 Histórico de Viagens:</h3>
        <ul class="instrucao">
            <li><strong>Viagens recentes:</strong> Pergunte sobre viagens internacionais, principalmente para regiões com riscos de doenças endêmicas (malária, zika, etc.).</li>
            <li><em>A triagem de viagens é essencial para prevenir riscos de transmissão de doenças através da transfusão.</em></li>
        </ul><br>

        <h3>🤰 Gravidez e Amamentação:</h3>
        <ul class="instrucao">
            <li><strong>⚠️ Atenção durante a triagem de mulheres:</strong></li>
            <li>Se a candidata estiver <b>grávida ou amamentando</b>, ela <b>não poderá realizar a doação</b> neste momento.</li>
            <li><em>Explique de forma acolhedora que a segurança da doadora e do bebê vem em primeiro lugar. Ela poderá doar futuramente, quando estiver liberada pela equipe de saúde.</em></li>
        </ul><br>
    </div> <!-- Fim de .contenthome -->
</body>

</html>
