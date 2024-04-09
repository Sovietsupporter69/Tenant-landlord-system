<?php
if (!isset($_GET['id'])) {
    die("id is required");
}
$property_id = $_GET["id"];

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare("SELECT image_path FROM property_image WHERE property_image.property_id = ? LIMIT 1;");
$stmt->bind_param("i", $property_id);
$stmt->execute();
$result = $stmt->get_result();

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
        <h2>Apply for rent</h2>
        <div class="selected-lease-img">
            <img src="/images/<?php echo(mysqli_fetch_column($result)) ?>" alt="">
            <p>Monthly rent:£100/ Weekly Rent:£25</p>
            <p>Deposit:£500</p>
        </div>
        <div class="lease-agreement">
           <embed src="" alt="lease-agreement">
        </div>
        <div class="apply">
            <button>Apply</button>
        </div>
    </section>
</main>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>