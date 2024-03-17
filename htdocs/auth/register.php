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

    <form action="/API/login.php" method="post">
        <ul>
            <li>
                <label for="name">Username:</label>
                <input type="text" class="form-control" id="name" required>
            </li>
            
            <li>
                <label for="usr">Email:</label>
                <input type="text" class="form-control" id="email" required>
            </li>
            
            <li>
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" required>
            </li>
            
            <li>
                <label for="pwd-conf">Confirm password:</label>
                <input type="password" class="form-control" id="pwd-conf" required>
            </li>
            
            <li>
                <label for="role">Role:</label>
                <select class="form-control" id="role" required>
                    <option>Tenant</option>
                    <option>Landlord</option>
                </select>
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