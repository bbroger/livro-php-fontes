<?php
function Teste (){
   $a = 0;
   echo $a;
   $a++;
}

for ($x=1;$x<10;$x++){
	Teste();
}
echo "<br><br>";

function Teste2(){
   static $a = 0;
   echo $a;
   $a++;
}

for ($x=1;$x<10;$x++){
	Teste2();
}

echo "<br><br>";

// Fun��o recursiva
function Teste3()
{
   static $count = 0;

   $count++;
   echo $count;
   if ($count < 10) {
       Teste3 ();
   }
   $count--;
}

for ($x=1;$x<5;$x++){
	Teste3();
	if ($x < 4) echo " - ";
}

echo "<br><br>";
//Declarando vari�veis static

function foo(){
   static $int = 0;          // correro
   //static $int = 1+2;        // errado (� uma express�o)
   //static $int = sqrt(121);  // wrong  (� uma express�o tamb�m)

   $int++;
   echo $int;
}

foo();
 
?>
