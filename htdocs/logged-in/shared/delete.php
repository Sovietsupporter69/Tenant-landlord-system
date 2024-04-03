<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare("SELECT user.email, user.type FROM user WHERE user.id = ?;");
$stmt->bind_param("s", $userid);
$stmt->execute();
$result = $stmt->get_result();
$data = mysqli_fetch_assoc($result);

$email = $data["email"];
$type = $data["type"];

// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "add property");
define("special_css", "auth.css");
// define("special_script", "page specific script");

require_once ($_SERVER["DOCUMENT_ROOT"] . "/private/document_head.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/private/banners/$type.php");

?>

<div id="main">

    <section class="title">
        <h1>Delete Account</h1>
        <h3>Type your email to confirm: <?php echo($email) ?></h3>
    </section>

<?php
    if (isset($_GET['invalid'])) {
        echo('<p class="error">Invalid</p>');
    }
?>

    <form action="/API/account/delete.php" method="post">
        <ul>
            <li>
                <label for="email">email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </li>

            <li>
                <input type="submit">
            </li>
        </ul>
    </form>

    <a class="centre" href="delete.php">delete account</a>
</div id="main">

<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/private/banners/footer.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/private/document_tail.php");
?>