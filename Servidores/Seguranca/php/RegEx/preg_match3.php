<?php
$string = 'abcdefghijklmnopqrstuvwxyz0123456789';

// Verificação case insensitive, para encontrar abc, ABC, Abc, AbC, etc
if(preg_match("/^ABC/i", $string))// Retorna 1 se encontrar
{
    echo 'A string começa com abc';
}else{
    echo 'Não encontrado';
}
