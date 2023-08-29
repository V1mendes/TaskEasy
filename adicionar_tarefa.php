<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novaTarefa = $_POST["nova_tarefa"];
    if (!empty($novaTarefa)) {
        file_put_contents("tarefas.txt", "$novaTarefa\n", FILE_APPEND);
    }
    header("Location: home.html");
    exit();
}
?>