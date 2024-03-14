<?php

// this should take the search query as a URL paramater and return json
// params:
//  query: string

if (!isset($_GET['query'])) {
    die("you must provide a query string");
}

$query = $_GET['query'];

// select from database based on some query logic

?>