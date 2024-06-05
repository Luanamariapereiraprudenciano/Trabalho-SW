<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boas-Vindas</title>
    <style>
        /*Estilo CSS para a aparência da página*/
        body{
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form{
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rdba(0, 0, 0, 0.1;);
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }
        button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer:
        }
        </style>
</head>
<body>
    <h1> 3 Técnico em informática 3 </h1>
    <!-- Formulário HTML -->
    <form action="" method="post">
        <label for="nome">Otavio:</label>
        <input type="text" id="nome" name="nome" required>

        <button type="submit">Enviar</button>
    </form>

    <?php
    // Verifica se existem dados enviados via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtém o nome do formulário
        $nome = $_POST["nome"];

        // Exibe uma mensagem de boas-vindas
        echo "<p>Bem-vindo, $nome!</p>";
    }
    ?>

</body>
</html>