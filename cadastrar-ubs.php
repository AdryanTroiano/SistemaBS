<?php
require_once 'auth.php';
?>

<h1 id="path2" style="text-align:center;">Cadastrar UBS</h1>

<div class="container">
    <form action="?page=salvar_ubs" method="POST">
        <input type="hidden" name="acao" value="cadastrar_ubs">

        <div class="contentform">
            <div class="form-container">

                <div class="row">
                    <div class="column">
                        <label>Nome da UBS:<span class="required">*</span></label>
                        <input type="text" name="nome" placeholder="Ex: UBS Central" required>
                    </div>
                </div>

                <div class="column button-column">
                    <button type="submit">Cadastrar UBS</button>
                </div>

            </div>
        </div>
    </form>
</div>