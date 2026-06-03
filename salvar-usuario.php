<?php

switch ($_REQUEST["acao"]) {

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
        $tipo_sangue_id = $_POST["tipo_sangue_id"];
        $sexo = $_POST["sexo"];
        $peso = $_POST["peso"];

        $sql = "INSERT INTO doadores 
                (nome, cpf, telefone, email, endereco, numero, cep, complemento, bairro, nasc, tipo_sangue_id, sexo, peso) 
                VALUES 
                ('{$nome}', '{$cpf}', '{$telefone}', '{$email}', '{$endereco}', '{$numero}', '{$cep}', '{$complemento}', '{$bairro}', '{$nasc}', '{$tipo_sangue_id}', '{$sexo}', '{$peso}')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='?page=listar';</script>";
        } else {
            echo "<script>alert('Erro: " . $conn->error . "'); window.location.href='?page=home';</script>";
        }
        break;


    case 'cadastrar_doacao':

        $doador_id = $_POST["doador_id"];
        $ubs_id = $_POST["ubs_id"];
        $data_doacao = $_POST["data_doacao"];
        $quantidade_ml = $_POST["quantidade_ml"];

        $buscarTS = "SELECT tipo_sangue_id FROM doadores WHERE id = '{$doador_id}'";
        $resultadoTS = $conn->query($buscarTS);
        $dadosTS = $resultadoTS->fetch_assoc();
        $tipo_sangue_id = $dadosTS['tipo_sangue_id'];

        $sql = "INSERT INTO doacoes 
                (doador_id, ubs_id, data_doacao, quantidade_ml)
                VALUES 
                ('{$doador_id}', '{$ubs_id}', '{$data_doacao}', '{$quantidade_ml}')";

        if ($conn->query($sql) === TRUE) {

            $update = "UPDATE doadores
                       SET datedonation = '{$data_doacao}' 
                       WHERE id = '{$doador_id}'";
            $conn->query($update);

            $atualizarEstoque = "UPDATE estoque_sangue 
                                 SET quantidade = quantidade + {$quantidade_ml}
                                 WHERE tipo_sangue_id = '{$tipo_sangue_id}'";
            $conn->query($atualizarEstoque);

            $usuario_id = $_SESSION['usuario_id'];
            $ip = $_SERVER['REMOTE_ADDR'];

            $sqlLog = "INSERT INTO logs_estoque
                       (usuario_id, acao, tipo_sangue_id, quantidade, ip)
                       VALUES
                       ('$usuario_id', 'DOACAO', '$tipo_sangue_id', '$quantidade_ml', '$ip')";
            $conn->query($sqlLog);

            echo "<script>alert('Doação cadastrada e estoque atualizado!'); window.location.href='?page=listar_doacoes';</script>";

        } else {
            echo "<script>alert('Erro: " . $conn->error . "'); window.location.href='?page=home';</script>";
        }

        break;


    case 'cadastrar_retirada':

        $tipo_sangue_id = $_POST["tipo_sangue_id"];
        $quantidade = $_POST["quantidade"];
        $data = $_POST["data"];
        $ubs_id = $_POST["ubs_id"];
        $observacao = $_POST["observacao"];

        $buscarEstoque = "SELECT quantidade FROM estoque_sangue WHERE tipo_sangue_id = '{$tipo_sangue_id}'";
        $resultadoEstoque = $conn->query($buscarEstoque);
        $dadosEstoque = $resultadoEstoque->fetch_assoc();
        $estoqueAtual = $dadosEstoque['quantidade'];

        if ($quantidade > $estoqueAtual) {

            echo "<script>
                alert('Erro: Estoque insuficiente! Disponível: {$estoqueAtual} ml');
                window.history.back();
            </script>";

        } else {

            $sql = "INSERT INTO retiradas
                    (tipo_sangue_id, quantidade_ml, data_retirada, ubs_id, observacao)
                    VALUES
                    ('{$tipo_sangue_id}', '{$quantidade}', '{$data}', '{$ubs_id}', '{$observacao}')";

            if ($conn->query($sql) === TRUE) {

                $updateEstoque = "UPDATE estoque_sangue
                                  SET quantidade = quantidade - {$quantidade}
                                  WHERE tipo_sangue_id = '{$tipo_sangue_id}'";
                $conn->query($updateEstoque);

                $usuario_id = $_SESSION['usuario_id'];
                $ip = $_SERVER['REMOTE_ADDR'];

                $sqlLog = "INSERT INTO logs_estoque
                           (usuario_id, acao, tipo_sangue_id, quantidade, ip)
                           VALUES
                           ('$usuario_id', 'RETIRADA', '$tipo_sangue_id', '$quantidade', '$ip')";
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
        $tipo_sangue_id = $_POST["tipo_sangue_id"];
        $datedonation = $_POST["datedonation"];
        $sexo = $_POST["sexo"];
        $peso = $_POST["peso"];

        $sql = "UPDATE doadores SET
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
                tipo_sangue_id='{$tipo_sangue_id}',
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


    case 'excluir':

        $id = $_REQUEST["id"];
        $sql = "DELETE FROM doadores WHERE id={$id}";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Usuário excluído com sucesso!'); window.location.href='?page=listar';</script>";
        } else {
            echo "<script>alert('Erro ao excluir: " . $conn->error . "'); window.location.href='?page=home';</script>";
        }
        break;
}
?>