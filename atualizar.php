<?php
require 'conexao.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: lista.php");
}

if (!empty($_POST)) {

    $tarefa = $_POST['tarefa'];
    $cliente = $_POST['cliente'];
    $prazo = $_POST['prazo'];
    $prioridade = $_POST['prioridade'];
    $concluido = $_POST['concluido'];
    $descricao = $_POST['descricao'];

    $conectar = Conexao::conectar();
    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE gerenciador  set tarefa = ?, cliente = ?, prazo = ?, prioridade = ?, concluido = ?, descricao = ? WHERE id = ?";
    //$sql = "UPDATE gerenciador SET tarefa='..',`cliente`=\'BBBB\',`descricao`=\'BBBB\',`prazo`=2016-10-22,`prioridade`=1,`concluido`=0 WHERE id = 16";
    $q = $conectar->prepare($sql);
    $q->execute(array($tarefa, $cliente, $prazo, $prioridade, $concluido, $descricao, $id));
    var_dump($q);
    Conexao::disconectar();
    header("Location: lista.php");
    


} else {
    $conectar = Conexao::conectar();
    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM gerenciador where id = ?";
    $q = $conectar->prepare($sql);
    $q->execute(array($id));
    $campo = $q->fetch(PDO::FETCH_ASSOC);
    //var_dump($campo);
    //exit;
    Conexao::disconectar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>:: Gerenciador de tarefas ::</title>
        <link href="css/bootstrap.css" rel="stylesheet">
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
                    <a class="navbar-brand" href="index.php">Gerenciador de tarefas</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Perfil</a></li>
                        <li><a href="#">Ajuda</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="main" class="container-fluid">
            <h3 class="page-header" style="margin-top: 60px;">Editar - <?php echo $campo['id'];?></h3>
            <form action="atualizar.php?id=<?php echo $id ?>" method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="tarefa">Tarefa</label>
                        <input type="text" class="form-control" name="tarefa" id="tarefa" value="<?php echo $campo['tarefa']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cliente">Cliente</label>
                        <input type="text" class="form-control"  name="cliente" value="<?php echo $campo['cliente']; ?>" id="cliente">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="prazo">Prazo de conclusão</label>
                        <input type="text" class="form-control" name="prazo" value="<?php  $date = date_create($campo['prazo']); echo date_format($date, 'd-m-Y'); ?>" id="prazo">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="prioridade">Prioridade</label>
                        <select class="form-control" name="prioridade" id="prioridade">
                            <?php if ($campo['prioridade'] == "1") { ?>
                                <option selected="selected" value="1">Baixa</option>
                                <option value="2">Média</option>  
                                <option value="3">Alta</option>  
                            <?php } ?>
                            <?php if ($campo['prioridade'] == "2") { ?>
                                <option selected="selected" value="2">Média</option>
                                <option value="3">Alta</option>
                                <option value="1">Baixa</option>
                            <?php } ?>
                            <?php if ($campo['prioridade'] == "3") { ?>
                                <option selected="selected" value="3">Alta</option>
                                <option value="1">Baixa</option>
                                <option value="2">Média</option>    
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="concluido">Concluído</label><br>
                        <label class="radio-inline">
                            <?php if ($campo['concluido'] == '1') { ?>
                                <input type="radio" name="concluido" id="concluido" value="1" checked> Sim
                                <label class="radio-inline">
                                    <input type="radio" name="concluido" id="concluido" value="0"> Não
                                </label>
                            </label><?php } else { ?>
                            <label class="radio-inline">
                                <input type="radio" name="concluido" id="concluido" value="0" checked> Não
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="concluido" id="concluido" value="1" > Sim
                            </label><?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control" name="descricao" id="descricao"><?php echo $campo['descricao']; ?></textarea>
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