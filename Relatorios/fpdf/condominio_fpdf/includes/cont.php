<?php
$counter_file = "includes/cont.txt"; //informa o nome do arquivo onde está o número de hits
if(!($fp = @fopen($counter_file , "r"))) die ("<b>Erro!</b><br>Não foi possível abrir o contador."); 
//abre o arquivo onde está o total de visitas do site.
$counter = (int)fread($fp, 24); //armazena em $counter o número atual de visitas
@fclose($fp); //fecha o arquivo stats.txt
if(!isset($hits)) { //se o usuário ainda não tiver visitado o site
    $counter++; //aumenta o número de visitas
    @setcookie("hits","1"); //grava um cookie que irá lembrar o script que o internauta já visitou o site
}
$fp = @fopen($counter_file , "w"); //reabre o arquivo stats.txt
@fwrite($fp, $counter); //escreve o novo número de visitantes no arquivo
@fclose($fp); //fecha o arquivo

for ($i = 0; $i < strlen($counter); $i++){ //"anda" pelos números de $counter
    $imgsrc = substr($counter,$i ,1); //armazena o número que está sendo analisado em $imgsrc
    echo "<img src =\"includes/images/".$imgsrc.".gif\" TITLE=\"Visitas\">"; //carrega a imagem correspondente ao número de $imgsrc
}
?>
