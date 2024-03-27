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

$id = $data["id"];
$landlord_id = $data["landlord_id"];
$address = $data["address"];
$postcode = $data["postcode"];
$rental_price = $data["rental_price"];
$property_type = $data["property_type"];
$num_bedrooms = $data["num_bedrooms"];
$num_bathrooms = $data["num_bathrooms"];
$description = $data["description"];

if($userid != $landlord_id) {
    http_response_code(401);
    die("unauthenticated");
}

// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "view_property");
define("special_css", "property.css");
// define("special_script", "page specific script");
define("header-content", '<script src="/js/burger-menu.js" defer></script>');

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/landlord.php") 
?>

<?php
    echo(<<<EOT
    
    <main>
        <span><p>address:</p><p>$address</p></span>
        <span><p>postcode:</p><p>$postcode</p></span>
        <span><p>rental_price:</p><p>$rental_price</p></span>
        <span><p>property_type:</p><p>$property_type</p></span>
        <span><p>num_bedrooms:</p><p>$num_bedrooms</p></span>
        <span><p>num_bathrooms:</p><p>$num_bathrooms</p></span>
        <span><p>description:</p><p>$description</p></span>
    </main>
    
    EOT);
?>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>