<?php
session_start();
session_unset(); // Eliminar todas as variáveis da sessão
session_destroy(); // Destruir a sessão
header("location:index.php");
?>
