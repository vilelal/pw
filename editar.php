<?php

include 'funcoes.php';

$editarTarefa = null;
$id = $_GET['id'] ?? '';
$tarefas = lerTarefas();


foreach ($tarefas as $tarefa) {
   if ($tarefa['id'] === $id) {
    $editarTarefa = $tarefa;
        break;
   }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar tarefa</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0 auto;
            max-width: 800px;
            background-color: rgba(231, 228, 228, 0.69);
            padding: 20px;
            box-sizing: border-box;

        }

        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        h1,
        h2 {
            text-align: center;
            color: #333;
            margin-top: 0;
            margin-bottom: 20px;
        }

        form textarea {
            resize: vertical;
            min-height: 80px;
        }

        form input[type="text"],
        form input[type="date"],
        form input[type="time"],
        form textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1em;
        }

        form button[value="atualizarBotao"] {
            background-color: rgb(18, 228, 70);
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1.1em;
            width: 25%;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        form button[value="atualizarBotao"]:hover {
            background-color: rgb(31, 187, 70);

        }

        .voltarBotao {
            display: inline-block;
            padding: 10px 20px;
            background-color: rgb(212, 51, 51);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: 1px solid background-color:rgb(212, 51, 51);
            font-family: Arial, sans-serif;
            font-size: 1.1em;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .voltarBotao:hover {
            background-color: rgb(163, 39, 39);
        }
    </style>
</head>

<body>
    <form method="POST" action="index.php">
        <h2>Editar tarefa</h2>

        <!--Definindo um input escodido para o usuario e atribuindo à acao um valor de atualizar-->
        <input type="hidden" name="acao" value="atualizar">
        <input type="hidden" name="id" value="<?php echo $editarTarefa['id'] ?>">

        <label for="titulo">Título:</label>

        <!--puxando no array os campos da tarefa-->
        <input type="text" id="titulo" name="titulo" value="<?php echo $editarTarefa['titulo'] ?>" required>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required><?php echo $editarTarefa['descricao'] ?></textarea>

        <label for="data">Data:</label>
        <input type="date" id="data" name="data" value="<?php echo $editarTarefa['data'] ?>">

        <label for="hora">Hora:</label>
        <input type="time" id="hora" name="hora" value="<?php echo $editarTarefa['hora'] ?>">

        <button type="submit" name="atualizarBotao" value="atualizarBotao">Atualizar tarefa</button>
        <a href="index.php" class="voltarBotao">Voltar</a>
    </form>
</body>

</html>