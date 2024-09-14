<?php
    session_start();

    include('../acoes/conexao.php');

    //pegar valores
    $id_usuario = $_SESSION['id_usuario'];
    $nome_tarefa = mysqli_real_escape_string($conexao, trim($_POST['nome_tarefa']));
    $descricao = mysqli_real_escape_string($conexao, trim($_POST['descricao']));
    $status_tarefa = mysqli_real_escape_string($conexao, trim($_POST['status_tarefa']));

    //se titulo e status estiverem vazios
    if(empty($nome_tarefa) || empty($status_tarefa)){
        $_SESSION['nao_criou'] = true;

        header('Location: ./cadastra_tarefa.php');
        exit;
    }

    //comando sql
    $sql = "INSERT INTO tarefa (id_usuario, nome_tarefa, descricao, status_tarefa, data_criacao) VALUES ('$id_usuario','$nome_tarefa','$descricao','$status_tarefa', NOW())";

    //executar
    mysqli_query($conexao, $sql);

    //verificar se o comando foi executado com sucesso

    if(mysqli_affected_rows($conexao) > 0){
        $_SESSION['criou'] = true;

        header('Location: ./cadastra_tarefa.php');
        exit();
    }else{
        $_SESSION['nao_criou'] = true;

        header('Location: ./cadastra_tarefa.php');
        exit();
    }
    

    