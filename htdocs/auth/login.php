<?php
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

    <form action="/API/login.php" method="post">
        <ul>
            <li>
                <label for="usr">Email:</label>
                <input type="text" class="form-control" id="email" required>
            </li>
            
            <li>
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" required>
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