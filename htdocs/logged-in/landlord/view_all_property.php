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
        <a href="">
            <div class="property">
                <div class="lease-image">
                    <img src="/assets/test-property.webp" alt="property">
                </div>
                <div class="lease-info">
                    <p>Property: Example address</p>
                    <p>Postcode: Example postcode</p>
                </div>
            </div>
        </a>
    </section>
</div>


<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>