    <?php 
	include "dbconnect.php";
  session_start();

  /*if(isset($_SESSION['login_email'])) {
    $email = $_SESSION['login_email'];
    echo "Hello, " . $email;
    //echo $_SESSION['id'];
    //echo $email;
  }
  else echo "Not logged in";
  */
   ?>
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
	
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">PoliJokers</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bestof.php">Top3 <span class="sr-only">(current)</span></a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>-->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <?php 

              if(isset($_SESSION['login_email'])) echo "<a class=dropdown-item href=logout.php> Log out </a>
                                                        <a class=dropdown-item href=myvotes.php> Jokes I voted </a>";
              else echo"
              <a class=dropdown-item href=login.php>Log in</a>
              <a class=dropdown-item href=register.php>Register</a>";
              if($_SESSION['login_admin']==1) echo"<a class=dropdown-item href=admin.php>Admin page</a>";
              ?>
            </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="post.php">Post something</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <ul class='list-group'> <li class='list-group-item'>
          <!--<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
         <?php if(isset($_SESSION['login_email'])) {
            $email = $_SESSION['login_email'];
            echo "Hello, " . $email;
            //echo $_SESSION['id'];
            //echo $email;
          }
          else echo "Not logged in";
          ?>
        </li></ul>
        </form>
      </div>
    </nav>

