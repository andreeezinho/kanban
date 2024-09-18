<?php
    session_start();

    require('../acoes/conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
        include('../layout/navbar.php');
    ?>
   
    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">Atualizar dados </h5>
                    </div>

                    <div class="card-body">
                        <?php
                            //get no id_usuario e verifica se existe
                            if(isset($_GET['id_usuario'])){
                                //define qual o id do usuario
                                $id_usuario = mysqli_real_escape_string($conexao, $_GET['id_usuario']);

                                //comando sql
                                $sql = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario'";

                                //executa comando sql
                                $query = mysqli_query($conexao, $sql);

                                //verifica se há usuário
                                if(mysqli_num_rows($query) > 0){
                                    $usuario = mysqli_fetch_array($query);
                        ?>

                        <form action="../acoes/acoes.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" name="id_usuario" id="usuario" class="form-control" value=<?=$usuario['id_usuario'] ?> > 
                                <label for="usuario">Usuário</label>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <input type="text" name="usuario" id="usuario" class="form-control" value=<?=$usuario['usuario'] ?>>
                                <label for="usuario">Usuário</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="nome" id="nome" class="form-control" value=<?=$usuario['nome'] ?>>
                                <label for="nome">Nome</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="mail" name="email" id="email" class="form-control" value=<?=$usuario['email'] ?>>
                                <label for="email">Email</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" name="senha" id="senha" class="form-control">
                                <label for="senha">Senha</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" value="<?=$usuario['data_nascimento'] ?>">
                                <label for="data_nascimento">Data de nascimento</label>
                            </div>

                            <div class="mb-3">
                                <select name="permissao" id="permissao" class="form-select">
                                    <option value="" selected disabled hidden>Defina a permissão</option>
                                    <option value=1>Administrador</option>
                                    <option value=2>Usuário</option>
                                </select>
                            </div>

                            <div class="mb-3 text-center">
                                <button type="submit" name='usuario_edit' class="btn btn-primary">Atualizar</button>
                            </div>
                        </form>

                        <?php
                                }
                            }else{
                                echo '<h5>Usuário não encontrado...</h5>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- copiar esses códigos js para o bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>