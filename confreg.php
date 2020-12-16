
<?php
// $conn= new mysqli('localhost','root','','dbmspro');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yasin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
$regconf=$_POST["regconf"];
$name=$_POST["name"];
$clge=$_POST["clge"];
$mobnum=$_POST["mobnum"];

if($conn->connect_error){
	die("Connection failed:".$conn->connect_error);
}

$sq="insert into ".$regconf." values('".$name."','".$clge."','".$mobnum."');";
if($conn->query($sq)===TRUE){
		echo "<script>alert('added successfully');window.location='studentlogin.php';</script>";
	}
	else{echo "<script>alert('invalid registration or already registered');window.location='studentlogin.php';</script>";}
	
		
$conn->close();



?>
