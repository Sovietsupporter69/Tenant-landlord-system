<?php

if(!isset($_COOKIE['auth'])) {
    header("Location: /auth/login.php?expired");
    die();
}

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth_soft.php");

if (!$user_logged_in) {
    setcookie('auth','');
    header("Location: /auth/login.php?expired");
    die();
}

?>