<?php

$host="127.0.0.1";
$port=3306;
$socket="";
$user="tenant-landlord";
$password="tenant-landlord";
$dbname="tenant-landlord";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();


?>