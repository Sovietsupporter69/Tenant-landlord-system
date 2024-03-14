<?php

// this sould return paginated data as json
// params:
//  page: integer
//  page-size: integer (optional)

if (!isset($_GET['page-size'])) {
    $page_size = 10;
}
else if (!ctype_digit($_GET['page-size'])) {
    die("page size must be integer");
}
else {
    $page_size = (int)$_GET('page-size');
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
else {
    die("No page number was provided, use the page= paramater");
}

if (!ctype_digit($page)) {
    die("page number must be an integer");
}

$page = (int)$page;
$offset = ($page - 1) * $page_size;
$limit = $page_size;

// run select ... from properties where ... OFFSET = $OFFSET LIMIT = $limit

?>