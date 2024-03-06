<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (defined("title")) { echo(constant("title")); } ?></title>
    <link rel="stylesheet" href="/css/global.css">
    <?php
        if (defined("special_css"))    { echo('<link rel="stylesheet" href="'.constant("special_css").'">');   }
        if (defined("special_script")) { echo('<script src="'.constant("special_script").'" defer></script>'); }
    ?>
</head>
<body>