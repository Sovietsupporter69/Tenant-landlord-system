<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

$stmt = $conn->prepare("SELECT * FROM user WHERE user.id = ?;");
$stmt->bind_param("s", $userid);
$stmt->execute();
$result = $stmt->get_result();
$data = mysqli_fetch_assoc($result);

$id = $data["id"];
$username = $data["username"];
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
        <h1>Account Settings</h1>
        <h3>Account type: <?php echo($type) ?></h3>
    </section>

    <form action="/API/account/update.php" method="post">
        <ul>
            <li>
                <label for="username">username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo($username) ?>" required>
            </li>

            <li>
                <label for="email">email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo($email) ?>" required>
            </li>

            <li>
                <label for="password">password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </li>

            <li>
                <label for="password2">confirm password:</label>
                <input type="password" class="form-control" id="password2" name="password2">
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