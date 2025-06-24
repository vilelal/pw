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
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de tarefas</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0 auto; 
            max-width: 800px;
            background-color: #f4f4f4; 
            padding: 20px; 
            box-sizing: border-box; 

        }
        
        form label {
            display: block; 
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        h1, h2 {
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

        form button[value="Criar"] {
            background-color:rgb(18, 228, 70); 
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1.1em;
            width: 100%; 
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }
        form button[value="Criar"]:hover{
            background-color:rgb(31, 187, 70);
            
        }

        form button[value="Excluir"]{
            background-color:rgb(212, 51, 51); 
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1.1em;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        form button[value="Excluir"]:hover{
            background-color:rgb(163, 39, 39);
        }

        form{
            background-color: white;
            padding: 20px;
            border-radius: 8px ;
            margin-bottom: 20px solid;
        }

        .tarefa{
            background-color: #f9f9f9;
            border: 1px solid #aaa;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 15px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .tarefa h2 {
            margin: 0 0 5px 0;
            color: #007bff;
        }

        .tarefa p {
            margin: 0;
            color: #555;
        }


        .UpdateDelete button,
        .UpdateDelete a {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9em;
            text-decoration: none;
            text-align: center;
            white-space: nowrap; /* Evita que o texto dos botões quebre */
        }
    </style>
</head>


<body>
    <div class="container">
    <h1>Gerenciador de tarefas</h1>
    
    
    <form action="index.php" method="post">

        <h2>Criar Tarefa</h2>
        <input type="hidden" name="acao" value="criar">

        <label for="titulo">Título: </label>
        <input type="text" placeholder="Digite o nome da tarefa" name="titulo" id="titulo" required>
        
        <label for="descricao">Descrição: </label>
       <textarea name="descricao" placeholder="Digite a descrição da tarefa" id="descricao"></textarea required> 

        <label for="data">Data: </label>
        <input type="date" name="data" id="data">

        <label for="hora">Hora: </label>
        <input type="time" name="hora">


        <button type="submit" value="Criar">Criar tarefa</button>
        
    </form>
    </div>
    


    <h2>Tarefas</h2>

    <?php
    PrintTask();
    ?>
</body>

</html>