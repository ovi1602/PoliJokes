<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "polijokes";

// Create connection
//$conn = new mysqli($servername, $username, $password, $db);
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

error_reporting(0);
//mysql_select_db("polijokes");
/*
$r=mysqli_query($conn, "SELECT * FROM users") or die("querry error");
while($s = mysqli_fetch_array($r)){
	
	echo $s[0];

}*/

//mysql_select_db("polijokes");
//echo "Connected successfully";
?>