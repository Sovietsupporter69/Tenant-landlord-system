<?php
//require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");

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
    <section class="maintenance-details">
        <div class="maintenance-detail-contain">
                <div class="maintenance-summary">
                    <p>Broken Boiler</p>
                    <p>14/05/23</p>
                </div>
                <div class="maintenance-description">
                    <h3>Details:</h3>
                    <p>Boiler stopped working please help me</p>
                </div>
                <div class="maintenance-status">
                    <h3>Status:</h3>
                    <p>- In Progress</p>
                </div>
            
        </div>
    </section>
</main>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>