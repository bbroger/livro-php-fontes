# mini-router versão 1

Esta versão não usa namespace.
    
Funciona somente no raiz do documentRoot, não funciona em subdiretórios.
Caso queira rodar em subdiretório precisa efetuar alterações no método splitUrl().

Exemplo:

Caso seja instalado em um subdir assim:

/var/www/html/sd1/sd2/meuapp

Então precisará ajustas a linha no método splitUrl() para:

$url = array_splice($url, $ret+1);

A regra é, desceu para o terceiro nível, então altere para ...$ret+4, ou seja, soma 3 ao 1 existente
