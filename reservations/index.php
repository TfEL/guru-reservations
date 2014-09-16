<?php
$failed = $_GET['failed'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservation Manager</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
	<h1>TfEL Access Manager</h1>
	<p>Login to use the Reservation Manager dashboard.</p>
    <div style="max-width: 350px; margin-left:auto; margin-right:auto;">
        <?php if($failed ==true) { echo '<br /><div class="alert alert-warning" role="alert"><p><strong>Oops:</strong> incorrect login, please try again.</p></div>'; } ?>
        <form action="login_format.php" method="post">
            <p><strong>Enter your @sa.gov.au email address</strong> this email address must be associated with the Teaching for Effective Learning team(s).<input type="email" name="emailaddress" placeholder="firstname.lastname@sa.gov.au" class="form-control" required="required"></p>
            <?php /* <p><strong>Password:</strong><input type="password" name="password" placeholder="password123" class="form-control" required="required"></p> */ ?>
            <p class="text-center"> <button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-ok"></span> Log In</button><div class="clearfix"></div></p>
        </form>
    </div>

	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
