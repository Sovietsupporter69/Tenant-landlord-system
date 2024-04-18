<?php 

// remove an image from a property

if (!isset($_POST['id'])) {
    die("id is required");
}

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$image_id = $_POST["id"];

// todo: add validation to check if the image belongs to the user
$stmt = $conn->prepare("DELETE from property_image where image_path = ?;");
$stmt->bind_param("s", $image_id);
$stmt->execute();
$result = $stmt->get_result();

echo("success");

?>