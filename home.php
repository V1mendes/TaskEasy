<?php 
include_once("conexao.php")
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskEasy</title>
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/reset.css">
</head>

<body>

    <header>
        <div>
            <ul class="nav">
                <li><img src="assets/icons/icon_saida.png" alt="" href="index.html"></li>
                <li><a href="index.html">TASKEASY</a></li>
                <li><img src="assets/icons/icon_perfil.png" alt=""></li>
            </ul>
        </div>
    </header>

    <form action="" method="post" class="add_task">

        <div class="input_task">
            <input type="text" id="novaTarefa" placeholder="Digite uma nova tarefa">
        </div>

        <div class="button_add">
            <button id="adicionarBtn">Adicionar</button>
        </div>

    </form>

    <h2>Suas Tarefas</h2>
    <?php include 'exibir_tarefas.php'; ?>

</body>

</html>