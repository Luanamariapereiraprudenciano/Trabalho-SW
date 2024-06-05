<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nomeAluno = $_POST["nome"];
    $comentario = $_POST["comentario"];

    
    if (empty($nomeAluno) || empty($comentario)) {
        echo "<p>Erro: Preencha todos os campos obrigatorios.</p>";
        return;
    }

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "coment";

    $conn = mysqli_connect($hostname, $username, $password, $database);
    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    $stmt = mysqli_prepare($conn, "INSERT INTO alunos (nome, comentario) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $nomeAluno, $comentario);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p>Aluno cadastrado com sucesso!</p>";
    } else {
        echo "<p>Erro ao cadastrar aluno: " . mysqli_error($conn) . "</p>";
    }
    mysqli_stmt_close($stmt);

    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coletar e Consultar Dados de Alunos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastro de Alunos</h1>

    <form action="" method="post">
        <label for="nome">Nome do Aluno:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="comentario">Comentário:</label>
        <textarea id="comentario" name="comentario" required></textarea>

        <button type="submit">Cadastrar Aluno</button>
    </form>

    <h2>Consulta de Alunos</h2>

    <form action="consulta_dados01.php" method="get">
        <label for="nomeConsulta">Nome do Aluno:</label>
        <input type="text" id="nomeConsulta" name="nome">

        <button type="submit">Consultar</button>
    </form>

    <?php

    if (isset($_GET["nome"])) {
        $nomeConsulta = $_GET["nome"];

        $conn = mysqli_connect($hostname, $username, $password, $database);

        if (!$conn) {
            die("Falha na conexão: " . mysqli_connect_error());
        }

        $sql = "SELECT nome, comentario FROM alunos WHERE nome LIKE '%$nomeConsulta%'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Resultados da Consulta para '$nomeConsulta':</h2>";
            echo '<table class="data-table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Nome</th>';
            echo '<th>Comentario</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                   echo '<td>' . $row['nome'] . '</td>';
                   echo '<td>' . nl2br($row['comentario']) . '</td>';
                   echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo "<p>Nenhum aluno encontrado com o nome '$nomeConsulta'.</p>";
        }

        mysqli_close($conn);
    }

    ?>