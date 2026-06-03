<?php
require_once 'auth.php';

$sql = "SELECT * FROM ubs ORDER BY nome ASC";
$res = $conn->query($sql);
?>

<h1 id="path2" style="text-align:center;">Listar UBS</h1>
<br>

<div style="display:flex; justify-content:center;">
<table class="table" style="width:80%; max-width:800px;">
    <thead>
        <tr>
            <th style="text-align:center;">Nome</th>
            <th style="text-align:center;">Ações</th>
        </tr>
    </thead>

    <tbody>
        <?php if ($res && $res->num_rows > 0): ?>
            <?php while ($ubs = $res->fetch_object()): ?>
                <tr>
                    <td style="text-align:center;">
                        <?= htmlspecialchars($ubs->nome); ?>
                    </td>

                    <td style="text-align:center;">
                        <button onclick="location.href='?page=editar_ubs&id=<?= $ubs->id; ?>';" class="btn btn-success">
                            Editar
                        </button>

                        <button onclick="if(confirm('Tem certeza que deseja excluir esta UBS?')) location.href='?page=salvar_ubs&acao=excluir_ubs&id=<?= $ubs->id; ?>';" class="btn btn-danger">
                            Excluir
                        </button>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="2" style="text-align:center;">Nenhuma UBS cadastrada.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</div>