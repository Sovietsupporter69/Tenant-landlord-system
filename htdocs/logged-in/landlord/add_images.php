<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/private/document_head.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/private/banners/landlord.php");
?>
    <main>
        <section class="add-image">
            <h1> Add image </h1>
            <h3>
                Add image to existing property
            </h3>
            <div class="lease-image">
                <img src="/assets/test-property.webp" alt="property" id="img-slider-img">
            </div>
            <form action="upload.php" method="post" enctype="multipart/form-data" class="img-upload-frm"> Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload" accept="image/jpeg, image/png" required>
                <input type="submit" value="Upload Image" name="submit">
            </form>
        </section>
    </main>


<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/private/banners/footer.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/private/document_tail.php");
?>