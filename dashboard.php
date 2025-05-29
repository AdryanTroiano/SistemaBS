

<?php
  
require_once 'auth.php';
  
include('config.php'); // Inclui a conexão com o banco de dados

// Consulta para buscar os tipos sanguíneos e suas respectivas quantidades
$sql = "SELECT tipo_sangue, quantidade FROM estoque_sangue";
$result = $conn->query($sql);

$estoqueSangue = [];
$cadastrosExistem = $result->num_rows > 0; // Verifica se há registros na tabela

if ($cadastrosExistem) {
    // Preenche o array com os tipos sanguíneos e quantidades
    while ($row = $result->fetch_assoc()) {
        $estoqueSangue[$row['tipo_sangue']] = $row['quantidade'];
    }
}
?>

<!-- Novo painel de dashboard -->
<div class="dashboard">
    <h1 id="pathdash">Estoque de Sangue</h1>

    <!-- Mensagem para ausência de cadastros -->
    <?php if (!$cadastrosExistem): ?>
        <div id="no-data-message" style="color: red;">Nenhum cadastro encontrado.</div>
    <?php else: ?>
        <!-- Canvas para o gráfico com aviso de erro -->
        <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 20px;">
            <canvas id="bloodStockChart" width="300" height="300" style="max-width: 100%; height: auto;"></canvas>
            <p id="error-message" style="color: red; display: none;">Erro ao carregar o gráfico. Verifique o console.</p>
        </div>

        <div class="blood-stock">
            <?php
            $tiposSanguineos = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
            foreach ($tiposSanguineos as $tipo) {
                $quantidade = isset($estoqueSangue[$tipo]) ? $estoqueSangue[$tipo] : 0;
                $alerta = '';
                $mensagem = '';

                if ($quantidade < 8) {
                    $alerta = 'alert'; // Classe de alerta se o estoque for baixo
                    $mensagem = '<p class="warning">Atenção: Estoque baixo!</p>';
                } else {
                    $alerta = 'regular'; // Classe para estoque regular
                    $mensagem = '<p class="regular">Regular</p>';
                }

                echo "<div class='blood-type $alerta' id='blood-type-$tipo'>";
                echo "<h3>Tipo $tipo</h3>";
                echo "<p>$quantidade bolsas</p>";
                echo $mensagem;
                echo "</div>";
            }
            ?>
        </div>
        <a id="linkdash" href="?page=editestoque">
    <button type="button" id="enviar2">Atualizar Estoque</button>
</a>       

    <?php endif; ?>
</div>

<style>
.blood-stock {
    display: flex;
    flex-wrap: wrap; /* Permite que os elementos se quebrem para a próxima linha */
    justify-content: center; /* Alinha os itens ao centro */
    gap: 2%; /* Espaçamento reduzido entre os elementos (vertical) */
    margin-bottom: 20px;
}

.blood-type {
    width: 22%; /* Largura fixa de 22% para garantir que todos os itens tenham o mesmo tamanho */
    padding: 8px; /* Ajuste no padding */
    margin: 0; /* Removido qualquer margem externa */
    margin-top: 1%;
    border-radius: 5px;
    border: 1px solid #ccc;
    text-align: center; /* Centraliza o texto dentro dos itens */
    box-sizing: border-box; /* Garante que o padding e a borda sejam incluídos no tamanho final */
}

/* Alerta com fundo vermelho */
.alert {
    background-color: rgba(255, 0, 0, 0.2); /* Fundo vermelho para alerta */
    color: red;
}

/* Estoque regular com fundo verde */
.regular {
    background-color: rgba(0, 255, 0, 0.2); /* Fundo verde para estoque regular */
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

/* Responsividade para telas pequenas */
@media (max-width: 768px) {
    .blood-stock {
        justify-content: space-evenly; /* Melhor distribuição para telas médias */
    }

    .blood-type {
        width: 45%; /* 2 itens por linha em telas médias */
    }
}

@media (max-width: 480px) {
    .blood-stock {
        justify-content: center; /* Alinha ao centro para telas muito pequenas */
    }

    .blood-type {
        width: 90%; /* 1 item por linha em telas muito pequenas */
    }
}

/* Responsividade para telas muito pequenas (abaixo de 450px) */
@media (max-width: 450px) {
    .blood-stock {
        justify-content: center; /* Centraliza os itens */
        flex-direction: column;  /* Alinha os itens em uma coluna */
    }

    .blood-type {
        width: 100%; /* Faz com que cada item ocupe toda a largura da tela */
        margin-top: 10px; /* Adiciona um pequeno espaçamento entre os itens */
    }
}





</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const canvas = document.getElementById('bloodStockChart');
    const errorMessage = document.getElementById('error-message');
    
    if (!canvas) {
        console.error("Elemento canvas não encontrado!");
        errorMessage.style.display = 'block';
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
                    label: 'Bolsas de Sangue',
                    data: [], // Dados inicialmente vazios
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',   // A+
                        'rgba(54, 162, 235, 1)',   // A-
                        'rgba(255, 206, 86, 1)',    // B+
                        'rgba(75, 192, 192, 1)',    // B-
                        'rgba(153, 102, 255, 1)',   // AB+
                        'rgba(255, 159, 64, 1)',    // AB-
                        'rgba(255, 0, 0, 1)',        // O+ 
                        'rgba(0, 255, 0, 1)'         // O- 
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
                maintainAspectRatio: false, // Permite que a altura do gráfico seja ajustada
                cutout: '40%', // valor para aumentar ou diminuir a parte interna da torta
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    }

    function updateDashboard() {
        // Atualiza os dados diretamente do PHP
        const estoqueSangue = <?php echo json_encode($estoqueSangue); ?>;

        // Verifica se os dados são válidos
        if (Object.keys(estoqueSangue).length === 0) {
            console.error("Nenhum dado recebido ou dados inválidos.");
            errorMessage.style.display = 'block';
            return;
        }

        // Monta o array com as quantidades para o gráfico
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

        console.log("Quantidades para o gráfico:", quantidades);

        // Atualiza o gráfico
        if (bloodStockChart) {
            bloodStockChart.data.datasets[0].data = quantidades;
            bloodStockChart.update();
        } else {
            initializeChart();
            bloodStockChart.data.datasets[0].data = quantidades;
            bloodStockChart.update();
        }
    }

    // Inicializa o dashboard e gráfico imediatamente
    initializeChart();
    updateDashboard();
    setInterval(updateDashboard, 60000); // Atualiza a cada 60 segundos
});
</script>
