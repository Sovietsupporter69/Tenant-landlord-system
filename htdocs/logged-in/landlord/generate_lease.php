<?php
define("title", "add property");
define("special_css", "auth.css");

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

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/landlord.php");
?>

<div id="main">

    <section class="title">
        <h1>Generate Lease</h1>
        <h3>Generate a lease agreement for a property</h3>
    </section>

    <form action="/API/lease/submit.php" method="POST">
        <ul>
            <li>
                <label for="startDate">Start Date:</label>
                <input type="date" class="form-control" id="startDate" name="startDate" required>
            </li>

            <li>
                <label for="leaseDuration">Duration of lease (in months):</label>
                <input type="text" class="form-control" id="duration" name="duration" required>
            </li>

            <li>
                <label for="rpm">Rent per month:</label>
                <input type="text" class="form-control" id="rpm" name="rpm" required>
            </li>
            <li>
                <label for="rpm">Property:</label>
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
