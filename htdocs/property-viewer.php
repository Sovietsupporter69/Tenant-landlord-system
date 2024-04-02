<?php

if (!isset($_GET['id'])) {
    die("id is required");
}
$property_id = $_GET["id"];

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

$rental_price_weekly = ($rental_price * 12) / 52;

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

// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "logged in");
// define("special_css", "page specific css");
define("special_script", "img-scroller.js");

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/tenant.php")
?>

<main>
    <section class="selected-property">
        <span class="material-symbols-outlined arrow" id="previous-img">arrow_back_ios</span>
        <div class="img-container">
            <img alt="property" id="img-slider-img">
        </div>
        <span class="material-symbols-outlined arrow" id="next-img">arrow_forward_ios</span>
    </section>
    <section class="property-info">
        <div class="info">
            <h2><?php echo("£$rental_price/Month"); ?></h2>
            <p><?php echo("£$rental_price_weekly/Week"); ?></p>
        </div>
        <div class="info">
            <p><?php echo("Address:  $address"); ?></p>
            <p><?php echo("Postcode: $postcode"); ?></p>
        </div>
        <div class="info">
            <p><?php echo("Type: $property_type"); ?></p>
            <p><?php echo("Bedrooms: $num_bedrooms"); ?></p>
            <p><?php echo("bathrooms: $num_bathrooms"); ?></p>
        </div>
        <div class="info">
            <p><?php echo("$description"); ?></p>
        </div>
        <div class="info info-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1281.3778124461187!2d-1.4693504108519726!3d53.37683066503238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48798283ed55ede5%3A0xeafd77a50b7ce297!2sSheffield%20Hallam%20University!5e0!3m2!1sen!2suk!4v1711983856024!5m2!1sen!2suk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

</main>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>