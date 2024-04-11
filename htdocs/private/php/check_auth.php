<?php 

if(!isset($_COOKIE['auth'])) {
    header("Location: /auth/login.php?expired");
    die();
}

$auth_secret = $_COOKIE['auth'];

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/redis.php");

$redis_userdata = $redis_client->getex("tms_user_session:$auth_secret", 'ex', 20*60);

if (!isset($redis_userdata)) {
    setcookie('auth','');
    header("Location: /auth/login.php?expired");
    die();
}

$redis_userdata = json_decode($redis_userdata, associative:true);
$userid = $redis_userdata['id'];
$username = $redis_userdata['username'];
$email = $redis_userdata['email'];

?>