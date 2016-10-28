<?php

session_start();  //A seção deve ser iniciada em todas as páginas
if (isset($_SESSION['id'])) {  //Verifica se há seções
    session_destroy();      //Destroi a seção por segurança
    header("Location: lista.php");
    exit; //Redireciona o visitante para login
}
?>