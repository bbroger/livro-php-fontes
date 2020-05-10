<?php
// Exemplos de fun��es definidas pelo usu�rio
function quadrado($numero) {
	print $numero*$numero;
}

//Executando:
quadrado(6); // Sa�da: 36

// Vari�veis globais
$var1 = 5;
function testeGlobal1(){
        $var1 = 1;
        print "<br>Valor de \$var1: $var1";
}
echo testeGlobal1();
//Vari�vel externa acess�vel na fun��o

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

function aumentoSalario($sal, $perc=5){
        $salario = $sal * $perc/100;
        echo $salario;
}
echo "<br>Aumento: " . aumentoSalario(1956);

function redirecionar($url){
        header("Location: $url");
}
echo "<br>";
redirecionar("http://127.0.0.1/phpcursos/");
echo "<br>";
// Com acesso a bancos de dados
function autenticar($Campo1Frm, $Campo2Frm, $Campo1Tb, $Campo2Tb, $Tabela, $urlAcesso){
        // Ir� testar se o usuario de um form anterior (POST) pertence a 
        // uma tabela. O Campo deve ser chave prim�ria da tabela
        // Caso perten�a ser� redirecionado para a $url, 
        // caso contr�rio voltar� para a anterior
        $Campo1Frm=$_POST[$Campo1Frm];
        $Campo2Frm=$_POST[$Campo2Frm];

        $strConsulta = "SELECT * FROM $Tabela WHERE $Campo1Tb='$Campo1Frm' 
						AND $Campo2Tb='$Campo2Frm'";
        $resultado = pg_query($strConsulta) or die("A consulta falhou:<br> " . pg_last_error());
        
        $numregs = pg_numrows($resultado);
        // Como o campo � chave prim�ria, somente devemos encontrar um �nico registro que atenda
   if ($numregs == 1){
        header("Location:$urlAcesso");
   } else {
      ?><script>
        alert('Dados n�o conferem. Verifique se n�o cometeu erros!');
        history.back();
        //Para frente �: history.forward(); 
      </script>    
      <?
      pg_close();         // Os @ escondem as mensagens de erro originais 
   }
}

// Chamando
//autenticar($Campo1Frm, $Campo2Frm, $Campo1Tb, $Campo2Tb, $Tabela, $urlAcesso);
?>

<?php declare(strict_types=1); // strict requirement ?>

<?php
function setAltura(int $minAltura = 50) {
    echo "The height is : $minAltura <br>";
}

setAltura(350);
setAltura();

<?php declare(strict_types=1); // strict requirement ?>

<?php
function sum(int $x, int $y) {
    $z = $x + $y;
    return $z;
}

echo "5 + 10 = " . sum(5,10) . "<br>";
echo "7 + 13 = " . sum(7,13) . "<br>";


