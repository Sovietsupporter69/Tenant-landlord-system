<?php
// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "edit images");
// define("special_css", "page specific css");
// define("special_script", "page specific script");
// define("header-content", "custom head contents here");

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
?>

<!-- set the contents of the body here -->

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>