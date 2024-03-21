<?php
// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "Error 404");
define("special_css", "page specific css");
define("special_script", "page specific script");


require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/pre_auth.php")
?>

<div class="error">
<h1>Error 404</h1>
</div>

<div class="wrongFile">
<p>The requested file was not found on this server.</p>
<p>
    <a href="/">Click here</a> to go to the homepage.
</p>
</div>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>