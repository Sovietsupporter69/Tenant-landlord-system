<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "logged in");
// define("special_css", "page specific css");
// define("special_script", "page specific script");

$stmt = $conn->prepare("SELECT maintenance_request.title, maintenance_request.description, maintenance_request.urgency, maintenance_request.open_date, maintenance_request.clsoe_date, maintenance_request.property_id FROM maintenance_request WHERE maintenance_request.tenant_id = ?");
$stmt ->bind_param("s", $userid);
$stmt -> execute();
$result = $stmt->get_result();

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/tenant.php")

function maintentance_details($title, $description, $urgency, $open_date, $close_date){
   
    $code = <<<EOT
    

    <div class="maintenance-summary">
    <p>$title</p>
    <p>$open_date</p>
</div>

<div class="maintenance-description">
    <h3>Details:</h3>
    <p>$description</p>
</div>

<div class="maintenance-status">
    <h3>Status:</h3>
    <p>- In Progress</p>
    <p>$urgency</p>
</div>
EOT;
    echo($code);
}
?>

<main>
    <section class="maintenance-details">
        <div class="maintenance-detail-contain">

        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                render_maintenance($row['title'], $row['description'], $row['urgency'], $row['open_date'], $row['close_date']);
                            }
                        }
                        else {
                            echo("<p>You have no properties to display</p>");
                        }
                        ?>


            
        </div>
    </section>
</main>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>