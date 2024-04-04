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
        <h2>Apply for rent</h2>
        <div class="selected-lease-img">
            <img src="/assets/test-property.webp" alt="">
            <p>Monthly rent:£100/ Weekly Rent:£25</p>
            <p>Deposit:£500</p>
        </div>
        <div class="lease-agreement">
           <embed src="" alt="lease-agreement">
        </div>
        <div class="apply">
            <button>Apply</button>
        </div>
    </section>
</main>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>