<?php
$a = array("a" => "ma��", "b" => "banana");
$b = array("a" =>"p�ra", "b" => "framboesa", "c" => "morango");

$c = $a + $b; // Uniao de $a e $b
echo "Uni�o de \$a e \$b: <br>";
var_dump($c);

$c = $b + $a; // Uni�o de $b e $a
echo "<br><br>Uni�o de \$b e \$a: <br>";
var_dump($c);
?>
