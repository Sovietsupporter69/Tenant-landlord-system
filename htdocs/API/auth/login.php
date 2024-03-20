<?php 

// validate email is set
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
else {
    header("Location: /auth/login.php?invalid");
    die();
}

// validate password is set
if (isset($_POST['password'])) {
    $password = $_POST['password'];
}
else {
    header("Location: /auth/login.php?invalid");
    die();
}

// run database query to get user matching email
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare("SELECT user.id, user.username, user.password FROM user WHERE user.email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// if no user with email redirect and die 
if (mysqli_num_rows($result) == 0) {
    header("Location: /auth/login.php?invalid");
    die();
}

// this needs to be hashed
if ($user['password'] != $password) {
    header("Location: /auth/login.php?invalid");
    die();
}

// store client secret in redis
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/redis.php");

?>