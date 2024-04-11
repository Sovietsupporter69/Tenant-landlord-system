<?php

if(isset($_POST['email'])) { $email = $_POST['email']; }
else die("missing email");

if(isset($_POST['username'])) { $username = $_POST['username']; }
else die("missing username");

$password = $_POST["password"] ?? null;
$password2 = $_POST["password2"] ?? null;

if ($password != $password2) {
    die("passwords do not match");
}

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare(<<<EOT
UPDATE user
SET 
    username = ?,
    email = ?,
    password = ?
WHERE 
    user.id = ?
;
EOT);

$stmt->bind_param("sssi", $username, $email, $password, $userid);
$stmt->execute();

header('Location: /index.php');

?>