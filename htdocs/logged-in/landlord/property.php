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
define("special_script", "img-scroller.js");
define("header-content", '<script src="/js/burger-menu.js" defer></script>');

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/landlord.php");

// set images
$stmt = $conn->prepare("SELECT image_path FROM property_image WHERE property_id = ?;");
$stmt->bind_param("s", $property_id);
$stmt->execute();
$result = $stmt->get_result();

echo("<script>var images = [");
while ($path = mysqli_fetch_column($result)) { 
    echo("\t\"$path\",");
}
echo("]</script>");

?>
<main class="padding-bottom-50">
    <section class="selected-property-lan">
        <span class="material-symbols-outlined arrow" id="previous-img">arrow_back_ios</span>
        <div class="img-container">
            <img alt="property" id="img-slider-img">
        </div>
        <span class="material-symbols-outlined arrow" id="next-img">arrow_forward_ios</span>
    </section>
<?php
    echo(<<<EOT
    
        <span><p>Address:</p><p>$address</p></span>
        <span><p>Postcode:</p><p>$postcode</p></span>
        <span><p>Rental Price:</p><p>$rental_price</p></span>
        <span><p>Property Type:</p><p>$property_type</p></span>
        <span><p>Number Of Bedrooms:</p><p>$num_bedrooms</p></span>
        <span><p>Number Of Bathrooms:</p><p>$num_bathrooms</p></span>
        <span><p>Description:</p><p>$description</p></span>
    
    EOT);
?>
<div class="landlord-prop-button">
    <a href="">
        <button>Edit Images</button>
    </a>
    <a href="">
        <button>Edit Property</button>
    </a>
</div>
</main>
<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>