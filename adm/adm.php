<?php
    include('./verifica_adm.php');
    
    include('../acoes/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
        include('../layout/navbar.php');
    ?>

    <div class="container mt-5">

    <?php
                if (isset($_SESSION['edit_erro'])):
            ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    Não foi possível cadastrar usuário
                    <button class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                endif;

                //limpar sessao
                unset($_SESSION['edit_erro']);
            ?>
        <div class="row mt">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            Usuários 
                            <a href="../cadastro/cadastro.php" class="btn btn-primary float-end"><i class="bi-plus"></i> Cadastrar usuário</a>
                        </h5>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Usuário</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Permissão</th>
                                    <th>Data Nascimento</th>
                                    <th>Data Cadastro</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- select dos usuarios -->
                                <?php
                                    //comando sql
                                    $sql = "select * from usuario";

                                    //executar query
                                    $query = mysqli_query($conexao, $sql);

                                    //veririficar todas as linhas do select
                                    if(mysqli_num_rows($query)){
                                        //printar as linhas do select
                                        foreach($query as $usuario){
                                ?>
                                <tr>
                                    <th><?=$usuario['id_usuario'] ?></th>
                                    <th><?=$usuario['usuario'] ?></th>
                                    <th><?=$usuario['nome'] ?></th>
                                    <th><?=$usuario['email'] ?></th>
                                    <th><?=$usuario['permissao'] ?></th>
                                    <th><?=date('d/m/y', strtotime($usuario['data_nascimento'])) ?></th>
                                    <th><?=date('d/m/y', strtotime($usuario['data_cadastro'])) ?></th>
                                    <th class="d-flex justify-content-center">
                                        <a href="../edit/usuario_edit.php?id_usuario=<?=$usuario['id_usuario'] ?>" class="btn btn-primary text-light mx-1">Editar</a>

                                        <form action="" method="POST">
                                            <button class="btn btn-danger mx-1">Excluir</button>
                                        </form>
                                    </th>
                                </tr>

                                <?php
                                        }
                                    }else{
                                        echo '<h5>Não há usuários...</h5>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

