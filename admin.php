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


    <title>Admin &#8729; PoliJokers</title>
<main>
  <div class = "starter-template">
	<?php 
   if(!isset($_SESSION['login_email'])) echo "You have to log in first.";
   else if($_SESSION['login_admin'] == 0) echo "Nice try! You're not an admin, sorry.";
   else{
  ?>

   <h2> Change another user's permissions </h2>
	<form method='post'>
    Email:<input class='form-control' name='email' type='text' placeholder="User's email">
    Admin: <input class='form-control' name='value' type='text' placeholder="">
    <h6> 0 = user; 1 = admin </h6>
    Ban: <input class='form-control' name='ban' type='text' placeholder="">
    <h6> 0 = not banned; 1 = banned </h6>

  <button type='submit' class='btn btn-primary'>Submit</button>
</form>
</div>

<?php	}
?>
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
  $value = $_POST['value'];
  $ban = $_POST['ban'];
  //$id = mysqli_fetch_array(mysqli_query($conn, "SELECT MAX(id) FROM jokes"));
  

//mysqli_query($conn, "INSERT INTO `jokes` (`id`, `title`, `joke`, `idUser`) VALUES ('1', 'test3', 'test2', '1')");

if($email!=NULL)
  if($value==1 || $value == 0){
    mysqli_query($conn, "UPDATE users SET admin = '$value' WHERE email = '$email'") or die("querry error");
    echo "Permissions modified.";
  }
  if($email!=NULL)
  if($ban==1 || $ban == 0){
    mysqli_query($conn, "UPDATE users SET banned = '$ban' WHERE email = '$email'") or die("querry error");
    echo "Ban status modified.";
  }


//header("Location: index.php");
die();

?>

