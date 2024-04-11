<?php
//require_once($_SERVER["DOCUMENT_ROOT"]."/private/php/check_auth.php");


// these variables define properties about the page
// and are managed automatically by the header
// delete them if you do not need them in your file
define("title", "logged in");
// define("special_css", "page specific css");
// define("special_script", "page specific script");

require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/tenant.php")
?>

<main>
    <section class="maintenance">
        <h2>Pay Rent</h2>
        <div class="pay-form">
        <form action="">
            <label for="cardNum">Card Number:</label>
            <input type="text" name="cardNum" id="cardNum"required minlength="16" maxlength="16">
            <label for="cardName">Card Holder name:</label>
            <input type="text" name="cardName" id="cradName"required>
            <label for="amount">Amount(£):</label>
            <input type="number" name="amount" id="amount" required min='5' max='1000000'>
            <label for="cvc">CVC:</label>
            <input type="text" name="cvc" id="cvc" required minlength="3" maxlength="3">
            <label for="expiry">Expiry Date:</label>
            <input type="month" name="expiry" id="expiry"required>
            <div class="centre">
                <button type="submit">submit</button>
            </div>
        </form>
        </div>
        <div class="alt-pay">
            <div class="payment-option">
                <img src="/assets/Gpay.png" alt="">
            </div>
            <div class="payment-option">
                <img src="/assets/apple-pay.jpg" alt="">
            </div>
        </div>
    </section>
</main>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
?>