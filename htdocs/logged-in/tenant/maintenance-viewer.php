<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare("SELECT maintenance_request.title, maintenance_request.urgency, maintenance_request.open_date, maintenance_request.close_date, pi.image_path FROM maintenance_request LEFT JOIN property_image pi ON maintenance_request.property_id = pi.property_id WHERE maintenance_request.tenant_id = ? GROUP BY maintenance_request.title;");
$stmt->bind_param("s", $userid);
$stmt->execute();
$result = $stmt->get_result();

function render_maintenance($title, $open_date, $close_date) {
    $code = <<<EOT
    <div class="request">
    <p>$title</p>
    <p>$open_date</p>
    <p>$close_date</p>
    <button>Details</button>
    </div>
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
        <h2>Request Maintenance</h2>
        <div class="maintenance-img">
            <img src="/assets/test-property.webp" alt="">
        </div>
        <button>Request</button>
        <div class="maintenance-history">
            <div class="requests">
                <a href="">
                    <?php
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                render_maintenance($row['title'], $row['open_date'], $row['close_date'], $row['image_path']);
                            }
                        }
                        else {
                            echo("<p>You have no properties to display</p>");
                        }
                    ?>
                </a>
            </div>
        </div>
    </section>
</main>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>