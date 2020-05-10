<?php
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
ob_start();
session_start();

define('DB_DRIVER', 'mysql');
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'mysql');
define('DB_DATABASE', 'agenda');

define('PROJECT_NAME', 'Agenda de Ribamar, Familiares e Amigos - https://agenda.ribafs.org');
$dboptions = array(
              PDO::ATTR_PERSISTENT => FALSE, 
              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            );

try {
  $DB = new PDO(DB_DRIVER.':host='.DB_SERVER.';dbname='.DB_DATABASE, DB_USER, DB_PASS , $dboptions);  
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}

//get error/success messages
if ($_SESSION["errorType"] != "" && $_SESSION["errorMsg"] != "" ) {
    $ERROR_TYPE = $_SESSION["errorType"];
    $ERROR_MSG = $_SESSION["errorMsg"];
    $_SESSION["errorType"] = "";
    $_SESSION["errorMsg"] = "";
}
?>
