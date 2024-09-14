<?php
    include('./verifica_cadastro.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <a href="../painel/painel.php" class="btn mt-2 mx-2 btn-primary" for="volta">
        Voltar
        <span class="btn btn-close" data-bs-dismiss="alert" aria-label="Close" id="volta"></span>
    </a >

    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">Cadastrar Usuário</h5>
                    </div>

                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['usuario_existe'])):
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                Não foi possível cadastrar usuário
                                <button class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        endif;

                        //limpar sessao
                        unset($_SESSION['usuario_existe']);
                        ?>

                        <?php
                        if (isset($_SESSION['usuario_cadastrado'])):
                        ?>
                            <div class="alert alert-success alert-dismissible fade show">
                                Usuário cadastrado com sucesso!
                                <button class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        endif;

                        //limpar sessao
                        unset($_SESSION['usuario_cadastrado']);
                        ?>
                        <form action="cadastrar.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" name="usuario" id="usuario" class="form-control">
                                <label for="usuario">Insira o usuário</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="nome" id="nome" class="form-control">
                                <label for="nome">Insira o nome</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="mail" name="email" id="email" class="form-control">
                                <label for="email">Insira o email</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" name="senha" id="senha" class="form-control">
                                <label for="senha">Insira o senha</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control">
                                <label for="data_nascimento">Insira a data de nascimento</label>
                            </div>

                            <div class="mb-3">
                                <select name="permissao" id="permissao" class="form-select">
                                    <option value="" selected disabled hidden>Defina a permissão</option>
                                    <option value=1>Administrador</option>
                                    <option value=2>Usuário</option>
                                </select>
                            </div>

                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>