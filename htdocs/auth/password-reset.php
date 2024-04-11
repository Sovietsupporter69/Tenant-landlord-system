<?php
// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "reset password");
define("special_css", "auth.css");
// define("special_script", "page specific script");

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/pre_auth.php")
?>

<div id="main">

    <section class="title">
        <h1>Reset Password</h1>
    </section>

    <?php
    if (isset($_GET['invalid'])) {
        echo('<p class="error">Invalid Email</p>');
    }
    if (isset($_GET['cooldown'])) {
        echo('<p class="error">Email already sent</p>');
    }
    if (isset($_GET['sent'])) {
        echo('<p class="success">Email sent</p>');

        // temp start
        $code = $_GET['code'];
        echo(<<<EOT
        <a href="password-link.php?code=$code">(DEMO) click here to use your code</a>
        EOT);
        // temp end

    }
    ?>

    <form action="/API/auth/password-reset.php" method="post">
    
    <ul>
            <li>
                <label for="usr">Email:</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </li>

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