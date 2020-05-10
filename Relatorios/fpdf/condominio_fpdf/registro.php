<?php

// Registro não deve ter session, para permitir quem não se logou
require_once("includes/template.inc.php");
require_once("includes/funcoes_div.inc.php");
echo fundo("blanchedalmond","frmReg","login");
echo cabecalho("Condomínio Ferreira", "");
?>
<pre>



</pre>
<center><b>Registro de Novos Usuários<br><br></center>
<form name="frmReg" action="registro_ins.php" method="POST">
<table border=0 align="center">
<tr><td><u>L</u>ogin</td><td><input type="text" name="login" size="12" maxlength="12" accesskey="L"></td></tr>
<tr><td><u>S</u>enha</td><td><input type="password" name="senha" size="12" maxlength="12" accesskey="S"></td></tr>
<tr><td><u>R</u>epetir</td><td><input type="password" name="senha2" size="12" maxlength="12" accesskey="R" onBlur="if(senha.value.length != senha2.value.length){alert ('Favor digitar senhas idênticas'); return false;}"></td></tr>
<tr><td><u>N</u>ome</td><td><input type="text" name="nome" size="20" maxlength="45" accesskey="N"></td></tr>
<tr><td><u>E</u>-mail</td><td><input type="text" name="email" size="20" maxlength="50" accesskey="E"></td></tr>
<tr><td></td><td><input type="submit" value="Enviar" accesskey="V"></td></tr>
</table>
</form>

<center><font color=red>ALERTA:</font> Guarde bem sua senha, pois armazenamos apenas o hash da mesma no servidor.</center>

<?php linhas_br(4); ?>

<?php
echo fontes("registrofontes.php");
echo rodape("Julho de 2006");

?>
