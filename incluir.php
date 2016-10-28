<?php
require 'conexao.php';

if (!empty($_POST)) {

    $tarefa = $_POST['tarefa'];
    $cliente = $_POST['cliente'];
    $prazo = $_POST['prazo'];
    $prioridade = $_POST['prioridade'];
    $concluido = $_POST['concluido'];
    $descricao = $_POST['descricao'];


    $conectar = Conexao::conectar();
    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO gerenciador (tarefa, cliente, descricao, prazo, prioridade, concluido) values(?, ?, ?, ?, ?, ?)";
    $q = $conectar->prepare($sql);
    $q->execute(array($tarefa, $cliente, $descricao, $prazo, $prioridade, $concluido));
    Conexao::disconectar();
    header("Location: lista.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>:: Gerencioador de Tarefas ::</title>
        <link href="css/bootstrap.css" rel="stylesheet">
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
                    <a class="navbar-brand" href="lista.php">Gerenciador de Tarefas</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Ajuda</a></li>
                        <li><a href="sair.php">Sair</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="main" class="container-fluid">
            <h3 class="page-header">Adicionar Livro</h3>
            <form action="incluir.php" method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="tarefa">Tarefa</label>
                        <input type="text" class="form-control" name="tarefa" id="tarefa"  placeholder="Digite a tarefa">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cliente">Cliente</label>
                        <input type="text" class="form-control"  name="cliente" id="cliente" placeholder="Digite o cliente">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="data">Prazo para conclusão</label>
                        <input type="date" class="form-control" name="prazo" id="prazo">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="prioridade">Prioridade</label>
                        <select class="form-control" name="prioridade" id="prioridade">
                            <option></option>
                            <option value="1">Baixa</option>
                            <option value="2">Média</option>
                            <option value="3">Alta</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="concluido">Concluído</label><br>

                        <label class="radio-inline">
                            <input type="radio" name="concluido" id="concluido" value="1"> Sim
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="concluido" id="concluido" value="0"> Não
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control" name="descricao" id="descricao" placeholder="Digite a descrição"></textarea>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <a class="btn btn-default" href="lista.php">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>