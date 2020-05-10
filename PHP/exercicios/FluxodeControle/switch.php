<?php

$i = 1;

// Estrutura com if
if ($i == 0) {
   echo "\$i igual a 0";
} elseif ($i == 1) {
   echo "\$i igual a 1";
} elseif ($i == 2) {
   echo "\$i igual a 2";
}
echo "<br>";
// Estruturas com switch
switch ($i) {
   case 0:
       echo "\$i igual a 0";
       break;
   case 1:
       echo "\$i igual a 1";
       break;
   case 2:
       echo "\$i igual a 2";
       break;
}
echo "<br>";
$i = 2;
// Executar� todos, falta o break
switch ($i) {
   case 0:
       echo "\$i igual a 0";
   case 1:
       echo "\$i igual a 1";
   case 2:
       echo "\$i igual a 2";
}
echo "<br>";
// Simulando intervalos
switch ($i) {
   case 0:
   case 1:
   case 2:
       echo "\$i � menor que 3 mas n�o negativo";
       break;
   case 3:
       echo "\$i � 3";
}
echo "<br>";
// Valor default
switch ($i) {
   case 0:
       echo "\$i igual a 0";
       break;
   case 1:
       echo "\$i igual a 1";
       break;
   case 2:
       echo "\$i igual a 2";
       break;
   default:
       echo "\$i n�o � igual a 0, 1 ou 2";
}
/* Sintaxe alternativa (em obsolesc�ncia)
switch ($i):
   case 0:
       echo "\$i igual a 0";
       break;
   case 1:
       echo "\$i igual a 1";
       break;
   case 2:
       echo "\$i igual a 2";
       break;
   default:
       echo "\$i n�o � igual a 0, 1 ou 2";
endswitch;
*/
?>
