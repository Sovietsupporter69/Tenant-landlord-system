<?php
// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "edit images");
// define("special_css", "page specific css");
// define("special_script", "page specific script");
// define("header-content", "custom head contents here");

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
?>

<!-- set the contents of the body here -->

<div id="main">

    <section class="title">
        <h1>Edit property</h1>
        <h3>Edit a property of yours</h3>
    </section>

    <form action="/API/properties/edit.php" method="post">
        <ul>
            <li>
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </li>

            <li>
                <label for="postcode">Postcode:</label>
                <input type="text" class="form-control" id="postcode" name="postcode" required>
            </li>

            <li>
                <label for="rpm">Rent per month:</label>
                <input type="text" class="form-control" id="rpm" name="rpm" required>
            </li>

            <li>
                <label for="propertyType">Type of property:</label>
                <input type="text" class="form-control" id="propType" name="propType" required>
            </li>

            <li>
                <label for="numOfBedrooms">Number of bedrooms:</label>
                <input type="number" name="form-control" id="numOfBedrooms" name="numOfBedrooms">
            </li>

            <li>
                <label for="numOfBathrooms">Number of bathrooms:</label>
                <input type="number" name="form-control" id="numOfBathrooms" name="numOfBathrooms">
            </li>

            <li>
                <label for="description">Descrption of property:</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </li>

            <li>
                <input type="submit">
            </li>
        </ul>
    </form>
</div id="main">




<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>