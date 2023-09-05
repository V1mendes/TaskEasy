<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["Nome"];
    $email = $_POST["Email"];
    $senha = $_POST["Senha"];
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TaskEasy</title>
    <link rel="stylesheet" href="assets/css/cadastro.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="stylesheet" href="assets/css/reset.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
</head>

<body>
    <header>
        <ul>
            <li>
                <a href="">Logo</a>
            </li>
        </ul>
    </header>
    <main>
        <div id="campos" class="center">
            <h1>Cadastre-se</h1>
            <form action="" method="post">
                <input type="text" name="Nome" size="60" placeholder="Nome completo" required
                    oninvalid="this.setCustomValidity('Este campo é obrigatório.!')"
                    oninput="setCustomValidity('')" /><br />
                <input type="text" name="Email" size="60" placeholder="Email" required
                    oninvalid="this.setCustomValidity('Este campo é obrigatório.')"
                    oninput="setCustomValidity('')" /><br />
                <div id="senha-container">
                    <input type="password" name="Senha" size="60" placeholder="Senha" id="senha" required
                        oninvalid="this.setCustomValidity('Este campo é obrigatório.')"
                        oninput="setCustomValidity('')" />
                    <button type="button" id="eyeButton"></button>
                </div>
                <br />
                <button id="Cadastro" class="button button1">Continuar</button>
            </form>
        </div>
    </main>
    <script>
        document
            .getElementById("eyeButton")
            .addEventListener("click", function () {
                var senhaInput = document.getElementById("senha");
                if (senhaInput.type === "password") {
                    senhaInput.type = "text";
                } else {
                    senhaInput.type = "password";
                }
            });
    </script>
</body>

</html>