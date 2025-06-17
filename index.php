<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de tarefas</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin:0
             auto;
            max-width: 800px;

        }

        form{
            background-color: white;
            padding: 20px;
            border-radius: 8px ;
            margin-bottom: 20px solid;
        }
    </style>
</head>


<body>

    <h1>Gerenciador de tarefas</h1>
    <br><br>
    
    
    <form action="index.php" method="post">

        <h2>Criar Tarefa</h2>

        <label for="titulo">Título: </label>
        <input type="text" placeholder="Digite a descrição da tarefa" name="titulo" id="titulo" required><br><br>
        
        <label for="descricao">Descrição: </label>
        <input type="text" placeholder="Digite a descrição da tarefa" name="descricao" id="descricao" required><br><br>

        <label for="data">Data: </label>
        <input type="date" name="data" id="data"><br><br>

        <label for="hora">Hora: </label>
        <input type="time" name="hora">

        <br><br>
        <button type="submit">Salvar tarefa</button>
        
    </form>
    


    <h2>Tarefas</h2>


    <?php
    include 'funcoes.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $acao = $_POST['acao'] ?? '';
        
        if ($acao === 'criar') {
            CreateTask($_POST);
        } elseif ($acao === 'atualizar') {
            UpdateTask($_POST);
        } elseif ($acao === 'excluir') {
            DeleteTask($_POST['id']);
        }
    }
    PrintTask();
    ?>
</body>

</html>