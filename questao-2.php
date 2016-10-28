<?php
session_start(); // inicia a sessao
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) { // verifica se a sessao esta logado e rederiona para o site
 header("Location: http://www.google.com"); 

 } elseif (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true) {
 header("Location: http://www.google.com"); 
 
 }else{
     echo 'Favor se logar'; // caso nao esteja logado
 }


?>