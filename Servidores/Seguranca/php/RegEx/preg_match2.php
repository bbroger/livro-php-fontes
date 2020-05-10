<?php
$string = 'abcdefghijklmnopqrstuvwxyz0123456789';
// Verificar se a string inicia com abc
if(preg_match("/^abc/", $string))// Retorna 1 se encontrar
{
    echo 'A string começa com abc';
}else{
    echo 'Não encontrado';
}
