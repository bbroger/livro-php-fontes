<?php
// Gerador de senhas aleatórias
// Autor original - Murilo Miranda
// Adaptação de Ribamar FS

function senha_aleatoria($nc){
    $tamanho = $nc;// Número de caracteres
    $letras = array('b','c','d','f','g','h','j','k','l','m','n','p','r','s','t','v','w','x','z');
    $vogais = array('a','e','i','o','u');
    $numeros = array('1','2','3','4','5','6','7','8','9');
    $cur = 0;
    rand(1,$cur);
    $contador = 0;
    $senha = '';
    while($contador < $tamanho){
        $controle = rand(0,2);
        if($controle == 0){
            $numeroaleatorio = rand(0,18);
            $senha .= $letras[$numeroaleatorio];
        }elseif($controle == 1){
            $numeroaleatorio = rand(0,4);
            $senha .= $vogais[$numeroaleatorio];
        }elseif($controle == 2){
            $numeroaleatorio = rand(0,8);
            $senha .= $numeros[$numeroaleatorio];
        }
        $contador++;
    }
    return $senha;
}

print senha_aleatoria(12);
?>

