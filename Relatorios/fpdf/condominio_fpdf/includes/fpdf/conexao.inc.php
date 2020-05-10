<?
$str_conexao="host=127.0.0.1 dbname=p4a port=5432 user=postgres password=suasenha";
$conexao=pg_connect($str_conexao);            
// O @ à esquerda de pg_connect esconde os erros do PG e mostra somente a mensagem abaixo

if (!$conexao){
    echo "Houve erro ao conectar ao banco" . pg_last_error();
    echo "<br><br>Informe a mensagem acima ao suporte pelo fone 9999 ou pelo e-mail suporte@suporte.com.br <br>";    
}
?>