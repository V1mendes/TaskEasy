<?php
$tarefasPendentes = array();

if (file_exists("tarefas.txt")) {
    $tarefas = file("tarefas.txt", FILE_IGNORE_NEW_LINES);

    foreach ($tarefas as $tarefa) {
        $tarefasPendentes[] = $tarefa;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["novaTarefa"])) {

        $novaTarefa = $_POST["novaTarefa"];

        if (!empty($novaTarefa)) {
            $tarefasPendentes[] = $novaTarefa;

            file_put_contents("tarefas.txt", implode("\n", $tarefasPendentes));
        }
    }
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
    <nav>
        <ul class="nav_title">
            <li>TASKEASY</li>
        </ul>
    </nav>

    <form action="" method="post" class="add_task">
        <input type="text" id="novaTarefa" name="novaTarefa" placeholder="Digite uma nova tarefa">
        <button id="adicionarBtn">Adicionar</button>
    </form>

    <div class=conteiner>
        <div class="conteiner_pendentes">
            <p>Tarefas Pendentes</p>
            <ul id="tarefasOriginais" class="task_list">
                <?php
                foreach ($tarefasPendentes as $index => $tarefa) {
                    echo '<li>';
                    echo '<input type="checkbox" class="checkbox-tarefa" data-index="' . $index . '">';
                    echo $tarefa;
                    echo '</li>';
                }
                ?>
            </ul>
        </div>

        <div class="conteiner_concluidas">
            <p>Tarefas Concluídas</p>
            <ul id="tarefasSelecionadas" class="task_list">

            </ul>
            <button id="excluirTarefasBtn">Excluir</button>
        </div>



    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const checkboxTarefas = document.querySelectorAll(".checkbox-tarefa");
            const tarefasOriginaisList = document.getElementById("tarefasOriginais");
            const tarefasSelecionadasList = document.getElementById("tarefasSelecionadas");
            const excluirTarefasBtn = document.getElementById("excluirTarefasBtn");

            checkboxTarefas.forEach(function (checkbox) {
                checkbox.addEventListener("change", function () {
                    const listItem = this.parentNode;

                    if (this.checked) {
                        listItem.remove();
                        tarefasSelecionadasList.appendChild(listItem);
                    } else {
                        listItem.remove();
                        tarefasOriginaisList.appendChild(listItem);
                    }
                });
            });

            excluirTarefasBtn.addEventListener("click", function () {
                const tarefasSelecionadas = document.querySelectorAll(".checkbox-tarefa:checked");

                tarefasSelecionadas.forEach(function (checkbox) {
                    const listItem = checkbox.parentNode;
                    listItem.remove();
                });
            });
        });

    </script>
</body>

</html>