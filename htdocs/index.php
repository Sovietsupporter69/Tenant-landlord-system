<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth_soft.php");
$banner = "pre_auth";
if ($user_logged_in) {
    $banner = $user_type;
}


// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "Home page");
// define("special_css", "page specific css");
define("special_script", "img-scroller.js");

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
//require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/landlord.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/$banner.php");

// set random images
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");
$stmt = $conn->prepare("SELECT image_path FROM property_image ORDER BY RAND() LIMIT 5");
$stmt->execute();
$result = $stmt->get_result();

echo("<script>var images = [");
while ($path = mysqli_fetch_column($result)) { 
    echo("\t\"$path\",");
}
echo("]</script>");

?>

<div class="alert">
    <span class="closebtn material-symbols-outlined" onclick="this.parentElement.style.display='none';">close</span>
    <strong><u>Reminder</u></strong><br>
    Your next rent payment is due on 20/05/2024.
</div>

<div class="alert2">
    <span class="closebtn material-symbols-outlined" onclick="this.parentElement.style.display='none';">close</span>

    <strong><u>Important Reminder</u></strong><br>
    Your rent is due soon.<br>
    Please make sure your rent is paid as soon as possible.
</div>

<div class="alert3">
    <span class="closebtn material-symbols-outlined" onclick="this.parentElement.style.display='none';">close</span>
    
    <strong><u>Urgent</u></strong><br>
    Oops, you have forgotten to pay your rent.<br>
    It was due on 30/03/2024.
</div>

<?php
if ($user_logged_in) {
    $stmt = $conn->prepare("SELECT end_date FROM lease WHERE tenant_id=?;");
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = mysqli_fetch_assoc($result);
    var_dump($data);
}
?>

<div class="lease">
    <span class="closebtn material-symbols-outlined" onclick="this.parentElement.style.display='none';">close</span>
    
    <strong><u>Reminder</u></strong><br>
    Your lease will expire on 18/04/2024.
</div>

<div class="lease2">
    <span class="closebtn material-symbols-outlined" onclick="this.parentElement.style.display='none';">close</span>
    
    <strong><u>Important Reminder</u></strong><br>
    Your lease will expire soon.<br>
    Please make sure you renew it as soon as possible.
</div>

<div class="lease3">
    <span class="closebtn material-symbols-outlined" onclick="this.parentElement.style.display='none';">close</span>
    
    <strong><u>Urgent</u></strong><br>
    Your lease has expired. Please renew it now!!
</div>

<div class="service">
    <span class="closebtn material-symbols-outlined" onclick="this.parentElement.style.display='none';">close</span>
    
    <div class="service-header"><b><u>Maintenance update</b></u></div>
    <div class="service-container">
        <p>Between 10:00 and 12:00 on 20/04/2024, maintenance updates will be done to the website.<br>During this time, the website will be down.</p>
    </div>
</div>

<main>
    <section class="welcome-banner">
        <h1>Tenant Landlord System</h1>
        <h3>Uk's leading leasing company since 2011</h3>
    </section>
    <section class="search-box">
        <h3>Search For properties</h3>
        <form action="/property-search.php" class="home-search">
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
    <section class="home-info">
        <h3>Uks most trusted rental website</h3>
        <p class="intro-para">
        Welcome to our tenancy mangament website, the uks leading tenancy website since 2011. 
        We provide all types of accomodation from country cottages to inner city appartments.
         Please feel free to browse all the properties we have on offer.
        </p>
        <div class="suggested-properties">
            <span class="material-symbols-outlined arrow" id="previous-img">arrow_back_ios</span>
            <div class="img-container">
                <img src="assets/test-property.webp" alt="property" id="img-slider-img">
            </div>
            <span class="material-symbols-outlined arrow" id="next-img">arrow_forward_ios</span>
        </div>
    </section>
</main>


<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>