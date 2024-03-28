<?php

// logout the user
if(!isset($_COOKIE['auth'])) {
    header("Location: /");
    die();
}

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/redis.php");

$secret = $_COOKIE['auth'];
$redis_client->del("tms_auth_token:$secret");

// send to homepage
header("Location: /");

?>