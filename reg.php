<?php
// $conn= new mysqli('localhost','root','','dbmspro');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yasin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
$name=$_POST["name"];
$dept=$_POST["dept"];
$clge=$_POST["clge"];
$dob=$_POST["dob"];
$gen=$_POST["gen"];
$ph=$_POST["ph"];
$mail=$_POST["mail"];
$pwd=$_POST["pwd"];
$pwd1=$_POST["pwd1"];


if($conn->connect_error){
	die("Connection failed:".$conn->connect_error);
}

if($pwd===$pwd1)
{	
	$sq="insert into studentdetails values('".$name."','".$dept."','".$clge."','".$dob."','".$gen."',".$ph.",'".$mail."','".$pwd."');";
	if($conn->query($sq)===TRUE){
	echo "<script>alert('registered successfully');window.location='index.html';</script>";
	
	}
	
}else
{
	echo "<script>alert('pwd mismatch')</script>";
}	

$conn->close();


?>


