<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (defined("title")) { echo(constant("title")); } ?></title>
    <link rel="stylesheet" href="/css/global.css">
    <?php
        if (defined("special_css"))    { echo('<link rel="stylesheet" href="/css/'.constant("special_css").'">');   }
        if (defined("special_script")) { echo('<script src="/js/'.constant("special_script").'" defer></script>'); }
        if (defined("header-content")) { echo(constant("header-content")); }
    ?>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>