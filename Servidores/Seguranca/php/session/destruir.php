<?php
session_start();
if (isset($_SESSION['login'])){
  session_unset(); // Eliminar todas as vari�veis da sess�o
  session_destroy(); // Destruir a sess�o
  echo "Entre. Sess�o Destruida. <a href=session3.php>Session3</a><br>";  
} else {
  echo "Acesso n�o autenticado!";
}
?>
