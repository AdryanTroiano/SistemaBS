
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
<main>
    <div class="contenthelp">
        <h1 class="titlehelp">Bem-vindo ao Sistema de Cadastro do Banco de Sangue de Taquaritinga!</h1><br>
        <h3 class="red">Precisa de ajuda? Você está no lugar certo! Aqui você encontra todas as informações que precisa para navegar pelo sistema.</h3><br>
        <h2 class="red">Navegue pelo sistema com facilidade:</h2><br>

        <h3 class="red">Dashboard</h3>
        <ul>
            <li>Clique no <strong>"Logotipo"</strong> e tenha acesso ao <strong>Dashboard e avisos</strong>.</li>
            <li>Quando o aviso estiver <strong>"verde"</strong> significa que o estoque tem mais de 8 bolsa de sangue.
            <li>Quando o aviso estiver <strong>"vermelho"</strong> significa que o estoque está com menos de 8 bolsas de sangue exibindo a mensagem de <strong>"Estoque Baixo"</strong> para chamar atenção e necessidade de uma campanha de doação de sangue.</li>
            <li>Para <strong>editar</strong> a quantidade de bolsas disponíveis, clique no botão <strong>"Atualizar estoque"</strong> ao fim da página</li>
        </ul></li><br>
        <h3 class="red">Informações</h3>
        <ul>
            <li>Clique no menu <strong>"Informações"</strong> e tenha acesso rápido a lista de informações necessárias que devem ser colhidas do doador.</li>
            <li>Estas informações facilitam o processo burocrático da doação evitando erros e fornecendo segurança para o que o doador tenha uma boa experiência rápida e eficaz.</li><br>
        </ul>
        <h3 class="red">Para cadastrar um novo doador</h3>
        <ul>
            <li>Acesse o menu e clique na opção <strong>"Doador"</strong> em seguida clique na opção <strong>"Cadastrar Doador".</strong></li>
            <li>Preencha o formulário com as informações do usuário.</li>
            <li>Lembre-se de marcar os campos com asterisco, pois eles são obrigatórios. Ao finalizar, clique em <strong>"Enviar"</strong>.</li>
            <li>O sistema irá confirmar o cadastro e te direcionar para a lista de usuários.</li>
        </ul><br>
        <h3 class="red">Visualizando Cadastros de Doadores</h3>
        <ul>
            <li>Clique em <strong>"Doadores"</strong> depois na opção <strong>"Listar doadores"</strong> para acessar as informações de todos os usuários registrados.</li>
        </ul><br>
        <h3 class="red">Visualizar Informações Principais</h3>
        <ul>
            <li>Clique na opção <strong>"Doador"</strong> e depois em <strong>"Informações Principais"</strong> para acessar rapidamente aos dados mais importantes do doador em caso de necessidade.</li><br>
        </ul>
        <h3 class="red">Editar Cadastros</h3>
        <ul>
            <li><b>Encontre o nome do doador na lista de doadores.</b></li>
            <li>Clique no botão <strong>"Editar"</strong> ao lado do nome dele.</li>
            <li><b>Faça as alterações que você precisar.</b></li>
            <li>Clique em <strong>"Salvar"</strong> para confirmar as mudanças. Pronto! Você será direcionado de volta para a lista de usuários.</li>
        </ul><br>
        <h3 class="red">Para Remover um Doador</h3>
        <ul>
            <li><b>Encontre o nome do usuário na lista de doadores.</b></li>
            <li>Clique no botão <strong>"Excluir"</strong> ao lado do nome dele.</li>
            <li><b>Confirme se você realmente quer remover o usuário.</b></li>
            <li><b>Pronto! O usuário será removido da lista.</b></li>
        </ul><br>
        <h3 class="red">Mensagem de Erros e Problemas</h3>
        <ul>
            <li><strong>Ops, algo deu errado!</strong> Parece que houve um probleminha ao <strong>[cadastrar/editar/excluir]</strong> as informações. Por favor, verifique se todos os dados estão corretos e tente novamente.</li>
        </ul><br>
        <h3 class="red">Navegação</h3>
        <ul>
            <li><strong>No menu, você pode facilmente voltar para a página principal, adicionar novos doadores, consultar estoque de sangue e datas de doação facilitando o atendimanto aos doadores e profissionais de saúde podendo ajudando a salvar mais vidas pois 1 segundo pode fazer a difereça e salvar uma vida.</strong></li> <!--Quis dar uma enviadada pra gerar uma emoção-->
        </ul><br>
        <h3 class="red">Dicas adicionais</h3>
        <ul class="instrucao">
            <li><strong>"Para garantir que tudo ocorra conforme o planejado, preencha todos os campos obrigatórios. Suas informações serão armazenadas de forma segura para que você possa acessá-las e atualizá-las quando quiser."</strong></li>
        </ul><br>
    </main>
</div>
</body>

</html>
