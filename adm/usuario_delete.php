<?php
    session_start();
    include('../acoes/conexao.php');

    echo 'porra';

    if(isset($_GET['id_usuario'])){
        $id_usuario = mysqli_real_escape_string($conexao, trim($_GET['id_usuario']));

        //comando sql
        $sql = "DELETE FROM usuario WHERE id_usuario = '$id_usuario'";

        //executar comando sql
        mysqli_query($conexao, $sql);

        //verificar se houve linhas afetadas
        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['usuario_delete'] = true;
            header('Location: ./adm.php');
            exit();
        }else{
            $_SESSION['delete_erro'] = true;
            header('Location: ./adm.php');
            exit();
        }
    }