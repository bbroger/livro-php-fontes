<?php
// Verifica se usu�rio escolheu algum n�mero
if(isset($_POST["numeros"]))
{
    echo "Os n�meros de sua prefer�ncia s�o:<BR>";
    
    // Faz loop pelo array dos numeros
    foreach($_POST["numeros"] as $numero)
    {
        echo "- " . $numero . "<BR>";
    }
}
else
{
    echo "Voc� n�o escolheu n�mero preferido!<br>";
}
 
// Verifica se usu�rio quer receber newsletter
if(isset($_POST["news"]))
{
    echo "Voc� deseja receber as novidades por email!";
}
else
{
    echo "Voc� n�o quer receber novidades por email...";
}
?>