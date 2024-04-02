<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare("SELECT property.*, pi.image_path FROM property LEFT JOIN property_image pi ON property.id = pi.property_id WHERE property.landlord_id = ? GROUP BY property.id;");
$stmt->bind_param("s", $userid);
$stmt->execute();
$result = $stmt->get_result();

function render_listing($id, $image, $address, $postcode, $cost) {
    $code = <<<EOT
    <a href="property.php?id=$id">
    <div class="property">
    <div class="lease-image">
    <img src="/images/$image" alt="property">
    </div>
    <div class="lease-info">
    <p>Address: $address</p>
    <p>Postcode: $postcode</p>
    <p>Price: £$cost</p>
    </div>
    </div>
    </a>
    EOT;
    echo($code);
}

?>

<?php
// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "view all properties");
// define("special_css", "page specific css");
// define("special_script", "page specific script");
define("header-content", '<script src="/js/burger-menu.js" defer></script>');

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/landlord.php")
?>
<div>
    <h1> View properties </h1>
</div>

<div>
<section class="leased-properties">
        <?php

            // images need fixing
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    render_listing($row['id'], $row['image_path'], $row['address'], $row['postcode'], $row['rental_price']);
                }
            }
            else {
                echo("<p>You have no properties to display</p>");
            }

        ?>
    </section>
</div>


<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>