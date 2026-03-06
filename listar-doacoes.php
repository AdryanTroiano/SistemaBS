<?php
require_once 'auth.php';
?>

<h1 id="path2" style="text-align: center;">Listar Doações</h1>
<br>

<div class="search-container" style="display: flex; justify-content: center;">
    <input type="text" id="searchInput" placeholder="Buscar por doador" class="form-control" onkeyup="filterTable()" style="width: 300px;">
    <button onclick="clearSearch()" class="btnlimp">Limpar</button>
</div>

<script>
function filterTable() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    const table = document.getElementById('dataTable');
    const tr = table.getElementsByTagName('tr');

    for (let i = 1; i < tr.length; i++) {
        const td = tr[i].getElementsByTagName('td')[0];
        if (td) {
            const txtValue = td.textContent || td.innerText;
            tr[i].style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? "" : "none";
        }
    }
}

function clearSearch() {
    document.getElementById('searchInput').value = '';
    filterTable();
}
</script>

<br>

<div style="display: flex; justify-content: center;">
<table class='table' id="dataTable" style="width: 90%; max-width: 1000px;">

<thead>
<tr>
<th style="text-align:center;">Doador</th>
<th style="text-align:center;">UBS</th>
<th style="text-align:center;">Data</th>
<th style="text-align:center;">Quantidade (ml)</th>
</tr>
</thead>

<tbody>

<?php

$sql = "SELECT d.*, c.nome AS doador, u.nome AS ubs
        FROM doacoes d
        LEFT JOIN cadastrobs c ON d.doador_id = c.id
        LEFT JOIN ubs u ON d.ubs_id = u.id
        ORDER BY d.data_doacao DESC";

$res = $conn->query($sql);
$qtd = $res->num_rows;

if ($qtd > 0) {

    while ($row = $res->fetch_object()) {

        echo "<tr>";

        echo "<td style='text-align:center;'>".htmlspecialchars($row->doador)."</td>";

        echo "<td style='text-align:center;'>".htmlspecialchars($row->ubs)."</td>";

        echo "<td style='text-align:center;'>".date("d/m/Y", strtotime($row->data_doacao))."</td>";

        echo "<td style='text-align:center;'>".$row->quantidade_ml."</td>";

        echo "</tr>";
    }

} else {

echo "<tr>
<td colspan='4' class='text-center alert alert-danger'>
Não há doações registradas!
</td>
</tr>";

}

?>

</tbody>
</table>
</div>

