<?php

require './config.php';
$mode = $_REQUEST["mode"];
if ($mode == "add_new" ) {
  $nome = trim($_POST['nome']);
  $email = trim($_POST['email']);

  $nascimento = trim($_POST['nascimento']);
  $partes = explode('/', $nascimento);
  $nascimento  = "$partes[2]-$partes[1]-$partes[0]";
  $endereco = trim($_POST['endereco']);
  $fone = trim($_POST['fone']);
  $celular = trim($_POST['celular']);
  $obs = trim($_POST['obs']);
  $filename = "";
  $error = FALSE;

  if (!$error) {
    $sql = "INSERT INTO `amigos` (`nome`, `email`, `nascimento`, `endereco`, `fone`, `celular`, `obs`) VALUES "
            . "( :nome, :email, :nascimento, :endereco, :fone, :celular, :obs)";

    try {
      $stmt = $DB->prepare($sql);

      // bind the values
      $stmt->bindValue(":nome", $nome);
      $stmt->bindValue(":email", $email);
      $stmt->bindValue(":nascimento", $nascimento);
      $stmt->bindValue(":endereco", $endereco);
      $stmt->bindValue(":fone", $fone);
      $stmt->bindValue(":celular", $celular);
      $stmt->bindValue(":obs", $obs);

      // execute Query
      $stmt->execute();
      $result = $stmt->rowCount();
      if ($result > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Amigo adicionado com sucesso.";
      } else {
        $_SESSION["errorType"] = "danger";
        $_SESSION["errorMsg"] = "Falha ao adicionar amigo.";
      }
    } catch (Exception $ex) {

      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
    }
  }
  header("location:index.php");
} elseif ( $mode == "update_old" ) {
  
  $nome = trim($_POST['nome']);
  $email = trim($_POST['email']);
  $nascimento = trim($_POST['nascimento']);
  $partes = explode('/', $nascimento);
  $nascimento  = "$partes[2]-$partes[1]-$partes[0]";

  $endereco = trim($_POST['endereco']);
  $fone = trim($_POST['fone']);
  $celular = trim($_POST['celular']);
  $cid = trim($_POST['cid']);
  $obs = trim($_POST['obs']);
  $filename = "";
  $error = FALSE;

  if (!$error) {
    $sql = "UPDATE `amigos` SET `nome` = :nome, `email` = :email, `nascimento` = :nascimento, `endereco` = :endereco, `fone` = :fone, `celular` = :celular, `obs` = :obs  "
            . "WHERE id = :cid ";

    try {
      $stmt = $DB->prepare($sql);

      // bind the values
      $stmt->bindValue(":nome", $nome);
      $stmt->bindValue(":email", $email);
      $stmt->bindValue(":nascimento", $nascimento);
      $stmt->bindValue(":endereco", $endereco);
      $stmt->bindValue(":fone", $fone);
      $stmt->bindValue(":celular", $celular);
      $stmt->bindValue(":obs", $obs);
      $stmt->bindValue(":cid", $cid);

      // execute Query
      $stmt->execute();
      $result = $stmt->rowCount();
      if ($result > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Amigo atualizado com sucesso.";
      } else {
        $_SESSION["errorType"] = "info";
        $_SESSION["errorMsg"] = "Nenhuma alteração feita no amigo.";
      }
    } catch (Exception $ex) {

      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
    }
  }
  header("location:index.php?pagenum=".$_POST['pagenum']);
} elseif ( $mode == "delete" ) {
   $cid = intval($_GET['cid']);
   
   $sql = "DELETE FROM `amigos` WHERE id = :cid";
   try {
     
      $stmt = $DB->prepare($sql);
      $stmt->bindValue(":cid", $cid);
        
       $stmt->execute();  
       $res = $stmt->rowCount();
       if ($res > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Amigo excluído com sucesso.";
      } else {
        $_SESSION["errorType"] = "info";
        $_SESSION["errorMsg"] = "Falha ao excluir o amigo.";
      }
     
   } catch (Exception $ex) {
      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
   }
   
   header("location:index.php?pagenum=".$_GET['pagenum']);
}
?>
