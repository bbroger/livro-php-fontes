<?php
$string = 'abcdefghijklmnopqrstuvwxyz0123456789';

echo preg_match("/abc/", $string);// Retorna 1 se encontrar. A função preg_match para ao encontrar a primeira ocorrência

