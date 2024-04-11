<?php

// var_dump($_POST);

if (isset($_POST["code"])) {
    $code = $_POST["code"];
}
else {
    die("code required");
}

if (isset($_POST["password"])) {
    $password = $_POST["password"];
}
else {
    die("password required");
}

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/redis.php");

$email = $redis_client->getdel("tms_password_link_clicked:$code");
if (!isset($email)) {
    die("invalid code");
}

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare(<<<EOT
UPDATE user
SET 
    user.password = ?
WHERE 
    user.email = ?
;
EOT);

$stmt->bind_param("ss", $password, $email);
$stmt->execute();

$redis_client->del("tms_password_reset:$email");
$redis_client->del("tms_password_token:$code");

header('Location: /auth/login.php');

?>