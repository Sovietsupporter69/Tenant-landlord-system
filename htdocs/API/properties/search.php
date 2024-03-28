<?php

// this should take the search query as a URL paramater and return json
// params:
//  query: string


// validate arguments
if (!isset($_GET['query'])) {
    die("you must provide a query string");
}

$query = $_GET['query'];


if (!isset($_GET['min-price'])) {
    die("please provide a minimum price");
}

$min_price = $_GET['min-price'];


if (!isset($_GET['max-price'])) {
    die("please provide a maximum price");
}

$max_price = $_GET['max-price'];


if (!isset($_GET['min-bedrooms'])) {
    die("please provide a minimum number of bedrooms");
}

$min_bedrooms = $_GET['min-bedrooms'];


if (!isset($_GET['max-bedrooms'])) {
    die("please provide a maximum number of bedrooms");
}

$min_bedrooms = $_GET['max-bedrooms'];


// select from database based on some query logic


require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare("SELECT * FROM tms.property WHERE ? < rental_price and ? > rental_price;");
$stmt->bind_param("ii", $min_price, $max_price);
$stmt->execute();
$result = $stmt->get_result();
var_dump($result);


$stmt = $conn->prepare("SELECT * FROM tms.property WHERE ? < num_bedrooms and ? > num_bedrooms;");
$stmt->bind_param("ii", $min_bedrooms, $max_bedrooms);
$stmt->execute();
$result = $stmt->get_result();
var_dump($result);




echo json_encode($result);

?>