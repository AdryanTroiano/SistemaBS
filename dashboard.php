<?php
require_once 'auth.php';
include('config.php');

// Consulta para buscar os tipos sanguíneos e suas respectivas quantidades
$sql = "
    SELECT ts.tipo, es.quantidade
    FROM estoque_sangue es
    INNER JOIN tipos_sangue ts ON es.tipo_sangue_id = ts.id
    ORDER BY ts.tipo
";

$result = $conn->query($sql);

$estoqueSangue = [];
$cadastrosExistem = $result && $result->num_rows > 0;

if ($cadastrosExistem) {
    while ($row = $result->fetch_assoc()) {
        $estoqueSangue[$row['tipo']] = $row['quantidade'];
    }
}
?>

<div class="dashboard">
    <h1 id="pathdash">Estoque de Sangue</h1>

    <?php if (!$cadastrosExistem): ?>
        <div id="no-data-message" style="color: red;">Nenhum cadastro encontrado.</div>
    <?php else: ?>

        <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 20px;">
            <canvas id="bloodStockChart" width="300" height="300" style="max-width: 100%; height: auto;"></canvas>
            <p id="error-message" style="color: red; display: none;">Erro ao carregar o gráfico. Verifique o console.</p>
        </div>

        <div class="blood-stock">
            <?php
            $tiposSanguineos = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];

            foreach ($tiposSanguineos as $tipo) {
                $quantidade = isset($estoqueSangue[$tipo]) ? $estoqueSangue[$tipo] : 0;

                if ($quantidade < 1000) {
                    $alerta = 'alert';
                    $mensagem = '<p class="warning">Atenção: Estoque baixo!</p>';
                } else {
                    $alerta = 'regular';
                    $mensagem = '<p class="regular">Regular</p>';
                }

                echo "<div class='blood-type $alerta' id='blood-type-" . htmlspecialchars($tipo) . "'>";
                echo "<h3>Tipo " . htmlspecialchars($tipo) . "</h3>";
                echo "<p>" . htmlspecialchars($quantidade) . " MLS</p>";
                echo $mensagem;
                echo "</div>";
            }
            ?>
        </div>

    <?php endif; ?>
</div>

<?php
$filtros = [];

if (isset($_GET['data']) && $_GET['data'] != "") {
    $data = mysqli_real_escape_string($conn, $_GET['data']);
    $filtros[] = "DATE(l.data_hora) = '$data'";
}

if (isset($_GET['mes']) && $_GET['mes'] != "") {
    $mes = mysqli_real_escape_string($conn, $_GET['mes']);
    $filtros[] = "MONTH(l.data_hora) = '$mes'";
}

if (isset($_GET['ano']) && $_GET['ano'] != "") {
    $ano = mysqli_real_escape_string($conn, $_GET['ano']);
    $filtros[] = "YEAR(l.data_hora) = '$ano'";
}

$filtroSQL = "";

if (count($filtros) > 0) {
    $filtroSQL = "WHERE " . implode(" AND ", $filtros);
}

$sqlLogs = "
    SELECT 
        l.id,
        l.acao,
        l.quantidade,
        l.data_hora,
        l.ip,
        u.usuario AS funcionario,
        ts.tipo AS tipo_sangue
    FROM logs_estoque l
    INNER JOIN usuarios u ON l.usuario_id = u.id
    INNER JOIN tipos_sangue ts ON l.tipo_sangue_id = ts.id
    $filtroSQL
    ORDER BY l.data_hora DESC
";

$resultLogs = $conn->query($sqlLogs);
?>

<h2 style="margin-top:40px;">Movimentações</h2>

<form method="GET" style="margin-bottom:20px;">
    <input type="hidden" name="page" value="dashboard">

    <label>Data:</label>
    <input type="date" name="data" value="<?= isset($_GET['data']) ? htmlspecialchars($_GET['data']) : ''; ?>">

    <label>Mês:</label>
    <select name="mes">
        <option value="">Todos</option>
        <option value="1" <?= (isset($_GET['mes']) && $_GET['mes'] == '1') ? 'selected' : ''; ?>>Janeiro</option>
        <option value="2" <?= (isset($_GET['mes']) && $_GET['mes'] == '2') ? 'selected' : ''; ?>>Fevereiro</option>
        <option value="3" <?= (isset($_GET['mes']) && $_GET['mes'] == '3') ? 'selected' : ''; ?>>Março</option>
        <option value="4" <?= (isset($_GET['mes']) && $_GET['mes'] == '4') ? 'selected' : ''; ?>>Abril</option>
        <option value="5" <?= (isset($_GET['mes']) && $_GET['mes'] == '5') ? 'selected' : ''; ?>>Maio</option>
        <option value="6" <?= (isset($_GET['mes']) && $_GET['mes'] == '6') ? 'selected' : ''; ?>>Junho</option>
        <option value="7" <?= (isset($_GET['mes']) && $_GET['mes'] == '7') ? 'selected' : ''; ?>>Julho</option>
        <option value="8" <?= (isset($_GET['mes']) && $_GET['mes'] == '8') ? 'selected' : ''; ?>>Agosto</option>
        <option value="9" <?= (isset($_GET['mes']) && $_GET['mes'] == '9') ? 'selected' : ''; ?>>Setembro</option>
        <option value="10" <?= (isset($_GET['mes']) && $_GET['mes'] == '10') ? 'selected' : ''; ?>>Outubro</option>
        <option value="11" <?= (isset($_GET['mes']) && $_GET['mes'] == '11') ? 'selected' : ''; ?>>Novembro</option>
        <option value="12" <?= (isset($_GET['mes']) && $_GET['mes'] == '12') ? 'selected' : ''; ?>>Dezembro</option>
    </select>

    <label>Ano:</label>
    <input type="text" name="ano" placeholder="2026" value="<?= isset($_GET['ano']) ? htmlspecialchars($_GET['ano']) : ''; ?>">

    <button type="submit">Filtrar</button>
