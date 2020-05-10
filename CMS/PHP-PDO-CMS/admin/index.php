<?php

session_start();

include_once('../includes/connection.php');

if(isset($_SESSION['logged_in'])) {
   // display index
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
         <a href="index.php" id="logo">CMS</a><br>
         
         <ol>
            <li><a href="add.php">Add Article</a></li>
            <li><a href="delete.php">Delete Article</a></li>
            <li><a href="logout.php">Log out</a></li>
         </ol>

         <a href="../index.php">&larr; Back to Posts</a>
      </div>
   </body>
   </html>

   <?php
}else {
   // display login and some validation
   if(isset($_POST['username'], $_POST['password'])){
      $username = $_POST['username'];
      $password = md5($_POST['password']);

      if(empty($username) || empty($password)) {
         $error = 'All fields are required!';
      }else {
         $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");
         $query->bindValue(1, $username);
         $query->bindValue(2, $password);

         $query->execute();

         $num = $query->rowCount();

         if($num == 1) {
            // user entered correct details
            $_SESSION['logged_in'] = true;

            header('Location: index.php');
            exit();
         }else{
            // user entered wrong details
            $error = 'Incorrect details!';
         }
      }
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
         <a href="../index.php" id="logo">CMS</a><br><br>

         <!-- error message for client -->
         <?php if(isset($error)) { ?>
            <small style="color:#aa0000"><?php echo $error; ?></small>
         <br><br>
         <?php } ?>

         <form action="index.php" method="POST" autocomplete="off">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Sign in">
         </form>

         <a href="register.php"><span id="register_link">or Sign up</span></a><br><br>
         
         <a href="../index.php">&larr; Go to Posts</a>

      </div>
   </body>
   </html>
   <?php 
}
?>
