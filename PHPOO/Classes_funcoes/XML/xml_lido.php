<?php
$xmlstr = <<<XML
<?xml version='1.0' encoding='ISO-8859-1' ?>
<filmes>
 <filme>
  <titulo>PHP: Iniciando o Parser</titulo>
  <personagens>
   <personagem>
   <nome>Jo�o de Brito</nome>
   <actor>Brito</actor>
   </personagem>
   <personagem>
   <nome>Manoel Cunha</nome>
   <actor>Manoel</actor>
   </personagem>
  </personagens>
  <comentario>
   O XML � uma linguagem. Ela � como uma linguagem de programa��o. Ou uma 
   linguagem de script? Tudo ser� revelado ap�s ler bem toda a 
   documenta��o.
  </comentario>
  <votos type="thumbs">7</votos>
  <votos type="stars">5</votos>
 </filme>
</filmes>
XML;
?> 