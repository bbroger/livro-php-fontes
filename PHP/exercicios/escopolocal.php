<?php
$a = 1; /* escopo global */

function Teste(){
   echo $a; /* referencia uma vari�vel do escopo local (n�o definida) */
}

Teste();
?>
