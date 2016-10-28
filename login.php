<?php

mysql_connect('localhost', 'root', '')or die(); //Conecta com o MySQL
mysql_select_db('login_teste');      //Seleciona banco de dados

$usuario = $_POST['usuario']; //Pegando dados passados por AJAX
$senha = $_POST['senha'];

//Consulta no banco de dados
$sql = "SELECT * FROM login_teste WHERE usuario='" . $usuario . "' AND senha='" . sha1($senha) . "'";
$resultados = mysql_query($sql)or die(mysql_error());
$res = mysql_fetch_array($resultados); //
if (@mysql_num_rows($resultados) == 0) {
    echo 0; //Se a consulta não retornar nada é porque as credenciais estão erradas
} else {
    echo 1; //Responde sucesso
    if (!isset($_SESSION))  //verifica se há sessão aberta
        session_start();  //Inicia seção
        
//Abrindo seções
    $_SESSION['id'] = $res['id'];
    $_SESSION['usuario'] = $res['usuario'];
    $_SESSION['email'] = $res['email'];
    exit;
}
?>