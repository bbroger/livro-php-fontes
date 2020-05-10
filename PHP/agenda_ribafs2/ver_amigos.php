<?php
/*
 * @author Shahrukh Khan
 * @website http://www.thesoftwareguy.in
 * @facebbok https://www.facebook.com/Thesoftwareguy7
 * @twitter https://twitter.com/thesoftwareguy7
 * @googleplus https://plus.google.com/+thesoftwareguyIn
 */
require_once './config.php';
include './cabecalho.php';
try {
   $sql = "SELECT * FROM amigos WHERE 1 AND id = :cid";
   $stmt = $DB->prepare($sql);
   $stmt->bindValue(":cid", intval($_GET["cid"]));
   
   $stmt->execute();
   $results = $stmt->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}

?>

<div class="row">
  <ul class="breadcrumb">
      <li><a href="index.php"><< Início</a></li>
      <li class="active">Visualizar Amigos</li>
    </ul>
</div>

  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Visualizar Amigo</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" name="contact_form" id="contact_form" enctype="multipart/form-data" method="post" action="processar.php">
          <fieldset>
            <div class="form-group">
              <label class="col-lg-4 control-label" for="first_name"><span class="required">*</span>Nome:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" placeholder="Nome" value="<?php echo $results[0]["nome"] ?>" id="nome" class="form-control" name="nome"><span id="nome_err" class="error"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label" for="last_name">E-mail:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" value="<?php echo $results[0]["email"] ?>" placeholder="E-mail" id="email" class="form-control" name="email"><span id="email_err" class="error"></span>
              </div>
            </div>            
<?php
  $partes = explode('-', $results[0]["nascimento"]);
  $results[0]["nascimento"]  = "$partes[2]/$partes[1]/$partes[0]";
?>
            <div class="form-group">
              <label class="col-lg-4 control-label" for="nascimento">Nascimento:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" value="<?php echo $results[0]["nascimento"] ?>" placeholder="Data de nascimento" id="nascimento" class="form-control" name="nascimento"><span id="nascimento_err" class="error"></span>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="endereco">Endereço:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" value="<?php echo $results[0]["endereco"] ?>" placeholder="Endereço" id="endereco" class="form-control" name="endereco"><span id="endereco_err" class="error"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label" for="fone">Telefone:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" value="<?php echo $results[0]["fone"] ?>" placeholder="Telefone fixo" id="fone" class="form-control" name="fone"><span id="fone_err" class="error"></span>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="celular">Celular:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" value="<?php echo $results[0]["celular"] ?>" placeholder="Celular" id="celular" class="form-control" name="celular"><span id="celular_err" class="error"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-4 control-label" for="obs">Observação:</label>
              <div class="col-lg-5">
                <textarea id="address" readonly="" name="obs" rows="5" class="form-control"><?php echo $results[0]["obs"] ?></textarea>
              </div>
            </div>

          </fieldset>
        </form>

      </div>
    </div>
  </div>
<?php
include './rodape.php';
?>
