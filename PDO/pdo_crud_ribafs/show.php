<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>PDO - Show Table</title>
 </head>

<?php
include_once("pdoCrud.php");

$obj=new pdoCrud;
if(isset($_REQUEST['status'])){
 echo"Atualização bem sucedida";
}

if(isset($_REQUEST['status_insert'])){
 echo"Cadastro bem sucedido";
}

if(isset($_REQUEST['del_id'])){
	if($obj->deleteData($_REQUEST['del_id'],"students")){
		echo"Registro excluído com sucesso";
	}
}
?>

 <a href="insert.php">Inserir</a>
 <h3 >Todos os Registros</h3>

<table width="750" border="1">
 <tr class="success">
 <th scope="col">Nome</th>
 <th scope="col">Celular</th>
 <th scope="col">Endereço</th>
 <th colspan="2">Ação</th>
 </tr>

<?php
 foreach($obj->showData("students") as $value){
 extract($value);
 echo <<<show
 <tr class="success">
 <td>$name</td>
 <td>$mobile</td>
 <td>$address</td>
 <td><a href="update.php?id=$id">Editar</a></td><td><a href="show.php?del_id=$id">Excluir</a></td>
 </tr>
show;
 }
?>

<tr class="success">
 <th scope="col" colspan="5" align="right">
 <div class="btn-group">
 <a href="insert.php">Inserir Novo Registro</a>
 </div>
 </th>
 </tr>
 </table>
</div>
<body>
</body>
</html>
