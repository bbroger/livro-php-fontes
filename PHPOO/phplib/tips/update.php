<?php
require_once('../classes/crud.php');
$table = $_GET['table'];
$crud = new Crud($pdo,$table);

$id=$_GET['id'];

if( basename($_SERVER['REQUEST_URI'], ".php")=='clientes'){
    $link = "<a href=\"../index.php?table=$table\" title=\"Voltar ao menu\">Aplicativo Automático</a>";
}else{
    $link = "<a href=\"./index.php?table=$table\" title=\"Voltar ao menu\">Aplicativo Automático</a>";
}

require_once('../header.php');
?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center"><h3><b><?=$link?> <br>Atualizar</h3></b></div>
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post" action="">
                <table class="table table-bordered table-responsive table-hover">
                <?php
                    // combo($tableFk, $tablePk, $idFk, $fk, $display, $id)
                    $fields = $crud->formFieldsUpdate('categories', 'id', 'category','category_id', 'tips',$id);
                    foreach($fields as $field){
                        print $field;
                    }
                ?>
                <input name="id" type="hidden" value="<?=$id?>">
                <tr><td></td><td><input name="send" class="btn btn-primary" type="submit" value="Editar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="send" class="btn btn-warning" type="button" onclick="location='index.php?table=<?=$table?>'" value="Voltar"></td></tr>
                </table>
            </form>
            <?php require_once('../footer.php'); ?>
        </div>
    <div>
</div>

<?php

if(isset($_POST['send'])){

   $crud->update();
}
?>

