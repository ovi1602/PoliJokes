

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
    $loginId = $_SESSION['login_id'];

    while($row = mysqli_fetch_array($results)) {
    $title = $row['title']; 
    $joke = $row['joke'];
    $number = $row['id'];
    $idUser = $row['idUser'];
    $votes = $row['votes'];


    // selecting the user
    $sql = "SELECT email FROM users WHERE id = $idUser";
    $q = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($q);
    if($_SESSION['login_admin'] == 1) $delete = "<form action=delete.php method=POST> 
                                                <input type=hidden name='id' value='$number'>   
                                                <button type=submit> DELETE </form>";
    else $delete = NULL;
    if(isset($_SESSION['login_id'])) $voteUp = "<form action=vote.php method=POST> 
                                                <input type=hidden name='idJoke' value='$number'> 
                                                <input type=hidden name='loginId' value='$loginId'>
                                                <input type=hidden name='vote' value='1'> 
                                                <button type=submit> Vote Up </form>
                                                ";
    else $voteUp = NULL;
    if(isset($_SESSION['login_id'])) $voteDown = "<form action=vote.php method=POST>    
                                                <input type=hidden name='idJoke' value='$number'>
                                                <input type=hidden name='loginId' value='$loginId'>
                                                <input type=hidden name='vote' value='-1'>  
                                                <button type=submit> Vote Down </form>
                                                ";
    else $voteDown = NULL;

      echo"
      <div class='starter-template'>
        <h2><ul class='list-group'> <li class='list-group-item list-group-item-secondary'>Joke #$number; Score: $votes</li></ul> $title</h2>
        <h5>$joke</h6>
		<img width = '460' ></img>
        <p  class='lead'> Posted by $user[0] </p>
        $delete $voteUp $voteDown
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
