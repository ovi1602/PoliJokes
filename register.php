<!doctype html>
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

    <title>Register &#8729; PoliJokers</title>

	
	<form method="post">
<div class = "starter-template">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="email" placeholder="Enter email">
    <small id="email" class="form-text text-muted">This will be also used for log in.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="pass1" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Repeat the password</label>
    <input name="pass2" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label class="col-form-label" for="formGroupExampleInput">Faculty</label>
    <input name="fac" type="text" class="form-control" id="formGroupExampleInput" placeholder="AC UTCN">
  </div>
      <div class="form-check">
   <!-- <label class="form-check-label">
      <input name="terms" type="checkbox" class="form-check-input">
      I agree with the terms and conditions of using this site.
    </label> -->
  </div>
  <button type="submit" class="btn btn-primary">REGISTER</button>
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


  $email = $_POST['email'];
  $password = $_POST['pass1'];
  $password2 = $_POST['pass2'];
  $fac = $_POST['fac'];
  $ok = 1;
  $err = NULL;


  //Email validation

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $err = $err. "Email isn't valid. <br />"; 
    $ok = 0;
  }


  $s = mysqli_query($conn, "SELECT email FROM users WHERE email='$email' ");



  while($k = mysqli_fetch_array($s)){
    if($k[0] === $email){
    $ok = 0;
    $err = $err."Email already exists in database. <br />";
      }
  }


  if (strlen($password)<6){
    $ok=0;
    $err = $err. "Password is too short. (minimum 6 characters) <br />";
  }

  /*if($first_name == NULL || $last_name == NULL){
    $ok = 0;
    $err = $err. "You haven't said your name. <br />";
  } */



  if($password!=$password2){
    $ok = 0;
    $err = $err."Passwords didn't match. <br />";
  }

  //$hash = password_hash($password, PASSWORD_DEFAULT);

  $password = md5($password);


  $id = mysqli_fetch_array(mysqli_query($conn, "SELECT MAX(id) FROM users"));
  $id[0]++;
  $idNou = $id[0];
  //echo $idNou;

  if($email != NULL)
  if($ok == 0) echo $err;
  else {
    $email = strtolower($email);
    //$o = "INSERT INTO users(email, password, fac) VALUES('$email', '$password', '$fac')";
    //echo $o;
    mysqli_query($conn, "INSERT INTO users(id, email, password, faculty) VALUES('$idNou', '$email', '$password', '$fac')") or die("querry error");
        echo "<div id=down> <div id=center> <h2> Register succesfully </h2> </div> </div> <meta http-equiv=refresh content='5; url=index.php' />";
  }





//header("Location: index.php");
die();





//names of the students that didn't pass any exam

//SELECT firstname, lastname FROM students WHERE id NOT IN (SELECT student_id FROM marks WHERE mark >4 )
?>



