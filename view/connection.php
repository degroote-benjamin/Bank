<?php
include 'header.php';
?>
    <div class="container d-flex justify-content-center">
        <div class="row">
            <form class="" action="index.php" method="post">
                <div class="form-group">
                    <?php
                      if (isset($_SESSION['error']['maillog'])) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Email not exist</strong>
                        </div>
                        <?php
                        } ?>
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" value="" id="email">
                </div>
                <div class="form-group">
                    <?php
                      if (isset($_SESSION['error']['passwordlog'])) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>wrong password</strong>
                        </div>
                        <?php
                        } ?>
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" value="" id="password">
                </div>
                <input type="submit" name="submitlogin" value="Submit" class="btn btn-primary">
            </form>
            <a href="?signup" class="col-12 my-3">SignUp</a>
        </div>
    </div>

<?php
include 'footer.php';
?>
