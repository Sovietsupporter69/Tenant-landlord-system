<?php
define("title", "add property");
define("special_css", "auth.css");

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/landlord.php");
?>

<div id="main">

    <section class="title">
        <h1>Generate Lease</h1>
        <h3>Generate a lease agreement for a property</h3>
    </section>

    <form action="" method="">
        <ul>
            <li>
                <label for="startDate">Start Date:</label>
                <input type="date" class="form-control" id="address" name="address" required>
            </li>

            <li>
                <label for="leaseDuration">Duration of lease:</label>
                <input type="text" class="form-control" id="postcode" name="postcode" required>
            </li>

            <li>
                <label for="rpm">Rent per month:</label>
                <input type="text" class="form-control" id="rpm" name="rpm" required>
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
