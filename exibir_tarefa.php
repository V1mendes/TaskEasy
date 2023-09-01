<ul>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["adicionar"])) {

    $novaTarefa = $_POST["nova_tarefa"];

    if (!empty($novaTarefa)) {
        $tarefas = file_exists("tarefas.txt") ? file("tarefas.txt", FILE_IGNORE_NEW_LINES) : [];
        $tarefas[] = $novaTarefa;
        file_put_contents("tarefas.txt", implode("\n", $tarefas));
    }
}

if (file_exists("tarefas.txt")) {
    $tarefas = file("tarefas.txt", FILE_IGNORE_NEW_LINES);
    foreach ($tarefas as $tarefa) {
        echo "<li><input type='checkbox'> $tarefa</li>";
    }
}
?>
</ul>