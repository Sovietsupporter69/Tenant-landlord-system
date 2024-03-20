<?php
// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "register");
define("special_css", "auth.css");
// define("special_script", "page specific script");

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/pre_auth.php");
?>

<div id="main">

    <section class="title">
        <h1>Register</h1>
        <h3>Register as a tenant or a landlord </h3>
    </section>

    <form action="/API/auth/register.php" method="post">
        <ul>
            <li>
                <label for="name">Username:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </li>
            
            <li>
                <label for="usr">Email:</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </li>
            
            <li>
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="pwd" required>
            </li>
            
            <li>
                <label for="pwd-conf">Confirm password:</label>
                <input type="password" class="form-control" id="pwd-conf" name="pwd2" required>
            </li>
            
            <li>
                <label for="role">Role:</label>
                <select class="form-control" id="role" name="role" required>
                    <option>Tenant</option>
                    <option>Landlord</option>
                </select>
            </li>

            <li>
                <label for="TOS">Accept <a href="/tos.php">Terms and conditions</a>:</label>
                <input type="checkbox" id="TOS" name="TOS" required>
            </li>

            <li>
                <input type="submit">
            </li>
        </ul>
    </form>
</div id="main">

<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/private/banners/footer.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/private/document_tail.php");
?>