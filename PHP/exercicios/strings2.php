<?php
echo 'isto � uma string comum<br>';

echo 'Voc� pode incluir novas linhas em strings,
dessa maneira que estar�
tudo bem<br>';

// Imprime: Arnold disse uma vez: "I\'ll be back"
echo 'Arnold once said: "I\'ll be back"<br>';

// Imprime: Voc� tem certeza em apagar C:\*.*?
echo 'Voc� tem certeza em apagar C:\\*.*?<br>';

// Imprime: Voc� tem certeza em apagar C:\*.*?
echo 'Voc� tem certeza em apagar C:\*.*?<br>';

// Imprime: Isto n�o ser� substituido: \n uma nova linha
echo 'Isto n�o ser� substituido: <br> uma nova linha<br>';

// Imprime: Variaveis $tamb�m n�o $expandem
echo 'Variaveis $tamb�m n�o $expandem<br>';

echo '<br>------------<br>';

$str = <<<EOD
Exemplo de uma string
distribu�da em v�rias linhas
utilizando a sintaxe heredoc.
EOD;

/* Exemplo mais complexo, com vari�veis */
class foo
{
   var $foo;
   var $bar;

   function foo()
   {
       $this->foo = 'Foo';
       $this->bar = array('Bar1', 'Bar2', 'Bar3');
   }
}

$foo = new foo();
$name = 'Meu nome';

echo <<<EOT
Meu nome � "$name". Eu estou imprimindo $foo->foo.
Agora, eu estou imprimindo {$foo->bar[1]}.
Isto deve imprimir um 'A' mai�sculo: \x41
EOT;

?>
