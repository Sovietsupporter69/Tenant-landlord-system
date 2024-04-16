<?php
//require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");
//require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

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
    <section class="img-row">
        <div class="edit-img">
            <div class="edit-img-cont">
                <img src="../../assets/4a1971f1ac323dc2f2567e189600e64a.png" alt="property">
            </div>
            <button>Delete</button>
        </div>
        <div class="edit-img">
            <div class="edit-img-cont">
                <img src="../../assets/4a1971f1ac323dc2f2567e189600e64a.png" alt="property">
            </div>
            <button>Delete</button>
        </div>
        <div class="edit-img">
            <div class="edit-img-cont">
                <img src="../../assets/4a1971f1ac323dc2f2567e189600e64a.png" alt="property">
            </div>
            <button>Delete</button>
        </div>
    </section>
    <section class="img-row">
        <div class="edit-img">
            <div class="edit-img-cont">
                <img src="../../assets/4a1971f1ac323dc2f2567e189600e64a.png" alt="property">
            </div>
            <button>Delete</button>
        </div>
        <div class="edit-img">
            <div class="edit-img-cont">
                <img src="../../assets/4a1971f1ac323dc2f2567e189600e64a.png" alt="property">
            </div>
            <button>Delete</button>
        </div>
        <div class="edit-img">
            <div class="edit-img-cont">
                <img src="../../assets/4a1971f1ac323dc2f2567e189600e64a.png" alt="property">
            </div>
            <button>Delete</button>
        </div>
    </section>
    <section class="img-row">
        <div class="edit-img">
            <div class="edit-img-cont">
                <img src="../../assets/4a1971f1ac323dc2f2567e189600e64a.png" alt="property">
            </div>
            <button>Delete</button>
        </div>
        <div class="edit-img">
            <div class="edit-img-cont">
                <img src="../../assets/4a1971f1ac323dc2f2567e189600e64a.png" alt="property">
            </div>
            <button>Delete</button>
        </div>
        <div class="edit-img">
            <div class="edit-img-cont">
                <img src="../../assets/4a1971f1ac323dc2f2567e189600e64a.png" alt="property">
            </div>
            <button>Delete</button>
        </div>
    </section>
    <div class="margin-bot-50">

    </div>
</main>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>