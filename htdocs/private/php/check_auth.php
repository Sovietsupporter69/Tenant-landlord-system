<?php 

if(!isset($_COOKIE['auth'])) {
    header("Location: /auth/login.php?expired");
    die();
}

$secret = $_COOKIE['auth'];

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/redis.php");

$userid = $redis_client->get("tms_auth_token:$secret");

if (!isset($userid)) {
    header("Location: /auth/login.php?expired");
    die();
}

?>