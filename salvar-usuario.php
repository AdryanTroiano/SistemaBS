<?php

switch ($_REQUEST["acao"]) {

    // ==========================
    // CADASTRAR DOADOR
    // ==========================
    case 'cadastrar':

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
        $ts = $_POST["ts"];
        $datedonation = $_POST["datedonation"];
        $sexo = $_POST["sexo"];
        $peso = $_POST["peso"];

        $sql = "INSERT INTO cadastrobs 
                (nome, cpf, telefone, email, endereco, numero, cep, complemento, bairro, nasc, ts, datedonation, sexo, peso) 
                VALUES 
                ('{$nome}', '{$cpf}', '{$telefone}', '{$email}', '{$endereco}', '{$numero}', '{$cep}', '{$complemento}', '{$bairro}', '{$nasc}', '{$ts}', '{$datedonation}', '{$sexo}', '{$peso}')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='?page=listar';</script>";
        } else {
            echo "<script>alert('Erro: " . $conn->error . "'); window.location.href='?page=home';</script>";
        }
        break;


    // ==========================
    // CADASTRAR DOAÇÃO
    // ==========================
    case 'cadastrar_doacao':

    $doador_id = $_POST["doador_id"];
    $ubs_id = $_POST["ubs_id"];
    $data_doacao = $_POST["data_doacao"];
    $quantidade_ml = $_POST["quantidade_ml"];
    $tipo_doacao = $_POST["tipo_doacao"];

    // buscar tipo sanguineo
    $buscarTS = "SELECT ts FROM cadastrobs WHERE id = '{$doador_id}'";
    $resultadoTS = $conn->query($buscarTS);
    $dadosTS = $resultadoTS->fetch_assoc();
    $tipo_sanguineo = $dadosTS['ts'];

    // registrar doacao
    $sql = "INSERT INTO doacoes 
            (doador_id, ubs_id, data_doacao, quantidade_ml, tipo_doacao)
            VALUES 
            ('{$doador_id}', '{$ubs_id}', '{$data_doacao}', '{$quantidade_ml}', '{$tipo_doacao}')";

    if ($conn->query($sql) === TRUE) {

        // atualizar ultima doacao
        $update = "UPDATE cadastrobs 
                   SET datedonation = '{$data_doacao}' 
                   WHERE id = '{$doador_id}'";
        $conn->query($update);

        // atualizar estoque
        $atualizarEstoque = "UPDATE estoque_sangue 
                             SET quantidade = quantidade + {$quantidade_ml}
                             WHERE tipo_sangue = '{$tipo_sanguineo}'";

        $conn->query($atualizarEstoque);

        // ==========================
        // LOG DA DOAÇÃO
        // ==========================

        $funcionario = $_SESSION['usuario'];
        $ip = $_SERVER['REMOTE_ADDR'];

        $sqlLog = "INSERT INTO logs_estoque
        (funcionario, acao, tipo_sangue, quantidade, ip)
        VALUES
        ('$funcionario','DOACAO','$tipo_sanguineo','$quantidade_ml','$ip')";

        $conn->query($sqlLog);

        echo "<script>alert('Doação cadastrada e estoque atualizado!'); window.location.href='?page=listar_doacoes';</script>";

    } else {

        echo "<script>alert('Erro: " . $conn->error . "'); window.location.href='?page=home';</script>";

    }

break;


    // ==========================
    // CADASTRAR RETIRADA
    // ==========================
    case 'cadastrar_retirada':

    $tipo_sangue = $_POST["tipo_sangue"];
    $quantidade = $_POST["quantidade"];
    $data = $_POST["data"];
    $destino = $_POST["destino"];
    $observacao = $_POST["observacao"];

    // verificar estoque
    $buscarEstoque = "SELECT quantidade FROM estoque_sangue WHERE tipo_sangue = '{$tipo_sangue}'";
    $resultadoEstoque = $conn->query($buscarEstoque);
    $dadosEstoque = $resultadoEstoque->fetch_assoc();
    $estoqueAtual = $dadosEstoque['quantidade'];

    if ($quantidade > $estoqueAtual) {

        echo "<script>
        alert('Erro: Estoque insuficiente! Disponível: {$estoqueAtual} ml');
        window.history.back();
        </script>";

    } else {

        // registrar retirada
        $sql = "INSERT INTO retiradas
                (tipo_sangue, quantidade_ml, data_retirada, destino, observacao)
                VALUES
                ('{$tipo_sangue}', '{$quantidade}', '{$data}', '{$destino}', '{$observacao}')";

        if ($conn->query($sql) === TRUE) {

            // atualizar estoque
            $updateEstoque = "UPDATE estoque_sangue
                              SET quantidade = quantidade - {$quantidade}
                              WHERE tipo_sangue = '{$tipo_sangue}'";

            $conn->query($updateEstoque);

            // ==========================
            // LOG DA RETIRADA
            // ==========================

            $funcionario = $_SESSION['usuario'];
            $ip = $_SERVER['REMOTE_ADDR'];

            $sqlLog = "INSERT INTO logs_estoque
            (funcionario, acao, tipo_sangue, quantidade, ip)
            VALUES
            ('$funcionario','RETIRADA','$tipo_sangue','$quantidade','$ip')";

            $conn->query($sqlLog);

            echo "<script>
            alert('Retirada registrada e estoque atualizado!');
            window.location.href='?page=dashboard';
            </script>";

        } else {

            echo "<script>alert('Erro: " . $conn->error . "');</script>";

        }

    }

break;


    // ==========================
    // EDITAR DOADOR
    // ==========================
    case 'editar':

        $id = $_REQUEST["id"];
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
        $ts = $_POST["ts"];
        $datedonation = $_POST["datedonation"];
        $sexo = $_POST["sexo"];
        $peso = $_POST["peso"];

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
            WHERE id={$id}";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Editado com sucesso!'); window.location.href='?page=listar';</script>";
        } else {
            echo "<script>alert('Erro: " . $conn->error . "'); window.location.href='?page=home';</script>";
        }
        break;


    // ==========================
    // EXCLUIR DOADOR
    // ==========================
    case 'excluir':

        $id = $_REQUEST["id"];
        $sql = "DELETE FROM cadastrobs WHERE id={$id}";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Usuário excluído com sucesso!'); window.location.href='?page=listar';</script>";
        } else {
            echo "<script>alert('Erro ao excluir: " . $conn->error . "'); window.location.href='?page=home';</script>";
        }
        break;

}
?>