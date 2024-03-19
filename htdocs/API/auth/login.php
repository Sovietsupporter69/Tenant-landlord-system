<?php 

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
else {
    die("missing email");
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}
else {
    die("missing password");
}

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/redis.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare("SELECT user.id, user.username, user.password FROM user WHERE user.email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
// $user = $result->fetch_assoc();

var_dump($result);

?>