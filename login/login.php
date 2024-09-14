<?php
    //iniciar sessao
    session_start();

    //incluir conxao com banco de dados
    include('../acoes/conexao.php');

    //verificar se dados estao vazios para redirecionar usuario
    if(empty($_POST['usuario']) || empty($_POST['senha'])){
        header('Location: ../index.php');
        exit();
    }

    //pegar dados do formulario
    $usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

    //comando sql
    $sql = "SELECT id_usuario, usuario, nome, email, data_nascimento, data_cadastro, permissao FROM usuario WHERE usuario = '$usuario' AND senha = MD5('$senha')";

    //executar comando sql
    $result = mysqli_query($conexao, $sql);

    //validar se autenticou o comando
    $valida = mysqli_num_rows($result);

    if($valida == 1){
        //vai pegar os dados do usuáiro
        $usuario_bd = mysqli_fetch_assoc($result);

        //cria sessao com os dados do usuario
        $_SESSION['id_usuario'] = $usuario_bd['id_usuario'] ?? 'Id não definido';
        $_SESSION['usuario'] = $usuario_bd['usuario'] ?? 'Usuário não definido';
        $_SESSION['nome'] = $usuario_bd['nome'] ?? 'nome não definido';
        $_SESSION['email'] = $usuario_bd['email'] ?? 'email não definido';
        $_SESSION['data_nascimento'] = $usuario_bd['data_nascimento'] ?? 'data nascimento não disponível';
        $_SESSION['data_cadastro'] = $usuario_bd['data_cadastro'] ?? 'Data de cadastro não disponível';
        $_SESSION['permissao'] = $usuario_bd['permissao'] ?? 'permissao não disponível';

        //redireciona para painel.php
        header('Location: ../painel/painel.php');
        exit();
    }else{
        $_SESSION['nao_autenticado'] = true;
        header('Location: ../index.php');
        exit();
    }



