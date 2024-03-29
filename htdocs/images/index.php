<?php
// index.php

// Get the image
$original_path = $_SERVER['REQUEST_URI'];
$file_name = basename($original_path);

$safe_pattern = '/^[a-zA-Z0-9_\-\.]+$/';
if (preg_match($safe_pattern, $file_name)) {
    try {
        $path = $_SERVER["DOCUMENT_ROOT"]."/../images/$file_name.png";
        $file_contents = file_get_contents($path);
        header('Content-Type: image/png');
        echo($file_contents);
    }
    catch (Exception $e) {
        die("invalid file");
    }
}
else {
    die("invalid file");
}
?>
