<?php

// this should accept a POST request form and submit a request
// params:
// - property: int
// - desctiption: string
// - urgency: enum('low', 'normal', 'high')

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");

$Current_Date = strval(date("Y-m-d"));
if(!isset($_POST['title'])) {
    die("Requests need a title");
}

if(!isset($_POST['property'])) {
    die("You need to select a property");
}

if(!isset($_POST['urgency'])) {
    die("Please select an urgency rating");
}

if(!isset($_POST['details'])) {
    die("Requests need details");
}

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare("INSERT INTO maintenance_request (property_id, tenant_id, title, description, urgency, open_date) VALUES (?, ?, ?, ?, ?, '$Current_Date')");
$stmt->bind_param("iisss", $_POST['property'], $userid, $_POST['title'], $_POST['details'], $_POST['urgency']);
try {
    $stmt->execute();
}
catch (mysqli_sql_exception $e) {
    die("an error occoured with the database");
}

// redirect user to maintenance screen
header("Location: /logged-in/tenant/maintenance-viewer.php");
?>