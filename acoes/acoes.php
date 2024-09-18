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
        $sql = "UPDATE tarefa SET status_tarefa = 'Feito', data_conclusao = NOW() WHERE id_tarefa = '$id_tarefa'";

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


    //verifica se btn editar usuario foi setado
    if(isset($_POST['usuario_edit'])){
        //pegar os valores 
        $id_usuario = mysqli_real_escape_string($conexao, trim($_POST['id_usuario']));
        $usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
        $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
        $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
        $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
        $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));
        $permissao = mysqli_real_escape_string($conexao, trim($_POST['permissao']));

        //comando sql
        $sql = "UPDATE usuario set usuario = '$usuario', nome = '$nome', email = '$email', data_nascimento = '$data_nascimento', permissao = '$permissao'";

        //se senha nao estiver vazio
        if(!empty($senha)){
            //concactenar no comando sql
            $sql .= ", senha = '". md5($senha) ."'";
        }

        //concactenar o filtro where
        $sql .= " WHERE id_usuario = '$id_usuario'";

        //executar comando sql
        mysqli_query($conexao, $sql);

        //verifica se houve alteração no banco de daos
        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['usuario_edit'] = true;
            header('Location: ../adm/adm.php');
            exit();
        }else{
            $_SESSION['edit_erro'] = true;
            header('Location: ../adm/adm.php');
            exit();
        }   
    }