<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Insert Data - PDO</title>
 </head>
<body>

<?php
 include_once("pdoCrud.php");

$obj=new pdoCrud;

if(isset($_REQUEST['insert'])){
 extract($_REQUEST);
 if($obj->insertData($name,$email,$mobile,$address,"students")){
	header("location:show.php?status_insert=success");
 }
}
echo @<<<show
 <a href="show.php">Início</a>
 </div>
 <h3>Inserir Seus Dados</h3>
 <form action="insert.php" method="post">
 <table width="400" class="table-borderd">
 <tr>
 <th scope="row">Id</th>
 <td><input type="text" name="id" value="$id" readonly="readonly"></td>
 </tr>
 <tr>
 <th scope="row">Nome</th>
 <td><input type="text" name="name" value="$name"></td>
 </tr>
 <tr>
 <th scope="row">E-mail</th>
 <td><input type="text" name="email" value="$email"></td>
 </tr>
 <tr>
 <th scope="row">Celular</th>
 <td><input type="text" name="mobile" value="$mobile"></td>
 </tr>
 <tr>
 <th scope="row">Endereço</th>
 <td><textarea rows="5" cols="20" name="address">$address</textarea></td>
 </tr>
 <tr>
 <th scope="row">&nbsp;</th>
 <td><input type="submit" name="insert" value="Inserir" class="btn"></td>
 </tr>
 </table>
 </form>
</div>
show;
?>
</body>
</html>
