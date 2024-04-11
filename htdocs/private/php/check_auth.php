<?php 

if(!isset($_COOKIE['auth'])) {
    header("Location: /auth/login.php?expired");
    die();
}

$secret = $_COOKIE['auth'];

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/redis.php");

$data = $redis_client->getex("tms_user_session:$secret", 'ex', 20*60);

if (!isset($data)) {
    header("Location: /auth/login.php?expired");
    die();
}

$data = json_decode($data, associative:true);
$userid = $data['id'];
$username = $data['username'];

?>