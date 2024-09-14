<?php
    include('../login/verifica_login.php');

    echo $_SESSION['id_usuario'];
    echo '       ';
    echo $_SESSION['usuario'];
    echo $_SESSION['nome'];
    echo $_SESSION['email'];
    echo $_SESSION['data_nascimento'];
    echo $_SESSION['data_cadastro'];
    echo $_SESSION['permissao'];

?>

<a href="../login/logout.php">Encerrar sessão</a>

<a href="../cadastro/cadastro.php">Cadastrar usuario</a>


