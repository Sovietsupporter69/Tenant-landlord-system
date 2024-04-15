<?php

// get email
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
else {
    header("Location: /auth/password-reset.php?invalid");
    die();
}

// check if an email was sent already
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/redis.php");

$reset_token = $redis_client->get("tms_password_reset:$email");

if (isset($reset_token)) {
    header("Location: /auth/password-reset.php?cooldown");
    die();
}

// update redis with a token
$reset_token = bin2hex(random_bytes(32));
$redis_client->setex("tms_password_reset:$email", 15*60, $email);
$redis_client->setex("tms_password_token:$reset_token", 15*60, $email);

// send email with the token
$reset_url = "https://" . $_SERVER["HTTP_HOST"] . "/auth/password-link.php?token=$reset_token";

$path = $_SERVER["DOCUMENT_ROOT"]."/private/mail/password-reset.html";
$file_contents = file_get_contents($path);
$file_contents = str_replace("{{url}}", $reset_url, $file_contents);
mail($email, "Password reset", $file_contents, "Content-Type: text/html; charset=UTF-8\r\n");

// notify the user the email was sent
$email_provider = explode("@", $email)[1];
$email_provider = urlencode($email_provider);
header("Location: /auth/password-reset.php?sent&provider=$email_provider"); // &code=$reset_token

?>