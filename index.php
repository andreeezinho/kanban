<?php
    session_start();

    include('./acoes/conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>To Do List</title>
</head>
<body>
    <div class="container position-absolute top-50 start-50 translate-middle d-flex justify-content-center" >
        <div class="col-md-3 my-auto">
            <div class="card">
                <div class="card-header">
                        <h5 class="text-center">Entrar</h5>
                </div>

                <div class="card-body">
                    <form action="./login/login.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" name="usuario" class="form-control">
                            <label for="usuario">Usuário</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="senha" class="form-control">
                            <label for="senha">Senha</label>
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









<?php
    // $senha = password_hash("senha", PASSWORD_DEFAULT);

    // $senha_escrita = "senha";

    // $verifica = password_verify($senha_escrita, $senha);

    // if($verifica){
    //     echo 'ok';
    // }else{
    //     echo 'nao....';
    // }
?>

    