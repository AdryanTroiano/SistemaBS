<?php

// Inicia a lógica de controle baseado na ação solicitada
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        // Captura os dados do formulário para cadastro, incluindo o novo campo "sexo"
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $telefone = $_POST["telefone"];
        $email = $_POST["email"]; 
        $endereco = $_POST["endereco"];
        $numero = $_POST["numero"];
        $cep = $_POST["cep"];
        $complemento = $_POST["complemento"];
        $bairro = $_POST["bairro"];
        $nasc = $_POST["nasc"];
        $ts = $_POST["ts"]; // Novo campo tipo sanguíneo
        $datedonation = $_POST["datedonation"]; // Novo campo para data de doação
        $sexo = $_POST["sexo"]; // Novo campo para sexo (M ou F)
        $peso = $_POST["peso"];

        // Monta a consulta SQL para inserir os dados, incluindo o campo sexo
        $sql = "INSERT INTO cadastrobs (nome, cpf, telefone, email, endereco, numero, cep, complemento, bairro, nasc, ts, datedonation, sexo, peso) 
                VALUES ('{$nome}', '{$cpf}', '{$telefone}', '{$email}', '{$endereco}', '{$numero}', '{$cep}', '{$complemento}', '{$bairro}', '{$nasc}', '{$ts}', '{$datedonation}', '{$sexo}', '{$peso}')";

        // Executa a consulta e verifica se houve erro
        if ($conn->query($sql) === TRUE) {
            // Se o cadastro foi bem-sucedido, exibe uma mensagem de sucesso e redireciona
            echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='?page=listar';</script>";
        } else {
            // Se houve erro, exibe uma mensagem de erro e redireciona
            echo "<script>alert('Erro: " . $conn->error . "'); window.location.href='?page=home';</script>";
        }
        break;

    case 'editar':
        // Captura o ID do usuário a ser editado
        $id = $_REQUEST["id"];
        // Captura os dados do formulário para edição, incluindo o novo campo "sexo"
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $telefone = $_POST["telefone"];
        $email = $_POST["email"]; 
        $endereco = $_POST["endereco"];
        $numero = $_POST["numero"];
        $cep = $_POST["cep"];
        $complemento = $_POST["complemento"];
        $bairro = $_POST["bairro"];
        $nasc = $_POST["nasc"];
        $ts = $_POST["ts"]; // Novo campo tipo sanguíneo
        $datedonation = $_POST["datedonation"]; // Novo campo para data de doação
        $sexo = $_POST["sexo"]; // Novo campo para sexo (M ou F)
        $peso = $_POST["peso"];

        // Monta a consulta SQL para atualizar os dados, incluindo o campo sexo
        $sql = "UPDATE cadastrobs SET
            nome='{$nome}',
            cpf='{$cpf}',
            telefone='{$telefone}',
            email='{$email}',
            endereco='{$endereco}',
            numero='{$numero}',
            cep='{$cep}',
            complemento='{$complemento}',
            bairro='{$bairro}',
            nasc='{$nasc}',
            ts='{$ts}',
            datedonation='{$datedonation}',
            sexo='{$sexo}',
            peso='{$peso}'
            WHERE id={$id}"; // Adiciona a condição WHERE para identificar o registro

        // Executa a consulta e verifica se houve erro
        if ($conn->query($sql) === TRUE) {
            // Se a edição foi bem-sucedida, exibe uma mensagem de sucesso e redireciona
            echo "<script>alert('Editado com sucesso!'); window.location.href='?page=listar';</script>";
        } else {
            // Se houve erro, exibe uma mensagem de erro e redireciona
            echo "<script>alert('Erro: " . $conn->error . "'); window.location.href='?page=home';</script>";
        }
        break;

    case 'excluir':
        // Captura o ID do usuário a ser excluído
        $id = $_REQUEST["id"];
        // Monta a consulta SQL para excluir o registro
        $sql = "DELETE FROM cadastrobs WHERE id={$id}";

        // Executa a consulta e verifica se houve erro
        if ($conn->query($sql) === TRUE) {
            // Se a exclusão foi bem-sucedida, exibe uma mensagem de sucesso e redireciona
            echo "<script>alert('Usuário excluído com sucesso!'); window.location.href='?page=listar';</script>";
        } else {
            // Se houve erro, exibe uma mensagem de erro e redireciona
            echo "<script>alert('Erro ao excluir: " . $conn->error . "'); window.location.href='?page=home';</script>";
        }
        break;
}
?>
