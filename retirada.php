<?php
require_once 'auth.php';
require_once 'config.php';

$tipos = $conn->query("
    SELECT id, tipo
    FROM tipos_sangue
    ORDER BY tipo
");

$ubs = $conn->query("
    SELECT id, nome
    FROM ubs
    ORDER BY nome
");
?>

<style>
.retirada-container {
    max-width: 800px;
    margin: 10px auto;
    padding: 30px;
    border-radius: 8px;
}

.retirada-container .row {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
}

.retirada-container .column {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.retirada-container label {
    margin-bottom: 6px;
    font-weight: 600;
}

.retirada-container input,
.retirada-container textarea,
.retirada-container select {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
}

.retirada-container textarea {
    min-height: 80px;
}

.retirada-container .button-column {
    display: flex;
    justify-content: flex-end;
}

#path7 {
    text-decoration-line: underline;
    margin: 0 10%;
    padding-top: 2rem;
    margin-bottom: 1rem;
    width: auto;
    box-sizing: border-box;
    text-align: center;
}
</style>

<div class="retirada-container">

<form action="sistema.php?page=salvar" method="POST">

<input type="hidden" name="acao" value="cadastrar_retirada">

<h1 id="path7">Cadastrar Retirada</h1>

<div class="row">
    <div class="column">
        <label>Tipo sanguíneo:<span class="required">*</span></label>

        <select name="tipo_sangue_id" required>
            <option value="">Selecione</option>

            <?php while($tipo = $tipos->fetch_assoc()) { ?>
                <option value="<?= $tipo['id']; ?>">
                    <?= htmlspecialchars($tipo['tipo']); ?>
                </option>
            <?php } ?>

        </select>
    </div>
</div>

<div class="row">
    <div class="column">
        <label>Quantidade (ml):<span class="required">*</span></label>
        <input type="number" name="quantidade" min="1" required>
    </div>

    <div class="column">
        <label>Data:<span class="required">*</span></label>
        <input type="date" name="data" required>
    </div>
</div>

<div class="row">
    <div class="column">
        <label>UBS Destino:<span class="required">*</span></label>

        <select name="ubs_id" required>
            <option value="">Selecione</option>

            <?php while($u = $ubs->fetch_assoc()) { ?>
                <option value="<?= $u['id']; ?>">
                    <?= htmlspecialchars($u['nome']); ?>
                </option>
            <?php } ?>

        </select>
    </div>
</div>

<div class="row">
    <div class="column">
        <label>Observação:</label>
        <textarea name="observacao"></textarea>
    </div>
</div>

<div class="row button-column">
    <button type="submit">Registrar Retirada</button>
</div>

</form>

</div>