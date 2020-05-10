<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


<div class="login">
	<h1>User Registration Form</h1>
    <form id="register_form" method="post" action="include/pdo_insert.inc.php" accept-charset="utf-8">
    	<input id="username" type="text" name="username" placeholder="username" class="required"><br>
    	<input id="email" type="email" name="email" placeholder="email"><br>
        <input id="password" type="password" name="password" placeholder="password"><br>
        <button type="submit" class="btn btn-primary btn-block btn-large" name="btn_cnf"><br>
        Register User</button>
    </form><br>
    <a class="btn btn-primary btn-block btn-large" href="login_form.php" role="button">Login</a>
</div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
    <script src="js/validation.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>
