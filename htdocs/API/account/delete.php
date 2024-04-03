<?php

// require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/redis_client.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare("SELECT user.email, user.type FROM user WHERE user.id = ?;");
$stmt->bind_param("s", $userid);
$stmt->execute();
$result = $stmt->get_result();
$data = mysqli_fetch_assoc($result);

$email = $data["email"];
$type = $data["type"];

if(isset($_POST['email'])) {
    $sumbit_email = $_POST['email'];
    if (!filter_var($sumbit_email, FILTER_VALIDATE_EMAIL)) {
        header("Location: http://localhost/logged-in/$type/delete.php?invalid");
        die("Invalid email format");
    }
}

if ($email != $sumbit_email) {
    header("Location: http://localhost/logged-in/$type/delete.php?invalid");
    die("Invalid email format");
}

echo("deleted account");
// TODO: actually delete account

header('Location: /API/auth/logout.php');

?>