<!doctype html>
<?php
if(empty($_POST)) {



//session_destroy();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">
	



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>

  <body>

<?php
include 'header.php';
?>

    <title>Login &#8729; PoliJokers</title>

	
	<form method="post">
<div class = "starter-template">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="email" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="pass1" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
    
  <button type="submit" class="btn btn-primary">LOGIN</button>
</form>
</div>
	

    </main><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<?php
}
else {
  include 'header.php';

$email = $_POST['email'];
$pass = $_POST['pass1'];
$ok = 0;

/*
$email1 = mysqli_fetch_array(mysqli_query($conn, "SELECT email from users WHERE email = '$email'"))


$pass1 = mysqli_fetch_array(mysqli_query($conn, "SELECT password FROM users WHERE email = '$email'"));



if($pass1[0] ==  md5($pass) && $email != NULL) {
  $ok = 1;
}
else if($pass1[0]!=NULL && $email !=NULL) echo "Email or password incorrect";

if($ok==1) {
  $_SESSION['login_email'] = $_POST['email'];
    echo "Connected succesfully"; 
  } */

$pass1 = md5($pass);

  $sql = "SELECT * FROM users WHERE email ='$email' AND password = '$pass1'";

  $s = mysqli_query($conn,$sql) ;

  while($k = mysqli_fetch_array($s))
  {
  $ok = 1;
  }
  //echo $s;

if($ok==1) {
  $id = mysqli_fetch_array(mysqli_query($conn, "SELECT id FROM users where email='$email'"));
  $admin = mysqli_fetch_array(mysqli_query($conn, "SELECT admin FROM users where email='$email'"));
  $banned = mysqli_fetch_array(mysqli_query($conn, "SELECT banned FROM users where email='$email'"));
  //setcookie('logat', $_POST['email'], time()+10000);
  $_SESSION['login_email'] = $_POST['email'];
  //$_SESSION['first_name'] = $name[0];
  $_SESSION['login_id'] = $id[0];
  $_SESSION['login_admin'] = $admin[0];
  $_SESSION['login_banned'] = $banned[0];
  //var_dump($id);
  echo "<div id=down> <div id=center> <h2> Login succesful </h2> </div> </div> <meta http-equiv=refresh content='1; url=index.php' />";
  //var_dump($name);
  }
  else echo "<div id=down> <div id=center> <h2> Email or password incorrect </h2> </div> </div> <meta http-equiv=refresh content='1; url=login.php' />";
}

//echo $pass1[0];
?>

