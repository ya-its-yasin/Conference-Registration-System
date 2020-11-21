<!DOCTYPE html>
<head>
<title>admin pg</title><link rel="icon" href="images/ap5.png" />
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>
<body style="background-color:black;"><div style=" background-color:black;"><br><br><button class="btn btn-danger pull-right" style=" margin-left: 90%"  id="logout"><a href="index.html">LOG OUT</a></button><br><br></div>
<br><br>


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

$sql1 = "SELECT * FROM conflist";

$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    // output data of each row
	echo '<table cellpadding="10" border="5" width="90%" align="center">
<tr>
	<th style="width:20%;color:white">CONFERENCE NAME</th>
	
	<th style="width:20%;color:white">CONFERENCE DATE</th>
	
	<th style="width:20%; color:white">CONFERENCE TOPIC</th>
	
	<th style="width=40%; color:white">CONFERENCE ADDRESS</th>
	
	
</table>
	
';
    while($row1 = $result1->fetch_assoc()) {
        echo '<table cellpadding="3" border="2" width="90%" align="center">
<th style="width:20%;color:white">
	'.$row1['confname'].'</th>
<th style="width:20%;color:white">	'.$row1['confdate'].'
</th>
<th style="width:20%;color:white">'.$row1['conftopic'].'
	</th><th style="width:40%;color:white">
	'.$row1['confcity'].'
</th>
</table>';
    }
} else {
    echo "<h1><center>No conferences currently</h1>";
}

echo '<br><br><br>';


$sql1 = "SELECT * FROM conflist";

$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    // output data of each row
	while($row1 = $result1->fetch_assoc()) {
	$sql2 = "SELECT * FROM ".$row1['confname']."";
    $result2 = $conn->query($sql2);
    
	echo '<table cellpadding="10" border="5" width="40%" align="center">
<tr>
	<th style="color:white;text-align:center;"><h3>'.$row1['confname'].'</h3></th>';
	
	echo '<table cellpadding="3" border="2" width="40%" align="center">
<tr>
	<th style="width:15%;color:white;text-align:center">NAME</th>
	
	<th style="width:18%;color:white;text-align:center">COLLEGE</th>
	
<th style="width:20%;color:white;text-align:center">CONTACT NUMBER</th>
</table>';
    while($row2 = $result2->fetch_assoc()) {
        echo '<table cellpadding="3" border="2" width="40%" align="center">
<th style="width:13%;color:white">
	'.$row2['stname'].'</th>

<th style="width:15%;color:white">'.$row2['stcollege'].'
<th style="width:18%;color:white">'.$row2['stmobnum'].'
	</th>
	
	

</table>';
	
    }
echo '<br><br><br>';}


} else {
    echo "<h1><center>No registrations recently</h1>";
}

echo '<br><br><br>';



$sql = "SELECT * FROM studentdetails";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo '<table cellpadding="10" border="5" width="90%" align="center">
<tr><th>Student Details</th></tr>
<tr>

	<th style="width:15%;text-align:center;color:white">NAME</th>
	
	<th style="width:8%;text-align:center;color:white">DEPT</th>
	
	<th style="width:21%;text-align:center;color:white">COLLEGE</th>
	
	<th style="width:10%;text-align:center;color:white" >DOB</th>
	<th style="width:8%;text-align:center;color:white">GENDER</th>
	
<th style="width:12%;text-align:center;color:white">CONTACT NUMBER</th>
	<th style="width:29%;text-align:center;color:white">E-MAIL ID</th>
</table>';
    while($row = $result->fetch_assoc()) {
        echo '<table cellpadding="3" border="2" width="90%" align="center">
<th style="width:15%;color:white">
	'.$row['name'].'</th>
<th style="width:8%;color:white">	'.$row['department'].'
</th>
<th style="width:20%;color:white">'.$row['college'].'
	</th><th style="width:10%;color:white">
	'.$row['dob'].'
</th>
<th style="width:10%;color:white">'.$row['gender'].'
	</th>
<th style="width:12%;color:white">'.$row['mobnum'].'
	</th>
	<th style="width:30%;color:white">'.$row['email'].'
	</th>
	

</table>';
    }
} else {
    echo "0 results";
}
echo '<br><br><br><br>';




$conn->close();
?>


<form  action="confadd.php" method="post" role="form" class="form-horizontal">
<table cellpadding="10" cellspacing="5" border="1" width="40%" align="left" style="margin-left:5%;">
<tr><th>Adding new conference</th><tr>
	<th style="color:white">CONFERENCE NAME</th>
	<th><input type="text" class="form-control" name="confname" placeholder="Enter the conference name" required /></th></tr>
<tr>
	<th style="color:white">CONFERENCE DATE</th>
	<th><input type="date" class="form-control" name="confdate"  required /></th></tr><tr>
<tr>
	<th style="color:white">CNFERENCE TOPIC</th>
	<th><input type="text" class="form-control" name="conftopic" placeholder=" Enter the conf topic" required /></th></tr><tr>
	<th style="color:white">ADDRESS</th>
	<th><input type="text" class="form-control" name="confaddress" placeholder=" Enter the address" required /></th>
</tr>
<tr style="width:19%"><th ><button type="submit" class="btn btn-info">add conference</button><br><br><br>
</th></tr>

</form>


<form  action="delconf.php" method="post" role="form" class="form-horizontal">
<table cellpadding="10" cellspacing="5" border="1" width="40%" align="left" style="margin-left:5%;">
<tr><th>Deleting existing conference</th><tr>
	<th style="color:white">CONFERENCE NAME</th>
	<th><input type="text" class="form-control" name="confdel" placeholder="Enter the conference name" required /></th></tr>

<tr style="width:19%"><th ><button id="" type="submit" onclick()="dell" class="btn btn-info">delete conference</button>
</th></tr>

</form>


</body>

<br><br><br>
</html>
