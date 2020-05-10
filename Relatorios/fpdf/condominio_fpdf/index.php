<head>
<link href="includes/images/favicon.png" type="image/gif" rel="icon">
</head>

<?php

require_once("includes/template.inc.php");
require_once("includes/funcoes_div.inc.php");

echo fundo("blanchedalmond","frmLogin","login");
echo cabecalho("Condomínio Ferreira", "Acesso ao Sistema", "Login");
echo linhas_br(4);
?>

<form name="frmLogin" action="login.php" method="POST" onSubmit="if(login.value=='' || senha.value==''){alert('Favor preencher login e senha!');return false;}">
<table border=0 align="center">
<tr><td><u>L</u>ogin</td><td><input type="text" name="login" size="12" maxlength="12" accesskey="L"></td></tr>
<tr><td><u>S</u>enha</td><td><input type="password" name="senha" size="12" maxlength="12" accesskey="S"></td></tr>
<tr><td></td><td><input type="submit" value="Enviar"></td><td></td><td><a href="registro.php" >Registrar</a></td></tr>
</table>
</form>
<pre>





</pre>

<?php
echo fontes("indexfontes.php");
echo rodape("Julho de 2006");



?>
