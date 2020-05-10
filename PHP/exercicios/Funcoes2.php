<?php

echo "<pre>
Fun��es s�o blocos de c�digo, conjuntos de instru��es, que ficam quietos,
sem vida, at� que sejam chamadas em algum lugar do c�digo.
Fun��es reduzem o trabalho de digita��o, o tamanho dos scripts em geral,
os erros, reaproveitando c�digo, facilitando e organizando o trabalho de
desenvolvimento.
</pre>";

echo "Exemplos de fun��es definidas pelo usu�rio<br>.";
function quadrado($numero) {
	print $numero*$numero;
}

//Executando:
quadrado(6); // Sa�da: 36

echo " Vari�veis globais<br>";
$var1 = 5;
function testeGlobal1(){
        $var1 = 1;
        print "<br>Valor de \$var1: $var1";
}
echo testeGlobal1();

echo "Vari�vel externa acess�vel na fun��o<br>";

$var2 = 10;
function testeGlobal2(){
        global $var2;
        print "<br>Valor de \$var2 $var2";
}
echo testeGlobal2();

$var5 = 15;
function testeGlobal5(){
	$var5 = 5;
    print "<br><br>A vari�vel global vale $GLOBALS[var5], ";
    print "J� a vari�vel local vale $var5<br><br>";
}

testeGlobal5();

function cliente($codigo, $idade = 18){
	print "C�digo = $codigo, Idade = $idade";
}       

cliente(1);  //Exibir�: C�digo = 1, Idade = 18

function cubo($num){
        return ($num*$num*$num);
}

$var1 = 2 * cubo(5);echo "<br>".$var1;

echo "Vari�veis est�ticas<br>";
function contador(){
        static $x = 0;
        return $x++;
}
echo "<br>";
echo contador();echo contador();echo contador();
//A sa�da ser�: 012

function contador2(){
        $x = 0;
        return $x++;
}
echo "<br>";
echo contador2();echo contador2();echo contador2();
//A sa�da ser�: 000.

  function staticfunction() {
   static $count = 0;
   $count++;
	if ($count==1){
       echo "A Fun��o foi executada $count vez<br>";
	}else{
	   echo "A Fun��o foi executada $count vezes<br>";
	}
  }

  for($i = 0; $i < 5; $i++) {
   staticfunction();
  }

function Teste1()
{
    static $a = 0;
    echo $a;
    $a++;
}

for($x=0;$x<=10;$x++){
	echo Teste1()." ";
}

echo "<br>";

echo "Recursiva<br>";
function Teste()
{
    static $count = 0;

    $count++;
    echo $count." ";
    if ($count < 10) {
        Teste ();
    }
    $count--;
}

Teste();

echo "Declarando vari�veis static<br>";
function foo(){
    static $int = 0;          // correro
   // static $int = 1+2;        // errado (� uma express�o)
   // static $int = sqrt(121);  // errado  (� uma express�o tamb�m)

    $int++;
    echo $int;
}


function aumentoSalario($sal, $perc=5){
        $salario = $sal * $perc/100;
        echo $salario;
}
echo "<br>Aumento: " . aumentoSalario(1956);

function redirecionar($url){
        header("Location: $url");
}
echo "<br>";
redirecionar("http://ribafs.phpnet.us/");
echo "<br>";

echo "Retornar mais de um valor de uma fun��o: usa-se arrays e list()
array() retorna e list() exibe <br>";

//Exemplo:

function recebe_hoje(){
	$data_abreviada=date("d/m/Y");
	$data_extensa=date("l, d F \d\e Y");
	
	return array($data_abreviada, $data_extensa);
}

list($data_abreviada, $data_extensa)=recebe_hoje();
	print $data_extensa;
echo "<br>";
	print $data_abreviada;


echo "Declara��o din�mica de fun��o:<br>";

if ($f == 1){
	function f1(){
		echo "funcao1";
	}
}else{
	function f2(){
		echo "funcao2";
	}
}

echo "Retornando o n�mero de argumentos de uma fun��o:<br>";

function ret_args_funcao() {
    $numargs = func_num_args();
    echo "N�mero de argumentos: $numargs<br>\n";
    if ($numargs >= 2) {
    echo "Segundo argumento vale : " . func_get_arg (1) . "<br>\n";
    }
    $arg_list = func_get_args();
    for ($i = 0; $i < $numargs; $i++) {
    echo "Argumento $i vale: " . $arg_list[$i] . "<br>\n";
    }
} 

ret_args_funcao (1, 2, 3);

echo "<pre>
Passando Argumentos atrav�s de Fun��es

O default � 'por valor', que passa uma c�pia do valor da vari�vel.

Tamb�m podemos passar 'por refer�ncia', onde se passa o endere�o da pr�pria vari�vel. Quando atribu�mos uma vari�vel a outra passando como refer�ncia, n�o fazemos c�pia alguma, mas sim passamos o endere�o da vari�vel original, portanto qualquer altera��o nesta refer�ncia refletir� na vari�vel original.

ByRef � mais eficiente em termos de mem�ria ao lidar com vari�veis e arrays grandes e tamb�m permite alterar o valor da vari�vel original, o que n�o acontece com o ByVal, mas a vantagem de desempnho somente � percebida em grandes arrays em grandes loops.

