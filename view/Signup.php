<?php
include 'header.php';
 ?>

    <div class="container d-flex justify-content-center">
        <div class="row">
            <form class="" action="index.php" method="post">
                <?php
                 if (isset($_SESSION['error']['emptysignup'])) {
                     ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Need to have all input complet</strong>
                    </div>
                <?php
                 } ?>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" value="" id="name" required maxlength="15">
                        </div>
                        <div class="form-group">
                            <?php
                               if (isset($_SESSION['error']['mail'])) {
                                   ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong>Email already exist</strong>
                                </div>
                                <?php
                               } ?>
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" name="email" value="" id="email" required>
                        </div>
                        <div class="form-group">
                            <?php
                               if (isset($_SESSION['error']['password'])) {
                                   ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong>password not identic</strong>
                                </div>
                                <?php
                                   } ?>
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" name="password" value="" id="password" required>
                        </div>
                        <div class="form-group">
                            <label for="passwordcheck">Password check</label>
                            <input class="form-control" type="password" name="passwordcheck" value="" id="passwordcheck" required>
                        </div>
                        <input type="submit" name="submitsignup" value="Submit" class="btn btn-primary">
            </form>
            <a href="." class="col-12">login</a>
        </div>
    </div>

<?php
include 'footer.php';
?>
