<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");


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
    <section class="maintenance">
        <h2>Pay Rent</h2>
        <div class="payment-option">
            <img src="/assets/Gpay.png" alt="">
        </div>
        <div class="payment-option">
            <img src="/assets/apple-pay.png" alt="">
        </div>
        <div class="payment-option">
            <img src="/assets/pay-pal-2.png" alt="">
        </div>
    </section>
</main>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>