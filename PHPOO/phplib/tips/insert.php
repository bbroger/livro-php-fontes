<?php
require_once('../header.php');
require_once('../classes/crud.php');

if(isset($_REQUEST['table'])){
    $table = $_REQUEST['table'];
}
//print '<h1>'.$table.'</h1>';

$crud = new Crud($pdo,$table);

if( basename($_SERVER['REQUEST_URI'], ".php")=='clientes'){
    $link = "<a href=\"../index.php?table=$table\" title=\"Voltar ao menu\">Aplicativo Automático</a>";
}else{
    $link = "<a href=\"./index.php?table=$table\" title=\"Voltar ao menu\">Aplicativo Automático</a>";
}
/*
    function combo($tableFk, $idFk, $displayFk, $selected=null){ // $sql='select id,descricao from produtos'
        global $crud;
        $sql = 'select '.$idFk.', '.$displayFk.' from '.$tableFk;
        $smt = $crud->pdo->prepare($sql);       // $sql do update = 'select produto_id,descricao from produtos',$produto_id
        $smt->execute();
        $data = $smt->fetchAll();
        print "\n\t\t".'<select name="category_id" class="form-control">';
        foreach ($data as $row){
            if($selected == $row["$idFk"]){
//print '</table>'.$selected .'-'.$row['id'];
                print "\t\t".'<option value='.$row["$idFk"].' selected>'.$row["$displayFk"].'</option>'."\n";
            }else{
                print "\t\t".'<option value='.$row["$idFk"].'>'.$row["$displayFk"].'</option>'."\n";
            }
//exit;
        }
        print "\t\t".'</select>'."\n";
    }
*/
?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center"><h3><b><?=$link?></b> <br>(Adicionar)</h3></div>
        <div class="row">

        <div class="col-md-1"></div>
        <div class="col-md-8">
        <table class="table table-bordered table-responsive table-hover">    
            <form method="POST" action="insert.php">
            <?php //combo($tableFk, $idFk, $displayFk, $selected)
                $fields = $crud->formFieldsInsert('categories', 'id','category','category_id');
                foreach($fields as $field){
                    print $field;
                }       
//$tableFk, $idFk, $displayFk, $selected=null
//print combo('categories', 'id', 'category', 'category_id');
            ?>
            <input type="hidden" name="table" value="<?=$table?>">
            <tr><td></td><td><input class="btn btn-primary" name="enviar" type="submit" value="Cadastrar">&nbsp;&nbsp;&nbsp;
            <input class="btn btn-warning" type="button" onclick="location='index.php?table=<?=$table?>'" value="Voltar"></td></tr>
            </form>
        </table>
        </div>
    </div>
</div>

<?php
if(isset($_POST['enviar'])){
    $crud->insert();
}

require_once('../footer.php'); ?>

