<?php


require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_head.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/pre_auth.php")
?>

<main>


<section class="RegisterPageTitle">
<h1> Register</h1>

<h3> Register as a tenant or a landlord </h3>
</section>



<div class="InputBoxes">

  <form>
    <div class="form-group">
      <label for="usr">Username:</label>
      <input type="text" class="form-control" id="usr">
    </div>

    <div class="form-group">
      <label for="usr">Email:</label>
      <input type="text" class="form-control" id="usr">
    </div>

    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd">
    </div>

    <div class="form-group">
      <label for="pwd">Confirm password:</label>
      <input type="password" class="form-control" id="pwd">
    </div>
  </form>

</div>


<form>
    <div class="form-group">
      <label for="sel1">Role:</label>
      <select class="form-control" id="sel1">
        <option>Tenant</option>
        <option>Landlord</option>
      </select>
      <br>
      <button>submit </button>
    </div>
  </form>



</main>



<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/private/document_tail.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/private/banners/footer.php")
?>