</form>

<table border="1" width="100%" style="background:white;">
    <tr>
        <th>Funcionário</th>
        <th>Ação</th>
        <th>Tipo Sanguíneo</th>
        <th>Quantidade</th>
        <th>Data/Hora</th>
        <th>IP</th>
    </tr>

    <?php if ($resultLogs && $resultLogs->num_rows > 0): ?>
        <?php while ($log = $resultLogs->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($log['funcionario']); ?></td>
                <td><?= htmlspecialchars($log['acao']); ?></td>
                <td><?= htmlspecialchars($log['tipo_sangue']); ?></td>
                <td><?= htmlspecialchars($log['quantidade']); ?> ml</td>
                <td><?= date('d/m/Y H:i', strtotime($log['data_hora'])); ?></td>
                <td><?= htmlspecialchars($log['ip']); ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="6">Nenhuma movimentação encontrada.</td>
        </tr>
    <?php endif; ?>
</table>

<style>
.blood-stock {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 2%;
    margin-bottom: 20px;
}

.blood-type {
    width: 22%;
    padding: 8px;
    margin: 0;
    margin-top: 1%;
    border-radius: 5px;
    border: 1px solid #ccc;
    text-align: center;
    box-sizing: border-box;
}

.alert {
    background-color: rgba(255, 0, 0, 0.2);
    color: red;
}

.regular {
    background-color: rgba(0, 255, 0, 0.2);
    color: green;
}

.donor-info {
    margin-top: 30px;
    padding: 20px;
    background-color: #f4f4f4;
    border-radius: 8px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

@media (max-width: 768px) {
    .blood-stock {
        justify-content: space-evenly;
    }

    .blood-type {
        width: 45%;
    }
}

@media (max-width: 480px) {
    .blood-stock {
        justify-content: center;
    }

    .blood-type {
        width: 90%;
    }
}

@media (max-width: 450px) {
    .blood-stock {
        justify-content: center;
        flex-direction: column;
    }

    .blood-type {
        width: 100%;
        margin-top: 10px;
    }
}

form label {
    font-weight: 600;
    margin-right: 5px;
}

form input,
form select {
    padding: 6px 8px;
    margin-right: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

form button {
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    background-color: #c62828;
    color: white;
    font-weight: 600;
    cursor: pointer;
}

form button:hover {
    background-color: #a61d1d;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const canvas = document.getElementById('bloodStockChart');
    const errorMessage = document.getElementById('error-message');

    if (!canvas) {
        console.error("Elemento canvas não encontrado!");
        if (errorMessage) {
            errorMessage.style.display = 'block';
        }
        return;
    }

    const ctx = canvas.getContext('2d');
    let bloodStockChart = null;

    function initializeChart() {
        bloodStockChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'],
                datasets: [{
                    label: 'Mls de Sangue',
                    data: [],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 0, 0, 1)',
                        'rgba(0, 255, 0, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 0, 0, 1)',
                        'rgba(0, 255, 0, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '40%',
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    }

    function updateDashboard() {
        const estoqueSangue = <?php echo json_encode($estoqueSangue); ?>;

        if (Object.keys(estoqueSangue).length === 0) {
            console.error("Nenhum dado recebido ou dados inválidos.");
            if (errorMessage) {
                errorMessage.style.display = 'block';
            }
            return;
        }

        const quantidades = [
            estoqueSangue['A+'] || 0,
            estoqueSangue['A-'] || 0,
            estoqueSangue['B+'] || 0,
            estoqueSangue['B-'] || 0,
            estoqueSangue['AB+'] || 0,
            estoqueSangue['AB-'] || 0,
            estoqueSangue['O+'] || 0,
            estoqueSangue['O-'] || 0
        ];

        if (bloodStockChart) {
            bloodStockChart.data.datasets[0].data = quantidades;
            bloodStockChart.update();
        } else {
            initializeChart();
            bloodStockChart.data.datasets[0].data = quantidades;
            bloodStockChart.update();
        }
    }

    initializeChart();
    updateDashboard();
    setInterval(updateDashboard, 60000);
});
</script>