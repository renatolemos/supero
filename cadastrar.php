<?php
require 'conexaoLogin.php';

if (!empty($_POST)) {

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];

    $conectar = Conexao::conectar();
    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO login_teste (usuario, senha, email) values(?, SHA1(?), ?)";
    $q = $conectar->prepare($sql);
    $q->execute(array($usuario, $senha, $email));
    Conexao::disconectar();
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>:: Gerenciador de Tarefas ::</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Gerenciador de Tarefas</a>
                </div>
            </div>
        </nav>
        <div id="main" class="container-fluid">
            <h3 class="page-header">Adicionar novo Usuário</h3>
            <form action="cadastrar.php" method="post">                
                <div class="row text-center">                   
                    <div class="form-group col-md-4">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Digite seu usuário">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="senha">Senha</label>
                        <input type="text" class="form-control" name="senha" id="senha" placeholder="Digite sua senha">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu E-mail">
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <a class="btn btn-default" href="index.php">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>