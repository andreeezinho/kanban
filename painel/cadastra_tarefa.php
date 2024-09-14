<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Nova Tarefa - To Do List</title>
</head>

<body>
    <?php
        include('../layout/navbar.php');
    ?>
    <div class="container position-absolute top-50 start-50 translate-middle d-flex justify-content-center">
        <div class="col-md-6 my-auto">
            <?php
            if (isset($_SESSION['criou'])):
            ?>
                <div class="alert alert-success alert-dismissible fade show">
                    Tarefa adicionada com sucesso
                    <button class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                endif;

                //limpar sessao
                unset($_SESSION['criou']);
            ?>

            <?php
            if (isset($_SESSION['nao_criou'])):
            ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    Erro ao adicionar tarefa
                    <button class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                endif;

                //limpar sessao
                unset($_SESSION['nao_criou']);
            ?>
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Nova Tarefa</h5>
                </div>

                <div class="card-body">
                    <form action="./tarefa.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" name="nome_tarefa" class="form-control">
                            <label for="nome_tarefa">Nome da tarefa</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="descricao" class="form-control">
                            <label for="descricao">Descrição da tarefa</label>
                        </div>

                        <div class="mb-3">
                            <select name="status_tarefa" id="status_tarefa" class="form-select">
                                <option value="" selected disabled hidden>Status da tarefa</option>
                                <option value="Fazer">Fazer</option>
                                <option value="Fazendo">Fazendo</option>
                                <option value="Feito">Feito</option>
                            </select>
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>