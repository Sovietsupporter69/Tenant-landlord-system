<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");

// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "add property");
define("special_css", "auth.css");
// define("special_script", "page specific script");

require_once ($_SERVER["DOCUMENT_ROOT"] . "/private/document_head.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/private/banners/landlord.php");
?>

<div id="main">

    <section class="title">
        <h1>Add new property</h1>
        <h3>Add a new property to your account </h3>
    </section>

    <form action="/API/properties/add.php" method="post">
        <ul>
            <li>
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" required>
            </li>

            <li>
                <label for="postcode">Postcode:</label>
                <input type="text" class="form-control" id="postcode" required>
            </li>

            <li>
                <label for="rpm">Rent per month:</label>
                <input type="text" class="form-control" id="rpm" required>
            </li>

            <li>
                <label for="propertyType">Type of property:</label>
                <input type="text" class="form-control" id="propType" required>
            </li>

            <li>
                <label for="numOfBedrooms">Number of bedrooms:</label>
                <input type="number" name="form-control" id="numOfBedrooms">
            </li>

            <li>
                <label for="numOfBathrooms">Number of bathrooms:</label>
                <input type="number" name="form-control" id="numOfBathrooms">
            </li>

            <li>
                <label for="descrpition">Descrption of property:</label>
                <input type="text" class="form-control" id="descrpition" required>
            </li>

            <li>
                <input type="submit">
            </li>
        </ul>
    </form>
</div id="main">

<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/private/banners/footer.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/private/document_tail.php");
?>