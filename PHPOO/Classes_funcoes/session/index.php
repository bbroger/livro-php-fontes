<?php
session_start();
?>
<center><h1>Trabalhando com SESSION em PHP</h1>
Podemos preservar valores de vari�veis enquanto durar uma sess�o do browser atrav�s do uso de SESSION.<br>
Para isso devemos startar a sess�o em cada p�gina que desejamos usar esta vari�vel com<br><br>
sesssion_start();<br><br>
Lembrando que esta fun��o deve vir antes de qualquer comando que mande algo para a tela, caso<br>
o session esteja configurado para usar cookie.<br>
Na primeira p�gina deve ter um formul�rio com algum campo que devemos usar no session.<br>
Experimente gravar a URL de uma das p�ginas internas e acessar diretamente (http://localhost/session3)
<br>Primeiro feche todas as se��es do browser e depois abra o browser com essa URL.<br>
<br>
Veja que SESSION � muito bom para preservar o valor de vari�veis entre p�ginas de um site numa se��o.<br>
Portanto seu uso � muito �til quando pretendemos autenticas os visitantes de todas as as p�ginas de um site.<BR>
Como tamb�m para outros usos em que pretendemos reaproveitar o valor de vari�veis (algo como global).<BR>
Acompanhe este exemplo para ver detalhes.<br><br><br>

<form method=post action=session2.php>
	Login<input type=text size=8 name=login value=<?=$_SESSION['login']?>><br>
	<input type=submit value=Enviar>
</form></center>
