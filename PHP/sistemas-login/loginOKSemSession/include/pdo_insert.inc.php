<?php 


try {
	require 'pdo_connection.inc.php';
	$stmt=$pdo->prepare("SELECT * FROM users WHERE email=?");
	$email=$_POST['email'];
	$stmt->bindValue(1, $email, PDO::PARAM_STR);
	$stmt->execute();

		if ($stmt->rowCount()>0) {
			
			echo ("<script>window.alert('Email $email taken! Please register with new account.')
				    window.location.href='../index.php';</script>");

		}else{
			try {
				$stmt=$pdo->prepare("INSERT INTO users (username, email, password) VALUES (?,?,?)");
				$username=$_POST['username'];
				$email=$_POST['email'];
				$password=strtolower(sha1($_POST['password']));

				$stmt->bindValue(1, $username, PDO::PARAM_STR);
				$stmt->bindValue(2, $email, PDO::PARAM_STR);
				$stmt->bindValue(3, $password, PDO::PARAM_STR);

				$stmt->execute();

				echo ("<script>window.alert('Nice job $username ! We will redirect you to login area!.')
				    window.location.href='../login_form.php';</script>");


				
			} catch (Exception $e) {
				echo "Error on user registratior : ".$e->getMessage();
			}
		}

} catch (Exception $e) {
	echo "Error: ".$e->getMessage();
}



 ?>