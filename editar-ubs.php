<?php
require_once 'auth.php';

$id = intval($_GET['id'] ?? 0);

$sql = "SELECT * FROM ubs WHERE id = $id";
$res = $conn->query($sql);

if (!$res || $res->num_rows === 0) {
    echo "<p style='text-align:center; color:red;'>UBS não encontrada.</p>";
    exit;
}

$ubs = $res->fetch_object();
?>

<h1 id="path2" style="text-align:center;">Editar UBS</h1>

<div class="container">
    <form action="?page=salvar_ubs" method="POST">
        <input type="hidden" name="acao" value="editar_ubs">
        <input type="hidden" name="id" value="<?= $ubs->id; ?>">

        <div class="contentform">
            <div class="form-container">

                <div class="row">
                    <div class="column">
                        <label>Nome da UBS:<span class="required">*</span></label>
                        <input type="text" name="nome" value="<?= htmlspecialchars($ubs->nome); ?>" required>
                    </div>
                </div>

                <div class="column button-column">
                    <button type="submit">Salvar Alterações</button>
                </div>

            </div>
        </div>
    </form>
</div>