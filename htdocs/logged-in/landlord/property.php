<?php

if (!isset($_GET['id'])) {
    die("id is required");
}
$property_id = $_GET["id"];

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare("SELECT * FROM property WHERE property.id = ?;");
$stmt->bind_param("s", $property_id);
$stmt->execute();
$result = $stmt->get_result();
$data = mysqli_fetch_assoc($result);

if($userid != $data['landlord_id']) {
    http_response_code(401);
    die("unauthenticated");
}

// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "view_property");
// define("special_css", "page specific css");
// define("special_script", "page specific script");
define("header-content", '<script src="/js/burger-menu.js" defer></script>');

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/landlord.php") 
?>

<?php

    var_dump($data)

?>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>