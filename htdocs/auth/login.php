<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth_soft.php");
if ($user_logged_in) {
    setcookie('auth','');
    header("Location: /logged-in/index.php");
    die();
}

// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "log in");
define("special_css", "auth.css");
// define("special_script", "page specific script");

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/pre_auth.php")
?>

<div id="main">

    <section class="title">
        <h1>Login</h1>
    </section>

    <?php
    if (isset($_GET['invalid'])) {
        echo('<p class="error">Invalid Username or Password</p>');
    }
    if (isset($_GET['expired'])) {
        echo('<p class="error">Login Token Expired</p>');
    }
    if (isset($_GET['email-exists'])) {
        echo('<p class="error">Account Already Exists</p>');
    }
    ?>

    <form action="/API/auth/login.php" method="post">
        <ul>
            <li>
                <label for="usr">Email:</label>
                <input type="text" class="form-control" id="email" name="email"<?php 
                    if (isset($_GET['email'])) { $email=$_GET['email']; echo(" value=\"$email\" "); }
                ?>required>
            </li>
            
            <li>
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="password" required>
            </li>

            <li>
                <input type="submit">
            </li>
        </ul>
    </form>

    <a href="/auth/password-reset.php" class="centre">reset password</a></li>
</div id="main">

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>