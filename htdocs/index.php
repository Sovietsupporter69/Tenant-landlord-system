<?php
// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "Home page");
// define("special_css", "page specific css");
// define("special_script", "page specific script");

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/pre_auth.php")
?>

<p>Welcome to the tenant landlord system. This landing page is a placeholder.</p>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>