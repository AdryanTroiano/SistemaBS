<?php

require_once 'auth.php';
require_once 'config.php';

// Buscar doadores
$doadorQuery = mysqli_query($conn, "SELECT id, nome FROM cadastrobs ORDER BY nome ASC");

// Buscar UBS
$ubsQuery = mysqli_query($conn, "SELECT id, nome FROM ubs");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastrar Doação</title>
</head>
<body>

<div class="container">
    <h1 id="path2">Cadastrar Doação</h1>

    <!-- 🔥 AQUI ESTÁ A CORREÇÃO -->
    <form action="sistema.php?page=salvar" method="POST">
        <input type="hidden" name="acao" value="cadastrar_doacao">

        <div class="contentform">
            <div class="form-container">

                <!-- PESQUISA DOADOR -->
                <div class="row">
                    <div class="column">
                        <label>Pesquisar Doador</label>
                        <input type="text" id="pesquisaDoador" placeholder="Digite o nome para buscar...">
                    </div>
                </div>

                <!-- DOADOR -->
                <div class="row">
                    <div class="column">
                        <label>Doador<span class="required">*</span></label>
                        <select name="doador_id" id="selectDoador" required>
                            <option value="" disabled selected>Selecione o doador</option>
                            <?php while($doador = mysqli_fetch_assoc($doadorQuery)) { ?>
                                <option value="<?= $doador['id']; ?>">
                                    <?= $doador['nome']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <!-- UBS -->
                <div class="row">
                    <div class="column">
                        <label>UBS<span class="required">*</span></label>
                        <select name="ubs_id" required>
                            <option value="" disabled selected>Selecione a UBS</option>
                            <?php while($ubs = mysqli_fetch_assoc($ubsQuery)) { ?>
                                <option value="<?= $ubs['id']; ?>">
                                    <?= $ubs['nome']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <!-- DATA -->
                <div class="row">
                    <div class="column">
                        <label>Data da Doação<span class="required">*</span></label>
                        <input type="date" name="data_doacao" required>
                    </div>
                </div>

                <!-- QUANTIDADE -->
                <div class="row">
                    <div class="column">
                        <label>Quantidade (ml)<span class="required">*</span></label>
                        <input type="number" name="quantidade_ml" min="1" required>
                    </div>
                </div>

                <div class="column button-column">
                    <button type="submit">Cadastrar Doação</button>
                </div>

            </div>
        </div>
    </form>
</div>

<script>
// Filtro em tempo real do select
document.getElementById("pesquisaDoador").addEventListener("keyup", function() {
    let filtro = this.value.toLowerCase();
    let options = document.getElementById("selectDoador").options;

    for (let i = 0; i < options.length; i++) {
        let texto = options[i].text.toLowerCase();
        options[i].style.display = texto.includes(filtro) ? "" : "none";
    }
});
</script>

</body>
</html>