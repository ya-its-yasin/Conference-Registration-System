<!DOCTYPE html>

<?php
// $conn= new mysqli('localhost','root','','dbmspro');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yasin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$user=$_POST["user"];
$pass=$_POST["pass"];

if($conn->connect_error){
	die("Connection failed:".$conn->connect_error);
}


$sql="select * from studentdetails where name='$user' and pass='$pass'";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
$count= mysqli_num_rows($result);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $a=$row["name"];$b=$row["department"];$g=$row["college"];$c=$row["dob"];$d=$row["gender"];$e=$row["mobnum"];$f=$row["email"];
    }
} 


if($count === 1 )
{
	
	echo '<html>
<head>
<title>stupg</title><link rel="icon" href="images/ap5.png" />
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>
<body style="background-color:black;">
<div style="background-color:black ;text-align:right"><br><br><button class="btn btn-danger pull-right" style="    margin-right: 40px;"type="submit"  id="logout"><a href="index.html">LOG OUT</a></button><br>
<br></div>
<div><br><br>
<marquee><h1 style="color:white"><b><i>Welcome to India\'s biggest conference announcement system</i></b></h1></marquee><br><br>
<br>	
';
$sql1 = "SELECT * FROM conflist";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    // output data of each row
	
    while($row = $result1->fetch_assoc()) {
        echo '
		
		<fieldset style="background-color:white;margin-right:80%">
		<legend><h2 style="color:red">'.$row['confname'].'</h2></legend>
			<p style="margin-left:1%">'.$row['confdate'].'<br>
			'.$row['conftopic'].'<br>
				'.$row['confcity'].'</p>
				</fieldset>
			';
			
			//$cn=$row['confname'];
			
				}
			} else {
				echo "";
			}

			echo '<br><br><br>';
			
			echo '
			
<form  action="confreg.php" method="post" role="form" class="form-horizontal">
<table cellpadding="10" cellspacing="5" border="1" width="40%" align="left" style="margin-left:5%;">
<tr>
	<th style="color:white">CONFERENCE NAME</th>
	<th><input type="text" class="form-control" name="regconf" placeholder="Enter the conference name" required /></th></tr>
	<tr><th style="color:white">NAME</th><th><input type="text" class="form-control" name="name" value='.$a.' readonly></th></tr>
<tr><th style="color:white">COLLEGE</th>	<th><input type="text" class="form-control" name="clge" value='.$g.' readonly></th></tr>
<tr><th style="color:white">CONTACT</th><th><input type="text" class="form-control" name="mobnum" value='.$e.' readonly></th></tr>
<tr style="width:19%"><th></th>
<th ><center><button type="submit" class="btn btn-info">REGISTER</button></center>
</th></tr>

</form>

			
			';
	
}else{
	echo '<script>alert ("invalid user name or password"); window.location="index.html";</script>';
}

?>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')">London</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
</div>

<!-- Tab content -->
<div id="London" class="tabcontent">
  <h3>London</h3>
  <p>London is the capital city of England.</p>
</div>

<div id="Paris" class="tabcontent">
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p>
</div>

<div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>

<script>
function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

</script>

<style>
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>


</html>