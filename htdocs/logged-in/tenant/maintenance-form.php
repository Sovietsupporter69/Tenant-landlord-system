<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare("SELECT property.id, property.address, property.postcode FROM lease INNER JOIN property ON lease.property_id = property.id WHERE lease.tenant_id = ?;");
$stmt->bind_param("s", $userid);
$stmt->execute();
$result = $stmt->get_result();

function add_property_details($address, $postcode, $propertyid) {
    $code = <<<EOT
    <option value="$propertyid">$address - $postcode</option>
    EOT;
    echo($code);
}

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
                    <?php 
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                add_property_details($row['address'], $row['postcode'], $row['id']);
                            }
                        }
                        else {
                            echo("<p>You have no properties to display</p>");
                        }
                    ?>
                </select>
                <label for="urgency">Urgency:</label>
                <select name="urgency" id="urgency">
                    <option value="" style="display: none;"></option>
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