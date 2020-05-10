<?php
$cep = '22710-045';
$names = array('Diogo', 'Renato', 'Gomes', 'Thiago', 'Leonardo');
$text = 'Lorem ipsum dolor sit amet, consectetuer adipiscing.';
 
// Validação de CEP
$er = '/^(\d){5}-(\d){3}$/';
if(preg_match($er, $cep)) {
    echo "O cep casou com a expressão.";
}
// Resultado: O cep casou com a expressão.
 
// Busca e substitui nomes que tenham "go", case-insensitive
$er = '/go/i';
$pregReplace = preg_replace($er, 'GO', $names);
print_r($pregReplace);
// Resultado: DioGO, Renato, GOmes, ThiaGO, Leonardo
 
// Busca e substitui nomes que terminam com "go"
$er = '/go$/';
$pregFilter = preg_filter($er, 'GO', $names);
print_r($pregFilter);
// Resultado: DioGO, ThiaGO
 
// Resgatar nomes que começam com "go", case-insensitive
$er = '/^go/i';
$pregGrep = preg_grep($er, $names);
print_r($pregGrep);
// Resultado: Gomes
 
// Divide o texto por pontos e espaços, que podem ser seguidos por espaços
$er = '/[[:punct:]\s]\s*/';
$pregSplit = preg_split($er, $text);
print_r($pregSplit);
// Resultado: Array de palavras
 
// callback, retorna em letras maiúsculas
$callback = function($matches) {
    return strtoupper($matches[0]);
};
 
// Busca e substitui de acordo com o callback
$er = '/(.*)go$/';
$pregCallback = preg_replace_callback($er, $callback, $names);
print_r($pregCallback);
// Resultado: DIOGO, Renato, Gomes, THIAGO, Leonardo
?>
