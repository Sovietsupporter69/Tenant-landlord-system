<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare("SELECT lease.end_date, property.address, property.postcode, pi.image_path FROM lease INNER JOIN property ON (lease.property_id = property.id) LEFT JOIN property_image pi ON property.id = pi.property_id WHERE lease.tenant_id = ? GROUP BY property.id;");
$stmt->bind_param("s", $userid);
$stmt->execute();
$result = $stmt->get_result();

function render_leased($end_date, $address, $postcode, $image) {
    $code = <<<EOT
    <div class="property">
    <div class="lease-image">
    <img src="/images/$image" alt="property">
    </div>
    <div class="lease-info">
    <h3>Property Name</h3>
    <p>Address:$address</p>
    <p>Postcode:$postcode</p>
    <p>End date:$end_date</p>
    </div>
    </div>
    EOT;
    echo($code);
}

// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "logged in");
// define("special_css", "page specific css");
// define("special_script", "page specific script");

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/tenant.php")
?>

<main>
    <section class="leased-properties">
        <h2>Leased Properties</h2>
        <a href="">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                render_leased($row['end_date'], $row['address'], $row['postcode'], $row['image_path']);
            }
        }
        else {
            echo("<p>You have no properties to display</p>");
        }
        ?> 
        </a>
    </section>
</main>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>