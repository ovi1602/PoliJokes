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

    <title>Post &#8729; PoliJokers</title>
<main>
  <div class = "starter-template">
	<?php 
   if(!isset($_SESSION['login_email'])) echo "You have to log in first.";
   else if($_SESSION['login_banned'] == 1) echo "You are banned from posting to this site.";
   else
    echo "
	<form method='post'>
    <input class='form-control' name='title' type='text' placeholder='Joke title'>
<div class='form-group'>
    <label for='exampleFormControlTextarea1'>Your joke</label>
    <textarea name='joke' class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea>
  </div>
  <button type='submit' class='btn btn-primary'>POST</button>
</form>
</div>
	";
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


  $title = $_POST['title'];
  $joke = $_POST['joke'];
  $id = mysqli_fetch_array(mysqli_query($conn, "SELECT MAX(id) FROM jokes"));
  $id[0]++;
  $idNou = $id[0];
  $idUser = $_SESSION['login_id'];

//mysqli_query($conn, "INSERT INTO `jokes` (`id`, `title`, `joke`, `idUser`) VALUES ('1', 'test3', 'test2', '1')");

if($title!=NULL)
  if($joke!=NULL){
    mysqli_query($conn, "INSERT INTO jokes(id, title, joke, idUser) VALUES('$idNou', '$title', '$joke', '$idUser')") or die("querry error");
    echo "Joke added succesfully! Want to add another one?";
  }


//header("Location: index.php");
die();

?>

