<?php
require_once 'auth.php';

$acao = $_REQUEST['acao'] ?? '';

switch ($acao) {

    case 'cadastrar_ubs':
        $nome = trim($_POST['nome'] ?? '');
        $nome = mysqli_real_escape_string($conn, $nome);

        if ($nome === '') {
            echo "<script>alert('Informe o nome da UBS.'); window.history.back();</script>";
            exit;
        }

        $sql = "INSERT INTO ubs (nome) VALUES ('$nome')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('UBS cadastrada com sucesso!'); window.location.href='?page=listar_ubs';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar UBS: " . $conn->error . "'); window.history.back();</script>";
        }
        break;


    case 'editar_ubs':
        $id = intval($_POST['id'] ?? 0);
        $nome = trim($_POST['nome'] ?? '');
        $nome = mysqli_real_escape_string($conn, $nome);

        if ($id <= 0 || $nome === '') {
            echo "<script>alert('Dados inválidos.'); window.history.back();</script>";
            exit;
        }

        $sql = "UPDATE ubs SET nome = '$nome' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('UBS atualizada com sucesso!'); window.location.href='?page=listar_ubs';</script>";
        } else {
            echo "<script>alert('Erro ao editar UBS: " . $conn->error . "'); window.history.back();</script>";
        }
        break;


    case 'excluir_ubs':
        $id = intval($_GET['id'] ?? 0);

        if ($id <= 0) {
            echo "<script>alert('ID inválido.'); window.location.href='?page=listar_ubs';</script>";
            exit;
        }

        $verifica = "SELECT id FROM doacoes WHERE ubs_id = $id
                    UNION
                    SELECT id FROM retiradas WHERE ubs_id = $id";

        $res = $conn->query($verifica);

        if ($res && $res->num_rows > 0) {
            echo "<script>alert('Não é possível excluir esta UBS, pois ela já está vinculada a doações ou retiradas.'); window.location.href='?page=listar_ubs';</script>";
            exit;
        }

        $sql = "DELETE FROM ubs WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('UBS excluída com sucesso!'); window.location.href='?page=listar_ubs';</script>";
        } else {
            echo "<script>alert('Erro ao excluir UBS: " . $conn->error . "'); window.location.href='?page=listar_ubs';</script>";
        }
        break;


    default:
        echo "<script>alert('Ação inválida.'); window.location.href='?page=listar_ubs';</script>";
        break;
}
?>