Para maior seguran�a setar:
allow_call_time_pass_reference no php.ini

Impede a passagem de valores por refer�ncia nas chamadas, mas permite somente na defini��o das fun��es.

$var1 = & $var2;
Agora ambas apontam para o mesmo endere�o e valor.

Reter valor de vari�veis entre chamadas (static)
(Guarda o valor da �ltima chamada at� o final da execu��o do script, tantas vezes quantas a fun��o for chamada).
</pre>";


//Exemplo:

$valor = 4;
$ref = &$valor; 

$ref = 3;       

$valor = 4;
$ref = &$valor; // Aqui tornamos ambas as vari�veis com o mesmo endere�o
                // O que alterarmos em $ref alteramos em $valor
                        
$ref = 3;       // Com isso tamb�m alteramos $valor para 3, veja abaixo.
echo $valor . "<br>";

$valor=0;	   // Com isso tamb�m alteramos $ref para 0, veja abaixo.

echo $ref;


echo "Por Valor<br>";
function val_subtracao($num1, $num2){
        if($num1 < $num2){
                die("N�meros negativos");
        }else{
                $return_result=0;
                while($num1 > $num2){
                        $num1 = $num1 - 1;
                        $return_result = $return_result + 1;
                }
        }
        return($return_result);
}

$primeiro_op=493;
$segundo_op=355;
$resultado1 = val_subtracao($primeiro_op, $segundo_op);
print ("Resultado1 � $resultado1<br>");
$resultado2 = val_subtracao($primeiro_op, $segundo_op);
print("Resultado2 � $resultado2<br>");

echo "Por Refer�ncia<br>";
function subtracao_ref(&$num1, &$num2){
        if($num1 < $num2){
                die("N�meros negativos");
        }else{
                $return_result=0;
                while($num1 > $num2){
                        $num1 = $num1 - 1;
                        $return_result = $return_result + 1;
                }
        }
        return($return_result);
}

$primeiro_op=493;
$segundo_op=355;
$resultado1 = subtracao_ref($primeiro_op, $segundo_op);
print ("<br><br>Resultado1 � $resultado1<br>");
$resultado2 = subtracao_ref($primeiro_op, $segundo_op);
print("Resultado2 � $resultado2<br>");

echo "Agora, se se n�s executarmos exatamente a mesma chamada da subtra��o como fizemos a primeira vez, receberemos a sa�da: resultado1 � 138 e resultado2 � 0";


/*
Sugest�o de chamada de fun��o:

if (nome_funcao($argumento){
	....
	....
}else{
	....
}

*/
?>

<?php
// Retorna o tipo e o valor de vari�vel
function ss_as_string (&$thing, $column = 0) {
    if (is_object($thing)) {
        return ss_object_as_string($thing, $column);
    }
    elseif (is_array($thing)) {
        return ss_array_as_string($thing, $column);
    }
    elseif (is_double($thing)) {
        return "Double(".$thing.")";
    }
    elseif (is_long($thing)) {
        return "Long(".$thing.")";
    }
    elseif (is_string($thing)) {
        return "String(".$thing.")";
    }
    else {
        return "Unknown(".$thing.")";
    }
}

// Retorna o tipo e o valor de array
function ss_array_as_string (&$array, $column = 0) {
    $str = "Array(<BR>\n";
    while(list($var, $val) = each($array)){
        for ($i = 0; $i < $column+1; $i++){
            $str .= "&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        $str .= $var.' ==> ';
        $str .= ss_as_string($val, $column+1)."<BR>\n";
    }
    for ($i = 0; $i < $column; $i++){
        $str .= "&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    return $str.')';
}

// Retorna o tipo e o valor de objeto
function ss_object_as_string (&$object, $column = 0) {
    if (empty($object->classname)) {
        return "$object";
    }
    else {
        $str = $object->classname."(<BR>\n";
        while (list(,$var) = each($object->persistent_slots)) {
            for ($i = 0; $i < $column; $i++){
                $str .= "&nbsp;&nbsp;&nbsp;&nbsp;";
            }
            global $$var;
            $str .= $var.' ==> ';
            $str .= ss_as_string($$var, column+1)."<BR>\n";
        }
        for ($i = 0; $i < $column; $i++){
            $str .= "&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        return $str.')';
    }
}

$var="Riba";
echo ss_as_string($var);
//echo ss_as_string($GLOBALS);


// Otimiza��o do tempo de execu��o

function ss_timing_start ($name = 'default') {
    global $ss_timing_start_times;
    $ss_timing_start_times[$name] = explode(' ', microtime());
}

function ss_timing_stop ($name = 'default') {
    global $ss_timing_stop_times;
    $ss_timing_stop_times[$name] = explode(' ', microtime());
}

function ss_timing_current ($name = 'default') {
    global $ss_timing_start_times, $ss_timing_stop_times;
    if (!isset($ss_timing_start_times[$name])) {
        return 0;
    }
    if (!isset($ss_timing_stop_times[$name])) {
        $stop_time = explode(' ', microtime());
    }
    else {
        $stop_time = $ss_timing_stop_times[$name];
    }
    // do the big numbers first so the small ones aren't lost
    $current = $stop_time[1] - $ss_timing_start_times[$name][1];
    $current += $stop_time[0] - $ss_timing_start_times[$name][0];
    return $current;
}

?>
