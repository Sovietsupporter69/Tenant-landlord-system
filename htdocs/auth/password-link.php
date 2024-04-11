<?php

// var_dump($_GET);

if (isset($_GET["code"])) {
    $code = $_GET["code"];
}
else {
    die("code required");
}

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/redis.php");
$email = $redis_client->get("tms_password_token:$code");

if (!isset($email)) {
    die("invalid code");
}

$redis_client->setex("tms_password_link_clicked:$code", 60 * 5, $email);

// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "password reset");
// define("special_css", "page specific css");
// define("special_script", "page specific script");
// define("header-content", "custom head contents here");

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
?>

<?php echo("reset password for $email"); ?>

<div id="main">

    <section class="title">
        <h1>Reset Password For <?php echo($email); ?></h1>
    </section>

    <form action="/API/auth/password-reset-confirmed.php" method="post">
    
    <ul>
            <li>
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </li>

            <input type="text" value="<?php echo($code); ?>" name="code" style="visibility:hidden; position:absolute">

            <li>
                <input type="submit">
            </li>
        </ul>
    </form>

</div id="main">

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>