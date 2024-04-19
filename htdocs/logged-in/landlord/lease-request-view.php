<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");
//require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

// $stmt = $conn->prepare(<<<EOT

// SELECT
//     lease.end_date,
//     property.address,
//     property.postcode,
//     pi.image_path,
//     u.email AS landlord_email
// FROM
//     lease
//     INNER JOIN property ON (lease.property_id = property.id)
//     LEFT JOIN property_image pi ON property.id = pi.property_id
//     INNER JOIN user u ON property.landlord_id = u.id
// WHERE
//     lease.tenant_id = ?
// GROUP BY
//     property.id
// EOT);

// $stmt->bind_param("s", $userid);
// $stmt->execute();
// $result = $stmt->get_result();

function render_leased($end_date, $address, $postcode, $image, $landlord_email) {
    $code = <<<EOT
    <div class="property">
    <a href="">
    <div class="lease-image">
    <img src="/images/$image" alt="property">
    </div>
    </a>
    <div class="lease-info">
    <strong><p><a href="mailto:$landlord_email">$landlord_email</a></p></strong>
    <p>Address:$address</p>
    <p>Postcode:$postcode</p>
    <p>End date:$end_date</p>
    </div>
    </div>
    </a>
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
<div>
    <h1>Hello <?php echo(ucwords($username)); ?></h1>
</div>
    <section class="lease-requests">
        <h2>Lease Requests</h2>
        <div class="lease-request">
            <a href="">
                <div class="lease-image">
                    <img src="/./htdocs/assets/blank-prof.png" alt="Profile-pic">
                </div>
            </a>
            <div class="lease-info">
                <div class="tenant-info">
                    <p>Tenant Name</p>
                    <p>Tenant Email</p>
                </div>
                <div class="lease-btns">
                    <button class="accept">Accept</button>
                    <button class="deny">Deny</button>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>