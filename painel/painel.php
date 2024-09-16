<?php
    include('../login/verifica_login.php');

    require('../acoes/conexao.php');

    $id =  $_SESSION['id_usuario'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel - To Do List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php
        include('../layout/navbar.php');
    ?>

<div class="container pt-5">
        <div class="row justify-content-center mt-5">
            <!-- DO (FAZER) -->
            <div class="col-sm-8 col-md-8 col-lg-3 col-xg-3 mx-1 mb-2 bg-dark p-3">
                <h3 class="title text-center text-light mb-5">Fazer</h3>

                <!-- select das tarefas -->
                <?php
                    //comando sql
                    $sql = "SELECT * FROM tarefa WHERE id_usuario = '$id' and status_tarefa = 'Fazer'";

                    $tarefa_fazer = mysqli_query($conexao, $sql);

                    //verificar se há tarefas
                    if(mysqli_num_rows($tarefa_fazer) > 0){
                        //passar os dados para o html
                        foreach($tarefa_fazer as $fazer){
                ?>

                <!-- card -->
                <div class="row justify-content-center mb-3">
                    <div class="card col-11">
                        <div class="card-header text-center">
                            <h5 class="my-auto card-title"><?=$fazer['nome_tarefa'] ?></h5>
                        </div>

                        <div class="card-body text-center">
                            <p class="card-text"><?=$fazer['descricao'] ?></p>
                            <p class="card-text text-muted"><?=date('d/m/y - H:i:s', strtotime($fazer['data_criacao'])) ?></p>

                            <div class="d-flex justify-content-center">
                                <form action="../acoes/acoes.php" method="POST">
                                    <button type="submit" name="tarefa_fazer" value=<?=$fazer['id_tarefa'] ?> class="btn btn-primary px-4"><i class="bi-check"></i></button>
                                </form>
                                
                                <form action="../acoes/acoes.php" method="POST">
                                    <button type="submit" name="delete_fazer" value=<?=$fazer['id_tarefa'] ?> class="btn btn-danger px-4"><i class="bi-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                        }
                    }else{
                        echo '<h6 class="text-light text-center">Não há tarefas por aqui...</h6>';
                    }
                ?>
            </div>

            <!-- FAZENDO (DOING) -->

            <div class="col-sm-8 col-md-8 col-lg-3 col-xg-3 mx-1 mb-2 bg-dark p-3">
                <h3 class="title text-center text-light mb-5">Fazendo</h3>

                <!-- select das tarefas -->
                <?php
                    //comando sql
                    $sql = "SELECT * FROM tarefa WHERE id_usuario = '$id' and status_tarefa = 'Fazendo'";

                    $tarefa_fazendo = mysqli_query($conexao, $sql);

                    //verificar se há tarefas
                    if(mysqli_num_rows($tarefa_fazendo) > 0){
                        //passar os dados para o html
                        foreach($tarefa_fazendo as $fazendo){
                ?>

                <!-- card -->
                <div class="row justify-content-center mb-3">
                    <div class="card col-11">
                        <div class="card-header text-center">
                            <h5 class="my-auto card-title"><?=$fazendo['nome_tarefa'] ?></h5>
                        </div>

                        <div class="card-body text-center">
                            <p class="card-text"><?=$fazendo['descricao'] ?></p>
                            <p class="card-text text-muted"><?=date('d/m/y - H:i:s', strtotime($fazendo['data_criacao'])) ?></p>

                            <div class="inline text-center">
                                <form action="../acoes/acoes.php" method="POST">
                                    <button type="submit" name="tarefa_fazendo" value=<?=$fazendo['id_tarefa'] ?> class="btn btn-primary px-4"><i class="bi-check"></i></button>
                                </form>
                                
                                <form action="../acoes/acoes.php" method="POST">
                                    <button type="submit" name="delete_fazendo" value=<?=$fazendo['id_tarefa'] ?> class="btn btn-danger px-4"><i class="bi-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                        }
                    }else{
                        echo '<h6 class="text-light text-center">Não há tarefas por aqui...</h6>';
                    }
                ?>
            </div>



            <!-- DONE (FEITO) -->
            <div class="col-sm-8 col-md-8 col-lg-3 col-xg-3 mx-1 mb-2 bg-dark p-3">
                <h3 class="title text-center text-light mb-5">Feito</h3>

                <!-- card -->
                <!-- select das tarefas -->
                <?php
                    //comando sql
                    $sql = "SELECT * FROM tarefa WHERE id_usuario = '$id' and status_tarefa = 'Feito'";

                    $tarefa_feito = mysqli_query($conexao, $sql);

                    //verificar se há tarefas
                    if(mysqli_num_rows($tarefa_feito) > 0){
                        //passar os dados para o html
                        foreach($tarefa_feito as $feito){
                ?>

                <!-- card -->
                <div class="row justify-content-center mb-3">
                    <div class="card col-11">
                        <div class="card-header text-center">
                            <h5 class="my-auto card-title"><?=$feito['nome_tarefa'] ?></h5>
                        </div>

                        <div class="card-body text-center">
                            <p class="card-text"><?=$feito['descricao'] ?></p>
                            <p class="card-text text-muted"><?=date('d/m/y - H:i:s', strtotime($feito['data_criacao'])) ?></p>

                            <div class="inline text-center">                              
                                <form action="../acoes/acoes.php" method="POST">
                                    <button type="submit" name="delete_feito" value=<?=$feito['id_tarefa'] ?> class="btn btn-danger px-4"><i class="bi-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                        }
                    }else{
                        echo '<h6 class="text-light text-center">Não há tarefas por aqui...</h6>';
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- copiar esses códigos js para o bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>


