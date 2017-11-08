<?php
include 'header.php';
 ?>
 <div class="container d-flex justify-content-center">
   <div class="row">
<form class="" action="index.php" method="post">
  <div class="form-group">
  <label for="email">Email</label>
  <input class="form-control" type="email" name="email" value="" id="email">
</div>
<div class="form-group">
  <label for="password">Password</label>
  <input class="form-control" type="password" name="password" value="" id="password">
</div>
<input type="submit" name="submitlogin" value="Submit" class="btn btn-primary">
</form>
<a href="?signup" class="col-12">SignUp</a>
</div>
</div>


<?php
include 'footer.php';
 ?>
