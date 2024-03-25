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
    <section class="maintenance">
        <h2>Request Maintenance</h2>
        <div class="maintenance-img">
            <img src="/assets/test-property.webp" alt="">
        </div>
        <button>Request</button>
        <div class="maintenance-history">
            <div class="requests">
                <a href="">
                    <div class="request">
                        <p>Broken Toilet</p>
                        <p>12/14/24</p>
                        <button>Details</button>
                    </div>
                    <div class="request">
                        <p>Broken Boiler</p>
                        <p>12/14/24</p>
                        <button>Details</button>
                    </div>
                    <div class="request">
                        <p>No hot water</p>
                        <p>12/14/24</p>
                        <button>Details</button>
                    </div>
                    <div class="request">
                        <p>No electricity</p>
                        <p>12/14/24</p>
                        <button>Details</button>
                    </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
</main>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>