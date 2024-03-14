<?php

// this should take a property ID and return json
// params:
//  property: integer

if (isset($_GET['property'])) {
    $property = $_GET['property'];
}
else {
    die("No property id was provided, use the property= paramater");
}

if (!ctype_digit($property)) {
    die("property id must be an integer");
}

$property = (int)$property;

// run select .. where property.id == $property

?>