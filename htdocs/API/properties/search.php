<?php

// this should take the search query as a URL paramater and return json
// params:
//  query: string


// validate arguments


$query = $_GET['query'] ?? "";
$min_price = $_GET['min-price'] ?? 0;
$max_price = $_GET['max-price'] ?? PHP_INT_MAX;
$min_bedrooms = $_GET['min-bedrooms'] ?? 0;
$max_bedrooms = $_GET['max-bedrooms'] ?? PHP_INT_MAX;

// select from database based on some query logic

$query = "%$query%";

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare("SELECT * FROM tms.property WHERE ? < rental_price and ? > rental_price and ? < num_bedrooms and ? > num_bedrooms and description like ?;");
$stmt->bind_param("iiiis", $min_price, $max_price, $min_bedrooms, $max_bedrooms, $query);
$stmt->execute();
$result = $stmt->get_result();

$arr = array();
while($row = $result->fetch_assoc()) {
    $arr[] = $row;
}

echo json_encode($arr);

?>