<?php
include 'header.php';
 ?>
 <div class="container d-flex justify-content-center">
   <div class="row">
<form class="" action="index.php" method="post">
  <div class="form-group">
    <label for="name">Name</label>
    <input class="form-control" type="text" name="name" value="" id="name">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input class="form-control" type="email" name="email" value="" id="email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input class="form-control" type="password" name="password" value="" id="password">
  </div>
  <div class="form-group">
    <label for="passwordcheck">Password check</label>
    <input class="form-control" type="password" name="passwordcheck" value="" id="passwordcheck">
  </div>
<input type="submit" name="submitsignup" value="Submit" class="btn btn-primary">
</form>
<a href="." class="col-12">login</a>
</div>
</div>

<?php
include 'footer.php';
 ?>
