<?php
require 'conexao.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: lista.php");
} else {
    $conectar = Conexao::conectar();
    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM gerenciador where id = ?";
    $q = $conectar->prepare($sql);
    $q->execute(array($id));
    $campo = $q->fetch(PDO::FETCH_ASSOC);
    Conexao::disconectar();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>:: Gerenciador de tarefa ::</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>
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
                    <a class="navbar-brand" href="#">Gerenciador de tarefa</a>
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
            <h3 class="page-header" style="margin-top: 60px;"><?php echo $campo['cliente'] ?></h3>
            <?php echo "<div class='row '>
                <div class='col-md-6'>
                    <p><strong>Tarefa</strong></p>
                    <p>" . $campo['tarefa'] . "</p>
                </div>
                <div class='col-md-6'>
                    <p><strong>Cliente</strong></p>
                    <p>" . $campo['cliente'] . "</p>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-3'>
                    <p><strong>Prazo de conclusão</strong></p>
                    <p>"; $date = date_create($campo['prazo']);
                           echo date_format($date, 'd-m-Y'); echo"</p>
                </div>
                <div class='col-md-3'>
                    <p><strong>Prioridade</strong></p>
                    <p>"; if ($campo['prioridade'] == '1'){echo 'Baixa';}
                          if ($campo['prioridade'] == '2'){echo 'Média';}
                          if ($campo['prioridade'] == '3'){echo 'Alta';}
                    echo "</p>
                </div>

                <div class='col-md-3'>
                    <p><strong>Concluído</strong></p>
                    <p>";  if($campo['concluido'] == '1'){echo 'SIM';}
                           if($campo['concluido'] == '0'){echo 'NÃO';}
                    echo "</p>
                </div>
            </div>
                <div  class='row'>
            <div class='col-md-12'>
                <p><strong>Descrição</strong></p>
                <p>" . $campo['descricao'] . "</p>
            </div>
        </div>" ?>
            <hr />
            <div id="actions" class="row">
                <div class="col-md-12">
                    <?php
                    echo '<a class="btn btn-default" href="lista.php">Voltar</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-warning" href="atualizar.php?id=' . $campo['id'] . '">Editar</a>';
                    ?>
                </div>
            </div>
    </body>
</html>