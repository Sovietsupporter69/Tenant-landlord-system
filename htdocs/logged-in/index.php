<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");
// redirect the user based on if they are landlord/tenant

// for now just assume they are tenant
header("Location: /logged-in/$user_type/index.php");

?>