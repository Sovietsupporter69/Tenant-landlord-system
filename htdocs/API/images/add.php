<?php

// add an image to a property

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/db_conn.php");

if (!isset($_POST['property_id'])) {
    die("property_id is required");
}

?>