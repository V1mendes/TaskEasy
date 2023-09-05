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

    // Lógica para limpar as tarefas selecionadas se o botão for clicado
    if (isset($_POST["limparTarefasSelecionadas"])) {
        // Obtém as tarefas selecionadas
        $tarefasSelecionadas = $_POST["tarefasSelecionadas"];

        // Filtra as tarefas originais, mantendo apenas as não selecionadas
        $tarefas = array_filter($tarefas, function ($index) use ($tarefasSelecionadas) {
            return !in_array($index, $tarefasSelecionadas);
        }, ARRAY_FILTER_USE_KEY);

        // Salva as tarefas não selecionadas no arquivo
        file_put_contents("tarefas.txt", implode("\n", $tarefas));
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
  
      <div class = "conteiner_pendentes">
      
        <p>Tarefas Pendentes</p>
        
          <ul id="tarefasOriginais" class="task_list">
            
              <?php
              foreach ($tarefas as $index => $tarefa) {
                  echo '<li data-concluida="false">';
                  echo '<input type="checkbox" class="checkbox-tarefa" data-index="' . $index . '">';
                  echo $tarefa;
                  echo '</li>';
              }
              ?>
      
          </ul>
      </div>
  
      <div class = "conteiner_concluidas">
        
        <p>Tarefas Concluídas</p>
      
        <ul id="tarefasSelecionadas" class="task_list">
            <!-- Aqui é onde as tarefas selecionadas serão movidas via JavaScript -->
        </ul>
    
  
      </div>
    </div>
    <form action="" method="post"class="task_select">
        
      <button type="submit" name="limparTarefasSelecionadas">Limpar Tarefas Concluídas</button>
          
      <input type="hidden" name="tarefasSelecionadas[]" value="">
      
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