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
    <section class="payment-details">
        <div class="payment-detail-contain">
                <div class="payment-summary">
                    <p>£400</p>
                    <p>14/05/23</p>
                </div>
                <div class="payees">
                    <h3>Sent From:</h3>
                    <p>- You</p>
                    <h3>Sent To:</h3>
                    <p>- Mr Ben Huthord</p>
                </div>
                <div class="delivered">
                    <h3>Delivered At:</h3>
                    <p>- 14/05/24 12:45pm</p>
                </div>
            
        </div>
    </section>
</main>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>