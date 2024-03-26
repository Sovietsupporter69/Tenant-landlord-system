<?php

// add a property to the landlord's portfolio

// check auth
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");

// validate arguments
if (!isset($_POST['address'])) {
    die("Address is required");
}
$address = $_POST["address"];

if (!isset($_POST['postcode'])) {
    die("Postcode is required");
}
$postcode = $_POST["postcode"];

if (!isset($_POST['rpm'])) {
    die("Rent per month is required");
}
$rpm = $_POST["rpm"];

if (!isset($_POST['propType'])) {
    die("Type of property is required");
}
$propType = $_POST["propType"];

if (!isset($_POST['description'])) {
    die("Description is required");
}
$description = $_POST["description"];

// optional arguments
$num_bedrooms = $_POST["numOfBedrooms"] ?? null;
$num_bathrooms = $_POST["numOfBathrooms"] ?? null;

// set data in database
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare("INSERT INTO Property (landlord_id, address, postcode, rental_price, property_type, num_bedrooms, num_bathrooms, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssiis", $userid, $address, $postcode, $rpm, $propType, $num_bedrooms, $num_bathrooms, $description);

try {
    $stmt->execute();
}
catch (mysqli_sql_exception $e) {
    die("an error occoured with the database");
}

// redirect user to login screen
header("Location: /logged-in/landlord/index.php");

?>