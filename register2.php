<?php

include 'header.php';

	/*$s = mysqli_query("SELECT * FROM users");
	echo $s;*/
?>
<main>
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


	if($ok == 0) echo $err;
	else {
		$email = strtolower($email);
		$o = "INSERT INTO users(email, password, fac) VALUES('$email', '$password', '$fac')";
		echo $o;
		mysqli_query($conn, "INSERT INTO users(email, password, faculty) VALUES('$email', '$password', '$fac')") or die("querry error");
				echo "<div id=down> <div id=center> <h2> Register succesfully </h2> </div> </div> <meta http-equiv=refresh content='5; url=index.php' />";
	}





//header("Location: index.php");
die();

?>
	</form>
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

