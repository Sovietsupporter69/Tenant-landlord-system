<?php
// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "Home page");
// define("special_css", "page specific css");
define("special_script", "search-expand.js");

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
//require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/landlord.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/pre_auth.php")
?>
<script src=/js/search.js defer></script>

<main>
    <section class="search-box-properties">
    <h3>Search For properties</h3>
        <form action="/property-search.php" class="home-search">
            <div class="top-search-property">
                <div class="left-search-box-property">
                    <div class="input-top">
                        <label for="location">location</label>
                        <input type="text" name="location", value="<?php echo($_GET['location'] ?? '')?>", id="location">
                    </div>
                </div>
                <div class="right-search-box-property">
                    <div class="input-top">
                        <label for="range">Range</label>
                        <select name="range", value="<?php echo($_GET['range'] ?? '')?>", id="range">
                        <option value="5">5 miles</option>
                        <option value="10">10 miles</option>
                        <option value="15">15 miles</option>
                        <option value="20">20+ miles</option>
                    </select>
                    </div>
                    <div class="search-expand">
                        <span class="material-symbols-outlined drop-down" onclick="searchExpand()">arrow_drop_down</span>
                    </div>
                </div>
            </div>
                <div class="hidden-search" id="hidden-search">
                    <div class="input-top">
                        <label for="min-price">Min Price</label>
                        <input type="number" name="min-price", value="<?php echo($_GET['min-price'] ?? '')?>", id="min-price">
                    </div>
                    <div class="input-top">
                        <label for="max-price">Max Price</label>
                        <input type="number" name="max-price", value="<?php echo($_GET['max-price'] ?? '')?>", id="max-price">
                    </div>
                    <div class="input-top">
                        <label for="range">Property Type</label>
                        <select name="property-type", value="<?php echo($_GET['property-type'] ?? '')?>", id="property-type">
                        <option value="house">Houses</option>
                        <option value="apartment">Apartments</option>
                        <option value="bungalow">Bungalows</option>
                    </select>
                    </div>
                </div>
            </div>
            <input class ="property-search" id ="property-search" type="submit" value="search">
        </form>
    </section>
    <section class="leased-properties" id="listings-container">
        <!-- results go here -->
    </section>
    <div id=scroller></div>
</main>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>