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
    <section class="rent">
        <h2>Rent due this month</h2>
        <div class="rent-due">
            <p>£800</p>
        </div>
        <button>Pay</button>
        <div class="payment-history">
            <div class="payments">
                <a href="">
                    <div class="payment">
                        <p>£250</p>
                        <p>12/14/24</p>
                        <button>Details</button>
                    </div>
                    <div class="payment">
                        <p>£250</p>
                        <p>12/14/24</p>
                        <button>Details</button>
                    </div>
                    <div class="payment">
                        <p>£250</p>
                        <p>12/14/24</p>
                        <button>Details</button>
                    </div>
                    <div class="payment">
                        <p>£250</p>
                        <p>12/14/24</p>
                        <button>Details</button>
                    </div>
                    <div class="payment">
                        <p>£250</p>
                        <p>12/14/24</p>
                        <button>Details</button>
                    </div>
                    <div class="payment">
                        <p>£250</p>
                        <p>12/14/24</p>
                        <button>Details</button>
                    </div>
                    <div class="payment">
                        <p>£250</p>
                        <p>12/14/24</p>
                        <button>Details</button>
                    </div>
                    <div class="payment">
                        <p>£250</p>
                        <p>12/14/24</p>
                        <button>Details</button>
                    </div>
                    <div class="payment">
                        <p>£250</p>
                        <p>12/14/24</p>
                        <button>Details</button>
                    </div>
                    <div class="payment">
                        <p>£250</p>
                        <p>12/14/24</p>
                        <button>Details</button>
                    </div>
                    <div class="payment">
                        <p>£250</p>
                        <p>12/14/24</p>
                        <button>Details</button>
                    </div>
                    <div class="payment">
                        <p>£250</p>
                        <p>12/14/24</p>
                        <button>Details</button>
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