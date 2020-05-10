<?php

include_once('includes/config.php');
include_once('includes/article.php');

// instantiate the class 
$article = new Article;

// checking if the user has specified an ID
if(isset($_GET['id'])) {
   // display the article
   $id = $_GET['id'];
   $data = $article->fetch_data($id);

   ?>
   <html lang="en">
   <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Content Management System</title>
   
   <!-- styling with css -->
   <link rel="stylesheet" href="assets/style.css">

   </head>
      <body>
         <div class="container">
            <a href="index.php" id="logo">CMS</a>
            <!-- Our Posts showing -->
            <h4>
               <?php echo $data['article_title']; ?>

               <small>
                  posted <?php echo date('Y-m-d', strtotime(str_replace('-','/', $data['article_timestamp']))); ?>
               </small>
            </h4>

            <p><?php echo $data['article_content']?></p>

            <a href="index.php">&larr; Back</a>

         </div>
      </body>
   </html>
   <?php 
}else{
   header('Location: index.php');
   exit();
}

?>
