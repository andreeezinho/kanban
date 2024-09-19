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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php
        include('../layout/navbar.php');
    ?>

    <div class="container mt-5">
        <div class="row mt">
            <div class="col-md-12 mt-5">
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

                <?php
                    if (isset($_SESSION['usuario_edit'])):
                ?>
                    <div class="alert alert-primary alert-dismissible fade show">
                        Usuário atualizado com sucesso!
                        <button class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    endif;

                    //limpar sessao
                    unset($_SESSION['usuario_edit']);
                ?>

                <?php
                    if (isset($_SESSION['delete_erro'])):
                ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        Não foi possível deletar usuário
                        <button class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    endif;

                    //limpar sessao
                    unset($_SESSION['delete_erro']);
                ?>

                <?php
                    if (isset($_SESSION['usuario_delete'])):
                ?>
                    <div class="alert alert-primary alert-dismissible fade show">
                        Usuário foi deletado com sucesso!
                        <button class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    endif;

                    //limpar sessao
                    unset($_SESSION['usuario_delete']);
                ?>
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
                                        <a href="../edit/usuario_edit.php?id_usuario=<?=$usuario['id_usuario'] ?>" class="btn btn-primary text-light mx-1"><i class="bi-pencil"></i> Editar</a>

                                        <a href="./usuario_delete.php?id_usuario=<?=$usuario['id_usuario'] ?>" type="submit" class="btn btn-danger px-4"><i class="bi-trash"></i></a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>

