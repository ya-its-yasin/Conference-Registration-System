<?php
// $conn= new mysqli('localhost','root','','dbmspro');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yasin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
$name=$_POST["confname"];
$date=$_POST["confdate"];
$topic=$_POST["conftopic"];
$address=$_POST["confaddress"];


if($conn->connect_error){
	die("Connection failed:".$conn->connect_error);
}

$sq="insert into conflist values('".$name."','".$date."','".$topic."','".$address."');";
$sql="create table ".$name." (stname varchar(20),stcollege varchar(20),stmobnum varchar(10),  primary key (stname));";
if($conn->query($sq)===TRUE){
	if($conn->query($sql)===TRUE){
	echo "<script>alert('added successfully');window.location='adminpg.php';</script>";
	}
	}
		
$conn->close();


?>

