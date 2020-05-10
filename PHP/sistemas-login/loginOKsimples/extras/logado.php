<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>PHP</title>
</head>
<body>
<?php

session_start();

/**/
require_once "classes/conexao.php";
require_once "classes/login.php";


if(isset($_GET['logout'])):

        if($_GET['logout']== 'ok'):
           Login::deslogar();

    endif;

endif;

if(isset($_SESSION['logado'])):
    ?>

    <!--informo o campo que utilizarei para mostra quem se encontra logado-->
    BEM VINDO <?php echo $_SESSION['usuario'];?>

    <br />
    <a href="logado.php?logout=ok">Sair do Sistema</a>

<?php

    else:
        echo "Você não esta logado ou Não tem acesso tente novamente";?>

        <a href="http://localhost:8080/SistemaLoginPDO/">Inicio</a>
        <?php


endif;


?>


</body>
</html>

