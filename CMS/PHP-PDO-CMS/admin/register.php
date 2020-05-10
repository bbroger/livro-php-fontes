<?php
	require '../includes/connection.php';

	if(isset($_POST['register'])) {
		$errMsg = '';

		// Get data from FROM
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$email = $_POST['email'];

		if($username == '')
			$errMsg = 'Enter username';
		if($password == '')
			$errMsg = 'Enter password';
		if($email == '')
			$errMsg = 'Enter an email';

		if($errMsg == ''){
			try {
				$query = $pdo->prepare('INSERT INTO users (user_name, user_password, user_email) VALUES (:username, :password, :email)');
				$query->execute(array(
					':username' => $username,
					':password' => $password,
					':email' => $email
					));
				header('Location: register.php?action=joined');
				exit();
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'joined') {
		$errMsg = 'Registration successfull. Now you can <a href="index.php">login</a>';
	}
?>

<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Content Management System</title>
      
      <!-- styling with css -->
      <link rel="stylesheet" href="../assets/style.css">

   </head>

   <body>
      <div class="container">
         <a href="../index.php" id="logo">CMS</a><br>

         <h4>Register Form</h4>

         <?php if(isset($errMsg)) { ?>
            <small style="color:#aa0000"><?php echo $errMsg; ?></small>
         <br><br>
         <?php } ?>

         <form action="register.php" method="POST">
            <input type="text" name="username" placeholder="Username"><br><br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <input type="text" name="email" placeholder="Email"><br><br>
            <input type="submit" name="register" value="Register">
         </form>

         <a href="index.php">&larr; Back to Admin</a>
      </div>
   </body>
   </html>
