<?php
    session_start();

    //se nao tiver permissao administrador, é redirecionado
    if($_SESSION['permissao'] != 1){
        header('Location: ../painel/painel.php');
        exit;
    }