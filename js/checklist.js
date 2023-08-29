document.addEventListener("DOMContentLoaded", function () {
    const adicionarBtn = document.getElementById("adicionarBtn");
    adicionarBtn.addEventListener("click", adicionarTarefa);

    function adicionarTarefa() {
        const novaTarefaInput = document.getElementById("novaTarefa");
        const novaTarefa = novaTarefaInput.value.trim();

        if (novaTarefa !== "") {
            const listaTarefas = document.getElementById("listaTarefas");
            const novaTarefaItem = document.createElement("li");
            novaTarefaItem.innerHTML = `<input type="checkbox"> ${novaTarefa}`;
            listaTarefas.appendChild(novaTarefaItem);
            novaTarefaInput.value = "";
        }
    }
});