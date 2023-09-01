<?php
$tarefas = array();

// Carrega as tarefas do arquivo
if (file_exists("tarefas.txt")) {
    $tarefas = file("tarefas.txt", FILE_IGNORE_NEW_LINES);
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém a nova tarefa do formulário
    $novaTarefa = $_POST["novaTarefa"];

    // Adicione a nova tarefa ao array de tarefas
    if (!empty($novaTarefa)) {
        $tarefas[] = $novaTarefa;

        // Salva as tarefas no arquivo
        file_put_contents("tarefas.txt", implode("\n", $tarefas));
    }
}

// Lógica para limpar as tarefas se o botão for clicado
if (isset($_POST["limparTarefas"])) {
    $tarefas = array();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

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
        <nav>
            <ul class="nav">
                <li><img src="assets/icons/icon_saida.png" alt="" href="index.html"></li>
                <li><a href="index.html">TASKEASY</a></li>
                <li><img src="assets/icons/icon_perfil.png" alt=""></li>
            </ul>
        </nav>
    </header>

    <form action="" method="post" class="add_task">
        <input type="text" id="novaTarefa" name="novaTarefa" placeholder="Digite uma nova tarefa">
        <button id="adicionarBtn">Adicionar</button>
    </form>

    <h2>Suas Tarefas</h2>
    <ul id="tarefasOriginais">
        <?php
        foreach ($tarefas as $index => $tarefa) {
            echo '<li data-concluida="false">';
            echo '<input type="checkbox" class="checkbox-tarefa" data-index="' . $index . '">';
            echo $tarefa;
            echo '</li>';
        }
        ?>
    </ul>

    <h2>Tarefas Selecionadas</h2>
    <ul id="tarefasSelecionadas">
        <!-- Aqui é onde as tarefas selecionadas serão movidas via JavaScript -->
    </ul>

    <form action="" method="post">
        <button type="submit" name="limparTarefas">Limpar Tarefas</button>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const checkboxTarefas = document.querySelectorAll(".checkbox-tarefa");
            const tarefasOriginaisList = document.getElementById("tarefasOriginais");
            const tarefasSelecionadasList = document.getElementById("tarefasSelecionadas");

            checkboxTarefas.forEach(function (checkbox) {
                checkbox.addEventListener("change", function () {
                    const listItem = this.parentNode;
                    const isConcluida = listItem.getAttribute("data-concluida") === "true";

                    if (this.checked) {
                        if (isConcluida) {
                            this.checked = true; // Impede que tarefas concluídas sejam movidas de volta
                        } else {
                            listItem.setAttribute("data-concluida", "true");
                            tarefasSelecionadasList.appendChild(listItem);
                        }
                    } else {
                        if (isConcluida) {
                            this.checked = true; // Impede que tarefas concluídas sejam movidas de volta
                        } else {
                            listItem.setAttribute("data-concluida", "false");
                            tarefasOriginaisList.appendChild(listItem);
                        }
                    }
                });
            });
        });

    </script>


</body>

</html>