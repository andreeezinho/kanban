<?php
    session_start();

    //encerrar sessoes
    session_destroy();

    header('Location: ../index.php');
    exit();
    