<?php //include 'restrito.php';      ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="js/jquery.min.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/login.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css">
        <link href="css/style.css" rel="stylesheet">
        <script type="text/javascript">
            $(document).ready(function () {
                $('#errolog').hide(); //Esconde o elemento com id errolog
                $('#formlogin').submit(function () { 	//Ao submeter formulário
                    var usuario = $('#usuario').val();	//Pega valor do campo email
                    var senha = $('#senha').val();	//Pega valor do campo senha
                    $.ajax({//Função AJAX
                        url: "login.php", //Arquivo php
                        type: "post", //Método de envio
                        data: "usuario=" + usuario + "&senha=" + senha, //Dados
                        success: function (result) {			//Sucesso no AJAX
                            if (result == 1) {
                                location.href = 'restrito.php'	//Redireciona
                            } else {
                                alert('Login ou senha não confere')
                                $('#errolog').show();		//Informa o erro
                            }
                        }
                    })
                    return false;	//Evita que a página seja atualizada
                })
            })

        </script>
    </head>
    <body>
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Gerenciador de tarefas </h3>
                                    <p>Entre com seu login e senha.</p>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form id="formlogin">
                                    <div class="form-group">
                                        <label class="sr-only" for="usuario">Usuário</label>
                                        <input type="usuario" id="usuario" name="usuario" placeholder="Digite seu usuário" required="required" class="form-username form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="senha">Senha</label>
                                        <input type="password" name="senha" placeholder="Digite sua senha." required="required" class="form-password form-control" id="senha">
                                    </div>
                                    <button type="submit" class="btn">Entrar</button>
                                </form>
                                <div class="row">
                                    <div class="col-md- text-center" ><a href="cadastrar.php" class="text-center">Cadastre-se</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
