# Pegar a URL principal php

Classe ideal para ajudar a pegar a url base de um projeto automaticamente independente de onde estiver instalado, esta classe se responsabiliza de obter a url base principal.

#Instruções de uso
```
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pegar a url principal php</title>
</head>
<body>
	<?php
	
		include '../baseURI.php';
		$uri = URI::base();
		echo $uri;
	?>
</body>
</html>

```
