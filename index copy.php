

<?php
include 'header.php';
?>

    <title>Home &#8729; PoliJokers</title>
    <main role="main" class="container">
        <?php

    $query="SELECT * FROM jokes ORDER BY id desc";

    $results = mysqli_query($conn, $query);
    //echo $results[1];

    /*foreach($results as $k){
        echo $k;
    }*/

    while($row = mysqli_fetch_array($results)) {
    $title = $row['title']; 
    $joke = $row['joke'];
    $number = $row['id'];
    $idUser = $row['idUser'];


    // selecting the user
    $sql = "SELECT email FROM users WHERE id = $idUser";
    $q = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($q);

      echo"
      <div class='starter-template'>
        <h2>#$number $title</h2>
        <p class='lead'>$joke</p>
		<img width = '460' ></img>
        <h6> Posted by $user[0] </h6>
      </div>";
  }
?>
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
