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
    <section class="maintenance">
        <h2>Maintenance Request Form</h2>
        <div class="maintenance-request">
            <form action="/API/maintenance/submit.php" method="post">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" required>
                <label for="property">Property:</label>
                <select name="property" id="property">
                    <option value=""></option>
                </select>
                <label for="urgency">Urgency:</label>
                <select name="urgency" id="urgency">
                    <option value="Life Threatening">Life Threatening</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                </select>
                <label for="details">Details:</label>
                <textarea name="details" id="details" cols="10" rows="10" required></textarea>
                <div class="centre">
                    <button>Submit</button>
                </div>
            </form>
        </div>
    </section>
</main>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>