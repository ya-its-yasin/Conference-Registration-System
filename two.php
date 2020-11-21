<?php
$adminpass=$_POST["adminpass"];
$ch="yasin";
if($adminpass===$ch)
{
	header ("location:adminpg.php");
}else{
	header ("location:index.html");
}

?>