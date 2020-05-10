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
      <li class="active"><?php echo ($_GET["m"] == "update") ? "Edit" : "Add"; ?> Amigos</li>
    </ul>
</div>

  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo ($_GET["m"] == "update") ? "Edit" : "Add"; ?> Novo Amigo</h3>
      </div>
      <div class="panel-body">

        <form class="form-horizontal" name="contact_form" id="contact_form" enctype="multipart/form-data" method="post" action="processar.php">
          <input type="hidden" name="mode" value="<?php echo ($_GET["m"] == "update") ? "update_old" : "add_new"; ?>" >
          <input type="hidden" name="cid" value="<?php echo intval($results[0]["id"]); ?>" >
          <input type="hidden" name="pagenum" value="<?php echo $_GET["pagenum"]; ?>" >
          <fieldset>
            <div class="form-group">
              <label class="col-lg-4 control-label" for="first_name"><span class="required">*</span>Nome:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["nome"] ?>" placeholder="Nome" id="nome" class="form-control" name="nome"><span id="nome_err" class="error"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label" for="email">E-mail:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["email"] ?>" placeholder="E-mail" id="email" class="form-control" name="email"><span id="email_err" class="error"></span>
              </div>
            </div>            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="nascimento">Nascimento:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["nascimento"] ?>" placeholder="Nascimento dia/mês/ano/" id="nascimento" class="form-control" name="nascimento"><span id="nascimento_err" class="error"></span>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="contact_no1">Endereço:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["endereco"] ?>" placeholder="Endereço" id="endereco" class="form-control" name="endereco"><span id="endereco_err" class="error"></span>
                <span class="help-block">Rua e Número.</span>
              </div>
            </div>            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="fone">Telefone:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["fone"] ?>" placeholder="Telefone" id="fone" class="form-control" name="fone"><span id="fone_err" class="error"></span>
                <span class="help-block">Máximo de 10 dígitos e somente números.</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label" for="celular">Celular:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["celular"] ?>" placeholder="Celular" id="celular" class="form-control" name="celular"><span id="celular_err" class="error"></span>
                <span class="help-block">Máximo de 10 dígitos e somente números.</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label" for="obs">Observação:</label>
              <div class="col-lg-5">
                <textarea id="obs" name="obs" rows="5" class="form-control"><?php echo $results[0]["obs"] ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-5 col-lg-offset-4">
                <button class="btn btn-primary" type="submit">Enviar</button> 
              </div>
            </div>
          </fieldset>
        </form>

      </div>
    </div>
  </div>

<script type="text/javascript">
$(document).ready(function() {
	
	// the fade out effect on hover
	$('.error').hover(function() {
		$(this).fadeOut(200);  
	});
	
	
	$("#contact_form").submit(function() {
		$('.error').fadeOut(200);  
		if(!validateForm()) {
            // go to the top of form first
            $(window).scrollTop($("#contact_form").offset().top);
			return false;
		}     
		return true;
    });

});

function validateForm() {
	 var errCnt = 0;
	 
	 var nome = $.trim( $("#nome").val());
	 var email = $.trim( $("#email").val());
	 var fone = $.trim( $("#fone").val());
	 var celular = $.trim( $("#celular").val());
     
	// validate nome
	if (nome == "" ) {
		$("#nome_err").html("Entre seu nome.");
		$('#nome_err').fadeIn("fast"); 
		errCnt++;
	}  else if (first_name.length <= 2 ) {
		$("#nome_err").html("Entre pelo menos 3 letras.");
		$('#nome_err').fadeIn("fast"); 
		errCnt++;
	}
    
    if (!isValidEmail(email)) {
		$("#email_err").html("Entre um e-mail válido.");
		$('#email_err').fadeIn("fast"); 
		errCnt++;
	}
    
	if(errCnt > 0) return false; else return true;
}

function isValidEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
</script>
<?php
include './rodape.php';
?>
