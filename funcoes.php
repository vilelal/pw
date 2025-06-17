<?php



function lerTarefas() {
    $dados = file_get_contents('tarefas.json');
    return json_decode($dados, true);
}

function CreateTask($dados){
    
   $tarefas = lerTarefas();
    
    $novaTarefa = [
    'id' => uniqid(),
    'titulo' => $dados['titulo'],
    'descricao' => $dados['descricao'],
    'data' => $dados['data'],
    'hora' => $dados['hora']
];

    $tarefas[] = $novaTarefa;
    
    $json = json_encode($tarefas,JSON_PRETTY_PRINT);
    file_put_contents('tarefas.json', $json);
    }




    function PrintTask(){
        # Decodificando o arquivo JSON

        $tarefas = lerTarefas();

        #Apenas mostrará caso não tiver algum dado
        if ($tarefas != null){
        foreach ($tarefas as $tarefas){
            $classeStatus = strtolower(str_replace('í', 'i', $tarefas['status'])); // Remove acento para classe CSS
        echo "<div class='tarefa $classeStatus'>";
        echo "<h3>" . htmlspecialchars($tarefas['titulo']) . "</h3>";
        echo "<p><strong>Descrição:</strong> " . htmlspecialchars($tarefas['descricao']) . "</p>";
        echo "<p><strong>Data:</strong> " . htmlspecialchars($tarefas['data']) . "</p>";
        echo "<p><strong>Hora:</strong> " . htmlspecialchars($tarefas['hora']) . "</p>";
        echo "<p><strong>Status:</strong> " . htmlspecialchars($tarefas['status']) . "</p>";
        
       
        echo "<div class='acoes'>";
        echo "<form method='post' action='index.php' style='display:inline;'>";
        echo "<input type='hidden' name='acao' value='excluir'>";
        echo "<input type='hidden' name='id' value='" . $tarefas['id'] . "'>";
        echo "<button type='submit'>Excluir</button>";
        echo "</form>";
        
        echo "<a href='editar.php?id=" . $tarefas['id'] . "'>Editar</a>";
        echo "</div>";
        
        echo "</div>";
            
        }
    }else{
            echo "Não há nenhuma tarefa ainda";
        }
    }

    function UpdateTask($dados){
        $tarefas = lerTarefas();

        foreach ($tarefas as $tarefa){
            if ($tarefa['id'] === $dados['id']) {
                $tarefa['titulo'] = $dados['titulo'];
                $tarefa['descricao'] = $dados['descricao'];
                $tarefa['data'] = $dados['data'];
                $tarefa['hora'] = $dados['hora'];
                break;
            }
        }
        $json = json_encode($tarefas,JSON_PRETTY_PRINT);
        file_put_contents('tarefas.json', $json);
        header('Location: index.php');
        exit();
    }

    function DeleteTask(){
        $tarefas = lerTarefas();

    
    }
    
?>