<?php
include 'header.php';

$idJoke = $_POST['idJoke'];
$idUser = $_POST['loginId'];
$vote = $_POST['vote'];
$ok = 1;


//echo $idUser;

//unicitatea votului

$s = mysqli_query($conn, "SELECT idUser FROM votes WHERE idJoke='$idJoke' AND idUser='$idUser' ");



  while($k = mysqli_fetch_array($s)){
    if($k[0] === $idUser){
    $ok = 0;
    $err = "You already voted this joke once.";
      }
  }


if($ok==1){

//echo $idJoke . $idUser . $vote;

$currentVotes = mysqli_fetch_array(mysqli_query($conn, "SELECT votes FROM jokes WHERE id = '$idJoke'"));

//echo $currentVotes[0];

$nextVotes = $currentVotes[0] + $vote;

$sql = "UPDATE jokes SET votes = '$nextVotes' where id = '$idJoke'";

mysqli_query($conn,$sql) or die("querry error");
$sql1 = "INSERT INTO votes(idJoke, idUser) values('$idJoke', '$idUser')";
mysqli_query($conn,$sql1) or die("querry2 error");
				echo "<div id=down> <div id=center> <h2> Voted succesfully </h2> </div> </div> <meta http-equiv=refresh content='2; url=index.php' />";

}
else echo "<div id=down> <div id=center> <h2> $err </h2> </div> </div> <meta http-equiv=refresh content='2; url=index.php' />";



?>