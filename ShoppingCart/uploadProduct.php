<?php
include($_SERVER['DOCUMENT_ROOT'] . '/ShoppingCart/include/header.php');
?>
<div class="container">
<form  action="upload.php" method="POST">
  <div class="form-group">
    <label for="proName">Product Name</label>
    <input type="text" class="form-control" id="proName" name="proName">
  </div>
  <div class="form-group">
    <label for="price">price</label>
    <input type="number"  step="0.01" class="form-control" id="price" name="price">
  </div>
  <div class="form-check">
    <label for="proPic">Picture Url</label>
    <input type="text" class="form-control" id="proPic" name="proPic">
  </div>
  <div class="form-group">
    <label for="proDes">Prodect description</label>
    <input type="textarea" class="form-control" id="proDes" name="proDes">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>