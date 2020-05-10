<?php

session_start();

include_once('../includes/config.php');
include_once('../includes/article.php');

$article = new Article;

// checking if the user is logged
if(isset($_SESSION['logged_in'])) {
   if(isset($_GET['id'])){
      $id = $_GET['id'];
      $query = $pdo->prepare("DELETE FROM articles WHERE article_id = ?");
      $query->bindValue(1, $id);
      $query->execute();

      header('Location: delete.php');
   }

   $articles = $article->fetch_all();
   // display delete page
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

         <h4>Select an Article to Delete</h4>

         <form action="delete.php" method="GET">
            <select onchange="this.form.submit();" name="id">
               <option selected disabled>Please select one option</option>
               <?php foreach($articles as $article) { ?>
                  <option value="<?php echo $article['article_id']; ?>"> Select an Option
                  <?php echo $article['article_title']; ?></option>
               <?php } ?>
            </select>
         </form>
         <a href="index.php">&larr; Back</a>
         
   </body>
   </html>
   <?php
} else {
   header('Location: index.php');
}

?>