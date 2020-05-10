# Agenda com Phonegap

Adaptado das vídeo aulas
Cadastro de Clientes com PhoneGap

Simplifiquei e criei apenas uma agenda com id e nome

https://www.youtube.com/watch?v=pxAAIbU3X9c

## Criar app

phonegap create agenda org.ribafs.agenda Agenda

- cd agenda
- Editar o www/index.html

Remover tudo entre <body> e </body>:
```html
<head>
<link rel="stylesheet" href="js/jquery.mobile-1.4.5.min.css" />
</head>
<body>
	<form id="formCliente">
		ID <input type="text" name="id"><br>
		Nome <input type="text" name="nome"><br>
		<button onClick="salvar();" type="submit">Enviar</button>
	</form>
	
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery.mobile-1.4.5.min.js"></script>
	
</body>
```
## Efetuar deploy para o build na nuvem
- cd app
- phonegap remote run android
- Ao final ele gera um QRCode e exibe na tela.

## Criar banco
Criar o banco agenda com uma tabela contatos e os campos id e nome apenas.

Editar o www/index.html e adicionar ao final:
```html
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="msapplication-tap-highlight" content="no" />
        <!-- WARNING: for iOS 7, remove the width=device-width and height=device-height attributes. See https://issues.apache.org/jira/browse/CB-4323 -->
		<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
		<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css" />
		<style>
			.margem{
				margin: 10px;
			}
		</style>
	</head>
<body>

<div data-role="page">
	<div data-role="header">
		<h1>Agenda de Contatos</h1>
	</div><!-- /header -->
	
	<form id="formContatos">
		&nbsp;ID<span> <input type="text" name="id">
		&nbsp;Nome <input type="text" name="nome">
		<button onClick="salvar();" type="submit">Enviar</button>
	</form>
	
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery.mobile-1.4.5.min.js"></script>

        <script type="text/javascript" src="cordova.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <script type="text/javascript">
            app.initialize();
        </script>	
</div>		

// AJAX para pegar informações do servidor externo

<script>
	function salvar(){
		var formula = $('formContatos').serialize(); // Trazer todos os campos do form para a variável formula
		$.ajax({
			type: 'POST',
			data: formula,
			url: 'http://localhost/agenda/cadastro.php',
			success: function(data){
				if(data == '' || data == 0){
					alert('Ocorreu erro no banco!');
					window.location = ""; // para refresh
				}
				if(data == 1){
					alert('Registro salvo com sucesso!');
					window.location = "";
				}				
			}
		});
	}
</script>

</body>
</html>
```
Por padrão um app do Phonegap não funciona em servidor externno, apenas localmente.

Para que funcione em servidor externo precisamos configurar no config.xml.

## Criar os arquivos:

- conexao.php
- cadastro.php
- tabela.php

conexao.php
```php
<?php
$dsn = 'mysql:host=localhost;dbname=agenda';
$user = 'root';
$pass = 'mysql';

$conexao = new PDO($dsn, $user, $pass);

$stml = $conexao->query("SELECT * from contatos ORDER BY id DESC");

?>
```
cadastro.php

```php
<?php
include_once('./conexao.php');

$nome = mysql_real_escape_string($_REQUEST['nome']);

$sql = "INSERT INTO contatos (nome) VALUES ('$nome')";
$res = mysql_query($sql);

if($res == TRUE){
	$cadastro = 1;
}else{
	$cadastro = 0;
}

echo (json_encode($cadastro));
```

tabela.php
```php
<?php
include_once('./conexao.php');
?>
<table align="center" border="1">
	<thead>
		<tr>
			<th>ID</th><th>Nome</th>
		</th>
	</thead>
	
	<tbody>
		<?php foreach($stml as $valor){ ?>
		<tr>
			<td><?=$valor['id']?></td><td><?=$valor['nome']?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
```
Aplicação acessando aplicativo PHP+MySQL externo

- Mudar a url do ajax na index.html
- Criar banco e arquivos no servidor externo (conexao, cadastro e tabela).
- Mudar os dados do banco de dados, de acordo com o server exteerno.

## Mudar no config.xml:
```xml
<preference name="permissions"	value="true"/>

<access origin="http://URLservidorexterno.org"/>
```

