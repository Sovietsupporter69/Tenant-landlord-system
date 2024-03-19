<?php
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

    <form action="" method="post">
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
                <select class="form-control" id="numBedrooms" required>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5+</option>
                </select>
            </li>

            <li>
                <label for="numOfBathrooms">Number of bathrooms:</label>
                <select class="form-control" id="numBathrooms" required>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5+</option>
                </select>
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