<?php 


if (isset($_POST['btn_cnf'])) {
	try {
		require 'pdo_connection.inc.php';
		$stmt=$pdo->prepare("SELECT * FROM users WHERE email=? AND password=?");
		$email=$_POST['email'];
		$password=strtolower(sha1($_POST['password']));
		$stmt->bindValue(1, $email, PDO::PARAM_STR);
		$stmt->bindValue(2, $password, PDO::PARAM_STR);

		$stmt->execute();

		if ($stmt->rowCount()>0) {
			while ($row=$stmt->fetch()) {
				$username=$row['username'];
			}
			session_start();
			$_SESSION['username']=$username;
			echo ("<script charset=\"utf-8\">window.alert('Welcome dear $username. You are now registered!')
				    window.location.href='../welcome_page.php';</script>");
		}else{
			echo ("<script>window.alert('Sorry, but you are now registered!. Try again or register new account!')
				    window.location.href='../login_form.php';</script>");
		}


		
	} catch (Exception $e) {
		
	}
}


 ?>