<?php
$a = 1; /* escopo global */

function Teste(){
    global $a;
    echo $a; /* referencia a vari�vel do escopo global */
}

Teste();
?>
