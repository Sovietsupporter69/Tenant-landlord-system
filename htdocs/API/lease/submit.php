<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");

if(!isset($_POST['startDate'])) {
    die("Requests need start date");
}

if(!isset($_POST['duration'])) {
    die("You need to select a property");
}

if(!isset($_POST['rpm'])) {
    die("Please select an urgency rating");
}

if(!isset($_POST['rpm'])) {
    die("Please select an urgency rating");
}

$start_date = $_POST['startDate'];
$duration = $_POST['duration'];
$end_date = date( "Y-m-d", strtotime("$start_date + $duration months"));

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare("INSERT INTO lease (property_id, tenant_id, start_date, end_date, digital_signature) VALUES (?, ?, '$start_date', '$end_date', '---')");
$stmt->bind_param("ii", $_POST['property'], $userid);
try {
    $stmt->execute();
}
catch (mysqli_sql_exception $e) {
    die("an error occoured with the database");
}

// redirect user to maintenance screen
header("Location: /logged-in/tenant/index.php");
?>