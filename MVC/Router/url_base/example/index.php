<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pegar a url principal php</title>
</head>
<body>
    <h3>Pegar a url principal</h3>
	<?php
	
		include '../baseURI.php';

		$uri = URI::base();

		echo $uri;
	?>
</body>
</html>
