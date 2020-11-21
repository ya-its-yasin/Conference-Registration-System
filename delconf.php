<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yasin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$confdel=$_POST["confdel"];
$sql= "delete from conflist where confname='".$confdel."'";
$sql1 = "drop table ".$confdel."";

if($conn->query($sql)==TRUE)
{
	if($conn->query($sql1)==TRUE)
		
		{		echo "<script>alert('deleted successfully');window.location='adminpg.php';</script>";
		}
}

?>