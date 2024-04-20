<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare("SELECT payment.amount, payment.payment_date FROM payment INNER JOIN lease ON payment.lease_id = lease.id WHERE lease.tenant_id = ?;");
$stmt->bind_param("i", $userid);
$stmt->execute();
$result = $stmt->get_result();

function render_rent($amount, $date) {
    $code = <<<EOT
    <div class="payment">
        <p>£$amount</p>
        <p>$date</p>
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
    <section class="rent">
        <h2>Rent due this month</h2>
        <div class="rent-due">
            <p>£800</p>
        </div>
        <a href="rent-payment.php">
            <button>Pay</button>
        </a>
        <div class="payment-history">
            <div class="payments">
                <a href="">
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            render_rent($row['amount'], $row['payment_date']);
                        }
                    }
                    else {
                        echo("<p>You have payments to display</p>");
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