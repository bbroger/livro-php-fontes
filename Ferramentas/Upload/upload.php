<!DOCTYPE html>
<html>
<head>
  <title>Envie seu arquivo</title>
</head>
<body>
  <form enctype="multipart/form-data" action="upload.php" method="POST">
    <p>Upload your file</p>
    <input type="file" name="uploaded_file"></input><br />
    <input type="submit" value="Enviar"></input>
  </form>
</body>
</html>
<?PHP
  if(!empty($_FILES['uploaded_file']))
  {
    $path = "salvos/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "O arquivo ".  basename( $_FILES['uploaded_file']['name']). 
      " foi enviado com sucesso!";
    } else{
        echo "Erro ao enviar o arquivo, tente novamente!";
    }
  }
?>
