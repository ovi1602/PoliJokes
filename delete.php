<?php
include 'header.php';

$id = $_POST['id'];

$sql = "DELETE FROM jokes where id = '$id'";

mysqli_query($conn, $sql) or die("querry error");
				echo "<div id=down> <div id=center> <h2> Deleted succesfully </h2> </div> </div> <meta http-equiv=refresh content='5; url=index.php' />";

				?>