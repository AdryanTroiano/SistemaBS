<?php
require_once 'auth.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuda – Sistema Banco de Sangue</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<main>
    <div class="contenthelp">
        <h1 class="titlehelp">Bem-vindo ao Sistema de Cadastro do Banco de Sangue de Taquaritinga!</h1><br>
        <h3 class="red">Este espaço é dedicado a você, profissional da saúde. Aqui estão as orientações de uso do sistema para facilitar seu trabalho no cadastro, triagem e gestão de doadores. 😊</h3><br>

        <h2 class="red">🧭 Estrutura do Sistema:</h2><br>

        <h3 class="red">📊 Dashboard</h3>
        <ul>
            <li>Clique no <strong>logotipo</strong> para acessar o painel principal.</li>
            <li>🟢 Se o indicador estiver <strong>verde</strong>, significa que o estoque está em nível seguro (mais de 8 bolsas).</li>
            <li>🔴 Se estiver <strong>vermelho</strong>, temos menos de 8 bolsas em estoque — atenção para reforçar campanhas de doação.</li>
            <li>Para atualizar o estoque manualmente, utilize a opção <strong>"Atualizar estoque"</strong> no final da página do Dashboard.</li>
        </ul><br>

        <h3 class="red">📋 Informações Importantes</h3>
        <ul>
            <li>No menu <strong>"Informações"</strong>, você encontrará as diretrizes de triagem e os requisitos básicos para doação.</li>
            <li>Use esse material durante o atendimento aos candidatos a doadores, garantindo segurança e qualidade no processo.</li>
        </ul><br>

        <h3 class="red">🙋 Cadastrando um Novo Doador</h3>
        <ul>
            <li>No menu, clique em <strong>"Doador"</strong> e depois em <strong>"Cadastrar Doador"</strong>.</li>
            <li>Preencha cuidadosamente todos os campos do formulário. Dados incompletos podem causar problemas na triagem futura.</li>
            <li>Campos com <strong>*</strong> são obrigatórios.</li>
            <li>Após finalizar, clique em <strong>"Enviar"</strong>. O sistema confirmará o cadastro e redirecionará você para a listagem de doadores.</li>
        </ul><br>

        <h3 class="red">🔍 Visualizando Cadastros</h3>
        <ul>
            <li>Acesse o menu <strong>"Doadores"</strong> > <strong>"Listar Doadores"</strong> para consultar os registros existentes.</li>
            <li>Ao lado de cada nome, você verá os botões <strong>"Visualizar"</strong>, <strong>"Editar"</strong> e <strong>"Excluir"</strong>:</li>
            <ul>
                <li><strong>Visualizar:</strong> Exibe todos os dados detalhados do doador, incluindo informações pessoais, contato e histórico de doações.</li>
                <li><strong>Editar:</strong> Permite atualizar os dados do doador, caso haja alguma correção ou atualização necessária.</li>
                <li><strong>Excluir:</strong> Remove o cadastro permanentemente. Atenção: essa ação não pode ser desfeita.</li>
            </ul>
        </ul><br>

        <h3 class="red">📝 Visualizar Informações Principais</h3>
        <ul>
            <li>No menu <strong>"Doador"</strong>, clique em <strong>"Informações Principais"</strong> para consultar os dados mais importantes de cada doador de forma resumida.</li>
        </ul><br>

        <h3 class="red">✏️ Editando Cadastros</h3>
        <ul>
            <li>Localize o doador na lista.</li>
            <li>Clique em <strong>"Editar"</strong>.</li>
            <li>Faça as alterações necessárias.</li>
            <li>Clique em <strong>"Salvar"</strong>. O sistema irá atualizar as informações e exibir a nova lista.</li>
        </ul><br>

        <h3 class="red">🗑️ Excluindo um Doador</h3>
        <ul>
            <li>Localize o doador desejado.</li>
            <li>Clique em <strong>"Excluir"</strong>.</li>
            <li>Confirme a exclusão.</li>
            <li>O sistema removerá o cadastro permanentemente.</li>
        </ul><br>

        <h3 class="red">👤 Cadastro de Funcionários (Somente para Administradores)</h3>
        <ul>
            <li>O sistema possui um módulo de <strong>Cadastro de Novos Funcionários</strong>.</li>
            <li>Somente usuários com <strong>nível de acesso "Administrador"</strong> podem cadastrar novos funcionários no sistema.</li>
            <li>Durante o cadastro de um novo funcionário, é possível escolher o <strong>nível de acesso</strong> do usuário:</li>
            <ul>
                <li><strong>Administrador:</strong> Acesso total ao sistema, incluindo cadastro e exclusão de outros usuários.</li>
                <li><strong>Usuário Padrão:</strong> Pode realizar cadastros de doadores, editar, visualizar e excluir, mas não tem acesso às configurações de usuários.</li>
            </ul>
            <li>Para acessar essa opção, vá até o menu <strong>"Seu Nome"</strong> e clique em <strong>"Cadastrar Usuário"</strong>.</li>
        </ul><br>

        <h3 class="red">⚠️ Mensagens de Erro</h3>
        <ul>
            <li>Se ocorrer algum problema ao <strong>cadastrar</strong>, <strong>editar</strong> ou <strong>excluir</strong>, o sistema exibirá uma mensagem de erro.</li>
            <li>Verifique os campos preenchidos, ou se o usuário tem permissão suficiente para a ação.</li>
            <li>Persistindo o erro, contate o responsável técnico ou a equipe de TI.</li>
        </ul><br>

        <h3 class="red">❤️ Dicas Finais</h3>
        <ul>
            <li>Utilize sempre o menu principal para navegar entre as funcionalidades.</li>
            <li>Lembre-se: cada ação sua contribui diretamente para salvar vidas.</li>
            <li><strong>Preencha todos os campos obrigatórios com atenção.</strong></li>
            <li>Todos os dados são protegidos e podem ser atualizados posteriormente, sempre que necessário.</li>
        </ul><br>
    </div>
</main>
</body>

</html>
