<?php
require 'conexao.php';
$id = 0;

if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (!empty($_POST)) {

    $id = $_POST['id'];
    $conectar = Conexao::conectar();
    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM gerenciador  WHERE id = ?";
    $q = $conectar->prepare($sql);
    $q->execute(array($id));
    Conexao::disconectar();
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
        <link   href="css/bootstrap.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="span10 offset1">
                <form class="form-horizontal" action="excluir.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                    <p>Você tem certeza que deseja excluir <?php echo $campo['tarefa']; ?> ? 
                        <button type="submit" class="btn btn-success btn-xs">Sim</button>
                        <a class="btn btn-primary btn-xs" href="index.php">Não</a>
                    </p>
                </form>
            </div>     
        </div> 
    </body>
</html>