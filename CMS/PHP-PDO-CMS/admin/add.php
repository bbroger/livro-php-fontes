<?php

session_start();

include_once('../includes/config.php');

// check if the user is logged in
if(isset($_SESSION['logged_in'])) {
   // display add page and validation
   if(isset($_POST['title'], $_POST['content'])) {
      $title = $_POST['title'];
      // nl2br() adds linebreaks
      $content = nl2br($_POST['content']);
      $date = date('Y/m/d');

      if(empty($title) || empty($content)){
         $error = 'All fields are required!';
      }else {
         $query = $pdo->prepare("INSERT INTO articles SET article_title = ?, article_content = ?, article_timestamp = ?");

         $query->bindValue(1, $title);
         $query->bindValue(2, $content);
         $query->bindValue(3, $date);

         $query->execute();

         header('Location: index.php');
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
            
            <h4>Add Article</h4>

            <!-- error message for client -->
            <?php if(isset($error)) { ?>
               <small style="color:#aa0000"><?php echo $error; ?></small>
            <br><br>
            <?php } ?>

            <form action="add.php" method="POST">
               <input type="text" name="title" placeholder="Title"><br><br>
               <textarea name="content" cols="50" rows="15" placeholder="Content"></textarea><br><br>
               <input type="submit" value="Add Article">
            </form>
            <a href="index.php">&larr; Back</a>
         </div>
      </body>
      </html>

   <?php
}else {
   header("Location: index.php");
}
?>
