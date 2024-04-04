<?php

// this should take the search query as a URL paramater and return json
// params:
//  query: string

$page_size = 3;

// validate arguments

$query = $_GET['query'] ?? "";
$min_price = $_GET['min-price'] ?? 0;
$max_price = $_GET['max-price'] ?? PHP_INT_MAX;
$min_bedrooms = $_GET['min-bedrooms'] ?? 0;
$max_bedrooms = $_GET['max-bedrooms'] ?? PHP_INT_MAX;
$cursor = $_GET['cursor'] ?? 0;

// select from database based on some query logic

$query = "%$query%";

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare(<<<SQL

SELECT p.*, MAX(pi.image_path) AS image_path
FROM tms.property p 
LEFT JOIN tms.property_image pi ON p.id = pi.property_id
WHERE 
    ? < p.rental_price and 
    ? > p.rental_price and 
    ? < p.num_bedrooms and 
    ? > p.num_bedrooms and 
    p.description LIKE ? and
    p.id > ?
GROUP BY p.id
ORDER BY p.id
LIMIT $page_size;

SQL);

$stmt->bind_param("iiiisi", $min_price, $max_price, $min_bedrooms, $max_bedrooms, $query, $cursor);
$stmt->execute();
$result = $stmt->get_result();

$arr = array();
while($row = $result->fetch_assoc()) {
    $arr[] = $row;
    $id=$row['id'];
}

$json = array(
    "listings"=>$arr,
    "cursor"=>$id
);

echo json_encode($json);

?>