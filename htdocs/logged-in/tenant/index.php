<?php
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
            <div class="property">
                <div class="lease-image">
                    <img src="/assets/test-property.webp" alt="property">
                </div>
                <div class="lease-info">
                    <h3>Property Name</h3>
                    <p>Property:63 boston street</p>
                    <p>Postcode:SH2 5RD</p>
                    <p>Next Rent:13/04/23</p>
                </div>
            </div>
        </a>
    </section>
</main>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>