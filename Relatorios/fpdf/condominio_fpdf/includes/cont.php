<?php
$counter_file = "includes/cont.txt"; //informa o nome do arquivo onde est� o n�mero de hits
if(!($fp = @fopen($counter_file , "r"))) die ("<b>Erro!</b><br>N�o foi poss�vel abrir o contador."); 
//abre o arquivo onde est� o total de visitas do site.
$counter = (int)fread($fp, 24); //armazena em $counter o n�mero atual de visitas
@fclose($fp); //fecha o arquivo stats.txt
if(!isset($hits)) { //se o usu�rio ainda n�o tiver visitado o site
    $counter++; //aumenta o n�mero de visitas
    @setcookie("hits","1"); //grava um cookie que ir� lembrar o script que o internauta j� visitou o site
}
$fp = @fopen($counter_file , "w"); //reabre o arquivo stats.txt
@fwrite($fp, $counter); //escreve o novo n�mero de visitantes no arquivo
@fclose($fp); //fecha o arquivo

for ($i = 0; $i < strlen($counter); $i++){ //"anda" pelos n�meros de $counter
    $imgsrc = substr($counter,$i ,1); //armazena o n�mero que est� sendo analisado em $imgsrc
    echo "<img src =\"includes/images/".$imgsrc.".gif\" TITLE=\"Visitas\">"; //carrega a imagem correspondente ao n�mero de $imgsrc
}
?>
