<?php

$mysqli_host="127.0.0.1";
$mysqli_port=3306;
$mysqli_socket="";
$mysqli_user="tms";
$mysqli_password="tms";
$mysqli_dbname="tms";

$conn = new mysqli($mysqli_host, $mysqli_user, $mysqli_password, $mysqli_dbname, $mysqli_port, $mysqli_socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$conn->close();

?>