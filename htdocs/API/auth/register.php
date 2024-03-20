<?php

// register for an account
var_dump($_POST);

// verify name
if (isset($_POST["name"])) {
    $name = $_POST['name'];
}
else {
    header("Location: /auth/register.php?invalid-name");
    die();
}

// check email
if (isset($_POST["email"])) {
    $email = $_POST["email"];
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: /auth/register.php?invalid-email");
        die();
    }
}
else {
    header("Location: /auth/register.php?invalid-email");
    die();
}

// validate pwd == pwd2
if ((!isset($_POST['pwd'])) or (!isset($_POST['pwd2']))) {
    header("Location: /auth/register.php?missing-password");
    die();
}

$pwd = $_POST['pwd'];
$pwd2 = $_POST['pwd2'];

if (!($pwd == $pwd2)) {
    header("Location: /auth/register.php?passwords-no-match");
    die();
}

// validate role
if (isset($_POST['role'])) {
    $role = $_POST['role'];
    $role = strtolower($role);
}
else {
    header("Location: /auth/register.php?invalid-role");
    die();
}

if (!(($role == 'tenant') or ($role == 'landlord'))) {
    header("Location: /auth/register.php?invalid-role");
    die();
}

// add user account to database
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare("INSERT INTO user (username, password, email, type) VALUES (?, ?, ?, ?);
");
$stmt->bind_param("ssss", $name, $pwd, $email, $role);
$stmt->execute();

// redirect user to login screen
header("Location: /auth/login.php");

?>