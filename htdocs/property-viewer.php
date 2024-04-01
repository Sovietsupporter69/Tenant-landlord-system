<?php

// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "logged in");
// define("special_css", "page specific css");
define("special_script", "img-scroller.js");

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/tenant.php")
?>

<main>
    <section class="selected-property">
        <span class="material-symbols-outlined arrow" id="previous-img">arrow_back_ios</span>
        <div class="img-container">
            <img src="assets/test-property.webp" alt="property" id="img-slider-img">
        </div>
        <span class="material-symbols-outlined arrow" id="next-img">arrow_forward_ios</span>
    </section>
    <section class="property-info">
        <div class="property-details">
            <h2>£200/Month(£50/Week)</h2>
            <p>Apartment</p>
            <p>12 Denver Road, SU1 4RT</p>
        </div>
        <div class="info">
            <p>Sample info about property e.g council tax bracket</p>
        </div>
        <div class="info-2">
            <p>info about rent agreement e.g length of contract</p>
        </div>
        <div class="info">
            <p>Description of property and features</p>
        </div>
        <div class="info-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1281.3778124461187!2d-1.4693504108519726!3d53.37683066503238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48798283ed55ede5%3A0xeafd77a50b7ce297!2sSheffield%20Hallam%20University!5e0!3m2!1sen!2suk!4v1711983856024!5m2!1sen!2suk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

</main>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>