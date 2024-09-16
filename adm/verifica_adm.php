<?php
    session_start();

    //se nao tiver permissao administrador, é redirecionado
    if($_SESSION['permissao'] != 1){
        $_SESSION['mensagem'] = 'Usuário não possui permissão de administrador...';
        header('Location: ../painel/painel.php');
        exit;
    }