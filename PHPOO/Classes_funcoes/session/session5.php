<?php
session_start();
if (isset($_SESSION['login'])){
	echo "Entre. Session5. <a href=index.php>Index</a><br><br>";
	echo "Informa��es: <br>ID da Sess�o: <b>" . session_id() . 
	"</b><br>Vari�vel mantida pela SuperGlobal \$_SESSION: <b>" . $_SESSION['login'];
} else {
	echo "Acesso n�o autenticado!";
}
?>
