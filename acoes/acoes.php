<?php
    session_start();

    require('./conexao.php');

    //atualizar tarefa FAZER ----> FAZENDO
    if(isset($_POST['tarefa_fazer'])){
        //valor do id da tarefa pego pelo botao
        $id_tarefa = mysqli_real_escape_string($conexao, $_POST['tarefa_fazer']);

        //comando sql
        $sql = "UPDATE tarefa SET status_tarefa = 'Fazendo' WHERE id_tarefa = '$id_tarefa'";

        //executar comando sql
        mysqli_query($conexao, $sql);

        //verificar se banco de dados foi alterado
        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['mensagem'] = 'Tarefa atualizada!';
            header('Location: ../painel/painel.php');
            exit();
        }else{
            $_SESSION['mensagem'] = 'Não foi possível atualizar tarefa...';
            header('Location: ../painel/painel.php');
            exit();
        }
    }

    //excluir tarefa --> FAZER
    if(isset($_POST['delete_fazer'])){
        //pegar valor do id da tarefa com o botao
        $id_tarefa = mysqli_real_escape_string($conexao, $_POST['delete_fazer']);

        //comando sql
        $sql = "DELETE FROM tarefa WHERE id_tarefa = '$id_tarefa'";

        //executar comando sql
        mysqli_query($conexao, $sql);

        //verificar se banco de dados foi alterado
        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['mensagem'] = 'Sua tarefa foi excluída com sucesso!';
            header('Location: ../painel/painel.php');
            exit();
        }else{
            $_SESSION['mensagem'] = 'Sua tarefa não foi excluída...';
        }
    }

    
    //atualiazar tarefa FAZENDO --> FEITO
    if(isset($_POST['tarefa_fazendo'])){
        //valor do id da tarefa pego pelo botao
        $id_tarefa = mysqli_real_escape_string($conexao, $_POST['tarefa_fazendo']);

        //comando sql
        $sql = "UPDATE tarefa SET status_tarefa = 'Feito' WHERE id_tarefa = '$id_tarefa'";

        //executar comando sql
        mysqli_query($conexao, $sql);

        //verificar se banco de dados foi alterado
        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['mensagem'] = 'Tarefa atualizada!';
            header('Location: ../painel/painel.php');
            exit();
        }else{
            $_SESSION['mensagem'] = 'Não foi possível atualizar tarefa...';
            header('Location: ../painel/painel.php');
            exit();
        }
    }
    
    //excluir tarefa ---> FAZENDO
    if(isset($_POST['delete_fazendo'])){
        //pegar valor do id da tarefa com o botao
        $id_tarefa = mysqli_real_escape_string($conexao, $_POST['delete_fazendo']);

        //comando sql
        $sql = "DELETE FROM tarefa WHERE id_tarefa = '$id_tarefa'";

        //executar comando sql
        mysqli_query($conexao, $sql);

        //verificar se banco de dados foi alterado
        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['mensagem'] = 'Sua tarefa foi excluída com sucesso!';
            header('Location: ../painel/painel.php');
            exit();
        }else{
            $_SESSION['mensagem'] = 'Sua tarefa não foi excluída...';
        }
    }
    
    //excluir tarefa ---> FEITO
    if(isset($_POST['delete_feito'])){
        //pegar valor do id da tarefa com o botao
        $id_tarefa = mysqli_real_escape_string($conexao, $_POST['delete_feito']);

        //comando sql
        $sql = "DELETE FROM tarefa WHERE id_tarefa = '$id_tarefa'";

        //executar comando sql
        mysqli_query($conexao, $sql);

        //verificar se banco de dados foi alterado
        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['mensagem'] = 'Sua tarefa foi excluída com sucesso!';
            header('Location: ../painel/painel.php');
            exit();
        }else{
            $_SESSION['mensagem'] = 'Sua tarefa não foi excluída...';
        }
    }