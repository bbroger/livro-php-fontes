<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


<div class="login">
    <?php if(isset($_SESSION['username'])){ ?>
    <h1>Welcome <?php echo strtoupper($_SESSION['username']); ?>. This is content area.</h1>
    <form action="include/pdo_logout.inc.php" method="get">
       <button type="submit" class="btn btn-primary btn-block btn-large" name="btn_cnf">LogOut</button>
    </form>

    
</div>
<?php }else{?>


    <div class="login">
    
    <h1>This area is for registered users only!</h1>
    
    <a class="btn btn-primary btn btn-block" href="index.php" role="button">REGISTER</a><br>
    <a class="btn btn-primary btn btn-block" href="login_form.php" role="button">LOGIN</a>
    
<?php } ?>
    
</div>

</body>
</html>
