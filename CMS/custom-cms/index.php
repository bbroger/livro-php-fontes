<?php
include_once('includes/config.php');
include_once('includes/article.php');

$article = new Article;
$articles = $article->fetch_all();

?>

<!DOCTYPE html>
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

      <!-- if there are no Articles -->
      <?php
        if(empty($articles)) {
          echo "<p style='color:orangered';>No Posts yet!</p>";
        }
      ?>

      <ol>
        <?php foreach ($articles as $article) {?>
          <li>
            <a href="article.php?id=<?php echo $article['article_id'] ?>">
              <?php echo $article['article_title']; ?>
            </a>

            - <small>
              posted <?php echo date('Y-m-d', strtotime(str_replace('-','/', $article['article_timestamp']))); ?>
            </small>
          </li>
        <?php } ?>    
      </ol>
      <br>
      <a href="admin">Admin Panel &rarr;</a>
   </div>
</body>
</html>
