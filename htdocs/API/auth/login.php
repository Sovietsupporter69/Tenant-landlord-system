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

// store client secret in cookie+redis
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/redis.php");

$secret = bin2hex(random_bytes(32));
$redis_client->setex("tms_auth_token:$secret", 60 * 20, $user['id']);

setcookie("auth", $secret, path:'/', httponly:true);

// redirect to logged in homepage

if ($user['type'] == 'landlord') {
    header("Location: /logged-in/landlord/index.php");
    die();
}

header("Location: /logged-in/tenant/index.php");

?>