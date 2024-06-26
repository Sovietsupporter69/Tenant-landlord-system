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
    header("Location: /auth/login.php?invalid&email=$email");
    die();
}

// run database query to get user matching email
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare("SELECT * FROM user WHERE user.email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// if no user with email redirect and die 
if (mysqli_num_rows($result) == 0) {
    header("Location: /auth/login.php?invalid&email=$email");
    die();
}

// this needs to be hashed
if ($user['password'] != $password) {
    header("Location: /auth/login.php?invalid&email=$email");
    die();
}

// store client secret in cookie+redis
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/redis.php");

$secret = bin2hex(random_bytes(32));
$redis_client->setex("tms_user_session:$secret", 60 * 20, json_encode($user));

setcookie("auth", $secret, path:'/', httponly:true);

// redirect to logged in homepage

header("Location: /logged-in/$user_type/index.php");

?>