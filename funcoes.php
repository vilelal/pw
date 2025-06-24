<?php

// definindo o file tarefas.json como Task_File
define ('Task_File', 'tarefas.json');

//Função para ler as tarefas dentro do json tarefas.json
function lerTarefas() {
    $dados = file_get_contents(Task_File);
    return json_decode($dados, true);
}

//função para criar tarefa
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
    file_put_contents(Task_File, $json);
    header('Location: index.php');
    exit();
    }



//Função para mostrar as tarefas
    function PrintTask(){
        

        $tarefas = lerTarefas();

        // Apenas mostrará caso não tiver nenhuma tarefa
        if (!empty($tarefas)){

        //Para cada tarefa será mostrado sua informação e dois botões, um para excluir e outro para editar
        foreach ($tarefas as $tarefa){
        echo "<div class='tarefa'>";
        echo "<h2>" . $tarefa['titulo'] . "</h2>";
        echo "<p><strong>Descrição:</strong> " . ($tarefa['descricao']) . "</p>";
        echo "<p><strong>Data:</strong> " . ($tarefa['data']) . "</p>";
        echo "<p><strong>Hora:</strong> " . ($tarefa['hora']) . "</p>";
        
       // Div para os dois botões, update e delete
        echo "<div class='UpdateDelete'>";
        echo "<form method='post' action='index.php' style='display:inline;'>";
        echo "<input type='hidden' name='acao' value='excluir'>";
        echo "<input type='hidden' name='id' value='" . $tarefa['id'] . "'>";
        echo "<button type='submit' value='Excluir'>Excluir</button>";
        echo "</form>";
        
        echo "<a href='editar.php?id=" . $tarefa['id'] . "'>Editar</a>";
        echo "</div>";
        echo "</div>";
            
        }
    }else{

            echo "<br><h2>Não há nenhuma tarefa ainda </h2>";
        }
    }

    function UpdateTask($dados){
        $tarefas = lerTarefas();

        foreach ($tarefas as $tarefa){
            if ($tarefa['id'] == $dados['id']) {
                $tarefa['titulo'] = $dados['titulo'];
                $tarefa['descricao'] = $dados['descricao'];
                $tarefa['data'] = $dados['data'];
                $tarefa['hora'] = $dados['hora'];
                break;
            }
        }
        $json = json_encode($tarefas,JSON_PRETTY_PRINT);
        file_put_contents(Task_File, $json);
        exit();
    }

    function DeleteTask($id){
        $tarefas = lerTarefas();
    
        $tarefas = array_filter($tarefas, function($tarefa) use ($id) {
            return $tarefa['id'] !== $id;
        });


         $json = json_encode($tarefas,JSON_PRETTY_PRINT);
        file_put_contents(Task_File, $json);

        header('Location: index.php');
        exit();
    
    }
    
?>