<?php 

// remove an image from a property

if (!isset($_POST['id'])) {
    die("id is required");
}

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$image_id = $_POST["id"];

// todo: add validation to check if the image belongs to the user
$stmt = $conn->prepare(<<<EOT
delete pi
FROM property_image pi
INNER JOIN property p ON (pi.property_id = p.id)
INNER JOIN user usr ON (usr.id = p.landlord_id)
WHERE usr.type = 'landlord' and pi.image_path = ? and usr.id = ?
EOT);
$stmt->bind_param("si", $image_id, $userid);
$stmt->execute();
$result = $stmt->get_result();

echo("success");

?>