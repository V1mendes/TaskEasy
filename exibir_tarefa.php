<ul>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $novaTarefa = $_POST["nova_tarefa"];
        if (!empty($novaTarefa)) {
            file_put_contents("tarefas.txt", "$novaTarefa\n", FILE_APPEND);
        }
    }

    $tarefas = file("tarefas.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($tarefas as $tarefa) {
        echo "<li><input type='checkbox'> $tarefa</li>";
    }
    ?>
</ul>
