<?php

function render_listing($image, $address, $postcode, $cost) {
    $code = <<<EOT
    <a href="">
    <div class="property">
    <div class="lease-image">
    <img src="$image" alt="property">
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

<!-- this will be echoed for each property that the landlord owns -->
<div>
<section class="leased-properties">
        <?php
            render_listing("/assets/test-property.webp", "13 church lane", "JA23 6PE", "1200");
            render_listing("/assets/test-property-2.webp", "12 smith road", "DA12 2RE", "1700");
            render_listing("/assets/test-property-3.webp", "13 morgan street", "JO67 8XE", "900");
        ?>
    </section>
</div>


<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>