<?php
// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "Home page");
// define("special_css", "page specific css");
// define("special_script", "page specific script");

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/landlord.php")
?>
<main>
    <section class="welcome-banner">
        <h1>Tenant Landlord System</h1>
        <h3>Uk's leading leasing company since 2011</h3>
    </section>
    <section class="search-box">
        <h3>Search For properties</h3>
        <form action="" class="home-search">
            <div class="top-search">
                <div class="left-search-box">
                    <div class="input-top">
                        <label for="location">location</label>
                        <input type="text" name="location" id="location">
                    </div>
                    <div class="input-top">
                        <label for="range">Range</label>
                        <select name="range" id="range">
                        <option value="5">5 miles</option>
                        <option value="10">10 miles</option>
                        <option value="15">15 miles</option>
                        <option value="20">20+ miles</option>
                    </select>
                    </div>
                </div>
                <div class="right-search-box">
                    <div class="input-top">
                        <label for="min-price">Min Price</label>
                        <input type="number" name="min-price" id="min-price">
                    </div>
                    <div class="input-top">
                        <label for="max-price">Max Price</label>
                        <input type="number" name="max-price" id="max-price">
                    </div>
                </div>
            </div>
            <div class="bottom-search">
                <div class="input-top">
                    <label for="min-price">Min Bedrooms</label>
                    <input type="number" name="min-bedrooms" id="min-bedrooms">
                </div>
                <div class="input-top">
                    <label for="max-price">Min Bathrooms</label>
                    <input type="number" name="max-bedrooms" id="max-bedrooms">
                </div>
            </div>
            <input type="submit" value="search">
        </form>
    </section>
</main>


<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php")
?>