<?php
    session_start();

    include('../acoes/conexao.php');

    //pegar valores dos inputs
    $usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
    $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));
    $permissao = mysqli_real_escape_string($conexao, trim($_POST['permissao']));

    if(empty($permissao) || empty($data_nascimento)){
        $_SESSION['usuario_existe'] = true;

        header('Location: cadastro.php');
        exit;
    }

    //verificar se usuario existe ou nao
    $sql = "select count(*) as verifica from usuario where usuario = '$usuario'";

    //executar query para verificar se usuario existe
    $result = mysqli_query($conexao, $sql);

    //verificar se 0 ou 1
    $row = mysqli_fetch_assoc($result);

    if($row['verifica'] != 0){
        //cria sessao que nao valida
        $_SESSION['usuario_existe'] = true;

        //redirecionar novamente
        header('Location: cadastro.php');
        exit;
    }

    //comando sql
    $sql = "INSERT INTO usuario (usuario, nome, email, senha, data_nascimento, permissao, data_cadastro) 
    VALUES ('$usuario', '$nome', '$email', '$senha', '$data_nascimento', '$permissao', NOW())";

    //validar comando
    if($conexao->query($sql) === TRUE){
        //cria sessao de cadastro com sucesso
        $_SESSION['usuario_cadastrado'] = true;
    }

    //encerrar conexao com banco de dados
    $conexao->close();

    //recaregar pagina
    header('Location: cadastro.php');
    exit;
    