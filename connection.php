<?php

$servername='localhost';
$username='root';
$password='';
$dbname = "DB";

$conn=mysqli_connect($servername, $username, $password, "$dbname");
	if(!$conn)
	{
		echo "Connection failed!";
	}

?>