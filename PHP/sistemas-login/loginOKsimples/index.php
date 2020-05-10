<?php
session_start();
        require_once "classes/conexao.php";
        require_once "classes/login.php";

    if (isset($_POST['ok'])):

        $login = filter_input(INPUT_POST,"login", FILTER_SANITIZE_MAGIC_QUOTES);
        $senha = filter_input(INPUT_POST,"senha", FILTER_SANITIZE_MAGIC_QUOTES);

        /**/
        $_1 = new Login;
        $_1->setLogin($login);
        $_1->SetSenha($senha);

        if($_1->logar()):
            header("Location: logado.php");
        else:
            $erro = "Erro ao Logar";
        endif;
    endif;
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!--Utilizei o boostrap para deixar com uma aparencia melhor ao projeto-->
    <meta charset="UTF-8">
    <title>Logim Meu Sistema</title>
    <!--se preferir add um css para caso queira utiliza-lo em vez do boostrap-->
    <link rel="stylesheet" type="text/css" href="css/tela_login.css"/>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
-->
</head>
<body>
    <div class="container" style="margin-top:30px">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><strong>Acesso ao Sistema </strong></h3>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#"></a></div>
                </div>

                <div class="panel-body" id="login">
                    <form action="" method="POST" id="form-login" role="form">
                        <!--<div class="alert alert-danger">
                            <a class="close" data-dismiss="alert" href="#">×</a>Favor Informa Email e Senha!
                        </div>-->
                        <div style="margin-bottom: 12px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="input" name="login" value="" placeholder="E-mail">
                        </div>

                        <div style="margin-bottom: 12px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="senha" placeholder="password">
                        </div>

                        <div class="input-group">
                            <div class="checkbox" style="margin-top: 0px;">
                                <label>
                                    <input id="btn_logar" type="checkbox" name="ok" value="logar" class="input_button"> Me Lembrar
                                </label>
                            </div>
                        </div>
                        <button type="submit" name="ok" id="btn_logar" value="logar" class="input_button"">Logar</button>
                        <hr style="margin-top:10px;margin-bottom:10px;" >
                        <div class="form-group">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


