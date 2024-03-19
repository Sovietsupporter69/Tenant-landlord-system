<?php

$REDIS_URL = "redis://127.0.0.1/";

require_once($_SERVER["DOCUMENT_ROOT"]."/../vendor/autoload.php");

$redis_client = new Predis\Client();

?>