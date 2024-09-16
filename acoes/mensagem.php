<?php
    //verifica sessao mensagem
    if(isset($_SESSION['mensagem'])):
?>
    <div class="alert alert-primary alert-dismissible fade show mt-5">
        <!-- chama sessao pela tag -->
         <?=$_SESSION['mensagem'] ?>

         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php
    unset($_SESSION['mensagem']);

    endif;
?>