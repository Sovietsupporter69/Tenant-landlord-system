<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/private/document_head.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/private/banners/landlord.php");
?>

<div id="main">
    <section class="title">
        <h1> Add image </h1>

        <h3>
            Add image to existing property
        </h3>
    </section>
</div>



<body>
<form action="upload.php" method="post" enctype="multipart/form-data"> Select image to upload:
<input type="file" name="fileToUpload" id="fileToUpload" accept="image/jpeg, image/png" required>
<input type="submit" value="Upload Image" name="submit">
</form>



<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/private/banners/footer.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/private/document_tail.php");
?>